<?php

  include("api.php");
  session_start();
  $_SESSION["uid"];

  $rsid=$_SESSION["rsid"];
  $users_details= user_details($_SESSION["uid"]);
  $userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);
	
	if(isset($_POST['txtFrom']) && isset($_POST['txtTo']))
	{
		$from_date = $_POST['txtFrom'];
		$to_date = $_POST['txtTo'];
		$sql = "SELECT 'MT',`request_date_time`,msisdn,
       (CASE WHEN Request_Type=1 THEN 'Templat' ELSE 'Text' END) 'type',
       ct.type,message_body,STATUS 
       FROM `whatsapp_data`.`mt_message_details` m 
	   JOIN `whatsapp_db`.`content_type` ct ON m.`content_type`=ct.`id`  
	   AND request_date_time BETWEEN '".$from_date."' AND '".$to_date."'  AND m.client_id=".$rsid."
       UNION
	   SELECT 'Mo',`request_date_time`,msisdn,
	   (CASE WHEN Request_Type=1 THEN 'Templat' ELSE 'Text' END) 'type',
	   ct.type,message_body,STATUS 
	   FROM `whatsapp_data`.`mo_message_details` m 
	   JOIN `whatsapp_db`.`content_type` ct ON m.`content_type`=ct.`id` AND request_date_time BETWEEN '".$from_date."' AND '".$to_date."' 
	   AND m.client_id=".$rsid."
	   ORDER BY 1 LIMIT 500";
	}
$r = mysqli_query($ms, $sql);
include("header.php");
?>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: User Form -->
                            <div class="intro-y box mt-5">
                             <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                              
                                 <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <form class="xl:flex sm:mr-auto" id="tabulator-html-filter-form" action="reports_grpahical.php" method="POST">
                                      
                                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                            <label class="w-10 flex-none xl:w-auto xl:flex-initial mr-2">From </label>
                                            <input class="input w-25 border block mx-auto" id="txtFrom" name="txtFrom" type="text" autocomplete="off">
                                        </div>
                                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                            <label class="w-10 flex-none xl:w-auto xl:flex-initial mr-2">To  </label>
                                            <input class="input w-25 border block mx-auto" id="txtTo" name="txtTo" type="text" autocomplete="off">
                                        </div>
                                        <!---<div class="sm:flex items-center sm:mr-4">
                                            <label class="w-6 flex-none xl:w-auto xl:flex-initial mr-2">Select : </label>
                                            <select class="input w-full sm:w-32 xxl:w-full mt-2 sm:mt-0 sm:w-auto border" id="tabulator-html-filter-field" name="slTemp">
                                                <option value="inputname">Template Name</option>
                                                <option value="monileno">Mobile NO.</option>
                                                <option value="textemessage">Text Message</option>
                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                        
 
                                                        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                                                            <input type="text" class="input w-full sm:w-40 xxl:w-full mt-2 sm:mt-0 border" id="tabulator-html-filter-value" placeholder="Search...">
                                                        </div>-->
                                                        <div class="mt-2 xl:mt-0">
                                                            <button type="submit" class="button w-full sm:w-16 bg-theme-1 text-white" id="tabulator-html-filter-go">Submit</button>
                                                        </div>
                                                    </form>
                                      
                                 </div>
                                 
                             </div>
                            
                             
                         </div>
                         <!-- start Detailed report Content -->
<div class="box p-2">
                           
 <!-- start jquery -->

 <link rel="stylesheet" href="./css_js/datatablebootstrap4.css">
 
  <script src="./css_js/jquery_3.5.1.js"></script>
  
 <table id="detailedreport" class="display" style="width:100%">
        <thead>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                
                <th rowspan="2">S.No.</th>
                <th rowspan="2">Date</th>
                <th rowspan="2">Mobile No.</th>
                <th rowspan="2">Status</th>
                <th colspan="2">Messages</th>
            </tr>
            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
               
                <th>Sent Messages</th>
                <th>Recived Messages</th>
            </tr>
        </thead>
        <tbody>

		<?php
			if (mysqli_num_rows($r) > 0) 
			{
				$i = 0;
				while($row = mysqli_fetch_assoc($r))
				{
					$i++;
					echo'<tr>';
					echo'<td class="border-b dark:border-dark-5 text-center">'.$i.'</td>';
					echo'<td class="border-b dark:border-dark-5 text-center">'.$row['request_date_time'].'</td>';
					echo'<td class="border-b dark:border-dark-5 text-center">'.$row['msisdn'].'</td>';
					
					if($row['STATUS'] == 13)
					{
						echo'<td class="border-b dark:border-dark-5 text-center"><img src="./images/double-tick.png "class="messagestatus"/></td>';
					}
					else if($row['STATUS'] == 5)
					{
						echo'<td class="border-b dark:border-dark-5 text-center"><img src="./images/grey-double-tick-25.png "class="messagestatus"/></td>';
					}
					else if($row['STATUS'] == 4)
					{
						echo'<td class="border-b dark:border-dark-5 text-center"><img src="./images/single-tick.png "class="messagestatus"/>  </td>';
					}
					else if($row['STATUS'] == 6)
					{
						echo'<td class="border-b dark:border-dark-5 text-center"><img src="" class="messagestatus"/>  </td>';
					}
					else
					{
						echo'<td class="border-b dark:border-dark-5 text-center"><img src="" class="messagestatus"/>  </td>';
					}
					if(isset($row['MT']) && $row['MT'] == 'MT')
					{
						echo '<td class="border-b dark:border-dark-5 text-left text-theme-9 ">';
						echo '<div class="ellipsesreportleft">';
						echo '<a href="javascript:;" data-theme="light" class="tooltip"   title="'.$row['message_body'].'">'.$row['message_body'].'</a>';
						echo '</div></td>';

						echo'<td class="border-b dark:border-dark-5 "> </td>';
					}
					if(isset($row['MO']) && $row['MO'] == 'MO')
					{
						echo'<td class="border-b dark:border-dark-5"></td>';
						echo'<td class="border-b dark:border-dark-5 text-right text-theme-6  ">';
						echo'<div class="ellipsesreportright" >';
						echo'<a href="javascript:;" data-theme="light" class="tooltip"   title="'.$row['message_body'].'">'.$row['message_body'].'</a>';
						echo'</div>/td>';
					}
					echo"</tr>";
				}
			}
	 
		?>
             
            
        </tbody>
        <tfoot>
            <tr>
                <th>S.No.</th>
                <th>Date</th>
                <th>Mobile No.</th>
                <th>Status</th>
                <th>Sent Messages</th>
                <th>Recived Messages</th>
            </tr>
        </tfoot>
    </table> 



  <script>
   
$(document).ready(function() {
    $('#detailedreport').DataTable( {
        // "dom": '<"dt-buttons"Bf><"clear">lrtip',
        "dom": 'fltrip',
            "paging": true,
            "autoWidth": true,
        "buttons": true,
            "buttons": [
                    {
            extend: 'excelHtml5',
            text: 'Excel',
            
                    }
            ]
      }  );
} );

</script>
<link rel="stylesheet" href="./jquery_datepicker/jquery-ui">
		<script src="./jquery_datepicker/jquery-ui.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
			$('#txtFrom').datepicker({ dateFormat: "yy-mm-dd" });
			$('#txtTo').datepicker({ dateFormat: "yy-mm-dd" });
			}); 
</script>
</div>
<!-- end detailed report content -->
                         <!-- END: User Form -->
                         
                         </div>
                     
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="./css_js/script.js"></script>
        <script src="./css_js/mutliselect.js"></script>
        <!-- END: JS Assets-->
    
</body>
</html>