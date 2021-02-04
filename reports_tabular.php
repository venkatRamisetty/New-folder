<?php

  include("api.php");
  session_start();
  $_SESSION["uid"];

  $rsid=$_SESSION["rsid"];
  $users_details= user_details($_SESSION["uid"]);
  $userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

	if(isset($_POST['sdate']) && isset($_POST['tdate']))
	{
			 $start_date = $_POST['sdate'];
			 $end_date = $_POST['tdate'];
			 $sql="SELECT DATE(`request_date_time`) 'Date', COUNT(1) AS 'Total Requests sent',
					SUM(CASE WHEN `Request_Type` = 1 THEN 1 ELSE 0 END) AS 'Total Notifaction Sent',
					SUM(CASE WHEN `Request_Type` = 1 AND `request_date_time`>c.`Free_trail_end_Date`  THEN Notification_cost ELSE 0 END) AS cost,
					SUM(CASE WHEN `Request_Type` = 0 THEN 1 ELSE 0 END) AS 'Total TextMessage Sent'
					FROM `whatsapp_data`.`mt_message_details` m JOIN `whatsapp_db`.`clientdetails` c
					ON m.client_id=c.id
					AND `client_id`=".$rsid." AND request_date_time BETWEEN '".$start_date."' AND '".$end_date."'
					GROUP BY 1";
	}
	else
	{
			$sql="SELECT DATE(`request_date_time`) 'Date', COUNT(1) AS 'Total Requests sent',
					SUM(CASE WHEN `Request_Type` = 1 THEN 1 ELSE 0 END) AS 'Total Notifaction Sent',
					SUM(CASE WHEN `Request_Type` = 1 AND `request_date_time`>c.`Free_trail_end_Date`  THEN Notification_cost ELSE 0 END) AS cost,
					SUM(CASE WHEN `Request_Type` = 0 THEN 1 ELSE 0 END) AS 'Total TextMessage Sent'
					FROM `whatsapp_data`.`mt_message_details` m JOIN `whatsapp_db`.`clientdetails` c
					ON m.client_id=c.id
					AND `client_id`=".$rsid."
					GROUP BY 1";
	}
$r = mysqli_query($ms, $sql);
include("header.php");
?>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 lg:col-span-12">
			<form name='tlist' action="reports_tabular.php" method="POST">
				Start Date <input type="text" id='sdate' name='sdate' autocomplete="off">
				End Date <input type="text" id='tdate' name='tdate' autocomplete="off">
				<input type="submit" id='submit' name='submit' value='submit'>
			 </form>
			 <!-- BEGIN: User Form -->
			<table id="example">
				<thead>
					<tr>
						<th>DATE</th>
						<th>To sent</th>
						<th>Total Recieved</th>	   
						<th>Notification SENT</th>
						<th>Cost</th>
						<th>Total Text Sent</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if (mysqli_num_rows($r) > 0) 
						{
							while($row = mysqli_fetch_assoc($r))
							{
								echo"<tr>";
								echo"<td>".$row['Date']."</td>";
								echo"<td>".$row['Total Requests sent']."</td>";
								echo"<td></td>";
								echo"<td>".$row['Total Notifaction Sent']."</td>";
								echo"<td>".$row['cost']."</td>";
								echo"<td>".$row['Total TextMessage Sent']."</td>";
								echo"</tr>";
							}
						}
	 
					?>
				</tbody>
			</table>
            </div>
            <!-- END: Content -->
        </div>
       <?php include('footer.php'); ?>
		<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  jQuery(function($){
    $("#example").dataTable({
	columnDefs: [ { type: 'date', 'targets': [0] } ],
	aaSorting: [[ 0, 'desc' ]]
});
  })
  </script>
  
		<link rel="stylesheet" href="./jquery_datepicker/jquery-ui">
		<script src="./jquery_datepicker/jquery-ui.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
			$('#sdate').datepicker({ dateFormat: "yy-mm-dd" });
			$('#tdate').datepicker({ dateFormat: "yy-mm-dd" });
			}); 
</script>

  <!-- BEGIN: Datatable
            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <div class="overflow-x-auto">
                <div class="preview">
                
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                        
                            
                            <table
                                class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline"
                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                style="width: 806px;">
                                <thead>
                                    <tr role="row">
                                        <th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 166px;" aria-sort="ascending"
                                            aria-label="PRODUCT NAME: activate to sort column descending">DATE
                                        </th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 80px;" aria-label="IMAGES: activate to sort column ascending">
                                            To sent</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 124px;"
                                            aria-label="REMAINING STOCK: activate to sort column ascending">Total Recieved</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 120px;"
                                            aria-label="STATUS: activate to sort column ascending">Notification(SENT / READ / Recieved)</th>
                                        <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                            style="width: 116px;"
                                            aria-label="ACTIONS: activate to sort column ascending">TO Way</th>
                                    </tr>
                                </thead>
                                <tbody>










                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">11/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">222222222</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">12/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">33333333</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AYAYAYAYA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">44444</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AVAVAVAVA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">55555555</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAAAXAXAXAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">6666666666666666</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA BBBBBBBBBBB</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">11!@!@!@!@!@@@</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">GGGGGGG AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">87f8f987efhje</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA kejfkefek</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">8758758578</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAA87484 874y274 74A</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">77647576557567</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAA wyey 3ruhu AAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="border-b sorting_1" tabindex="0">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">
                                            
                                                <div class="w-40 border-b">
                                                    <div class="font-medium whitespace-no-wrap">1111111111</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                                </div>
                                               
                                            
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                        <td class="w-40 border-b text-center ">
                                            <div class="font-medium whitespace-no-wrap">1111111111</div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap">AAAAAAAAAA AAAAAAAAAAA</div>
                                        </td>
                                        <td class="text-center border-b">10/06/2020</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                          
                        </div>
                    </div>
                </div>
            </div>
         
            <!-- END: Datatable -->
        </div>
    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->

<?php
  

include("footer.php");
   ?>