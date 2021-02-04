<?php
  
  include("api.php");
   session_start();
  $_SESSION["uid"];

$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

include("header.php");
if($_SESSION["rsid"]==''){
if($users_details>1){

?> <script src="./css_js/script.js"></script> 
     <script>
           
    $(document).ready(function(){

		$('#service-selection-modal').modal('show',{
			backdrop: 'static', keyboard: false
		});
		//alert('dfdfd');
		//	backdrop: 'static'
        //$("").modal('show');

		      $("#srsid").click(function(e){

				  e.stopPropagation(); //stopping propagation here
                var form = new FormData();
                var rsid=$("#rsid").val();
				//alert(rsid);
				 form.append("rsid",rsid);
                form.append("cmd", 'rsid');
				 var settings = {
                "url": "api.php",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data":form
                };
               
                $.ajax(settings).done(function (response) {
					location.reload();

				});
				return false;
			  });
				

			  
    });
</script>
 <!-- Start Service selction modal -->
 <div class="modal overflow-y-auto " id="service-selection-modal" style="padding-left: 17px; margin-top: 0px; margin-left: 0px; z-index: 53;background: #1c3faa;">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                Select Your Services here..
            </h2>

             <div class="dropdown sm:hidden">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal w-5 h-5 text-gray-700 dark:text-gray-600"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                <div class="dropdown-box w-40">
                    <div class="dropdown-box__content box dark:bg-dark-1 p-2">
                        <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file w-4 h-4 mr-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> Download Docs </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
          
            <div class="col-span-12 sm:col-span-12">
                <label>Services</label>
                <select class="input w-full border mt-2 flex-1" name='rsid' id='rsid'>
                 <?php echo  $userd_services; ?>
                </select>
            </div>
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200 dark:border-dark-5">
            <button type="button" id='srsid' data-dismiss="modal" class="button w-20 bg-theme-1 text-white mr-1">Proceed</button>
            <!-- <a href="index.html" type="button" class="button w-20 bg-theme-1 text-white">Submit</a> -->
            
        </div>
    </div>
</div>

       <?php }
	   } else{
	   include('footer.php'); 
	   }?>         
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 mt-8">
                           
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user report-box__icon text-theme-9">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">7410</div>
                                            <div class="text-base text-gray-600 mt-1">Total users</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-theme-11">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                                </svg>
                                               
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">521</div>
                                            <div class="text-base text-gray-600 mt-1">Last Day New Users</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-theme-9"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                                
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">12145</div>
                                            <div class="text-base text-gray-600 mt-1">Total Messages</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity text-theme-11"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                                
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">809</div>
                                            <div class="text-base text-gray-600 mt-1">Notification Messges</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                     

                        <!-- BEGIN: General Report -->
                        <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-5 zoom-in">
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">Total Messages</div>
                                            <div class="text-gray-600 mt-1">3000 Messages</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="report-donut-chart-1" width="180" height="180" class="chartjs-render-monitor" style="display: block; height: 90px; width: 90px;"></canvas>
                                            <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                20%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-5 zoom-in">
                                    <div class="flex">
                                        <div class="text-lg font-medium truncate mr-3">Messages Per Day</div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer ml-auto truncate">
                                            320 Messages</div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas class="simple-line-chart-1 -ml-1 chartjs-render-monitor" height="120" width="448" style="display: block; width: 224px; height: 60px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-5 zoom-in">
                                    <div class="flex items-center">
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate">New Providers</div>
                                            <div class="text-gray-600 mt-1">1450 Providers</div>
                                        </div>
                                        <div class="flex-none ml-auto relative">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="report-donut-chart-2" width="180" height="180" class="chartjs-render-monitor" style="display: block; height: 90px; width: 90px;"></canvas>
                                            <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">
                                                45%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-5 zoom-in">
                                    <div class="flex">
                                        <div class="text-lg font-medium truncate mr-3">Users Per Month</div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer ml-auto truncate">
                                            180 Users</div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas class="simple-line-chart-1 -ml-1 chartjs-render-monitor" height="120" width="448" style="display: block; width: 224px; height: 60px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: General Report -->
                        
                    </div>
                   
                </div>
            </div>
            <!-- END: Content -->
        </div>

		
		<?php
if($_SESSION["rsid"]==''){
 include('footer.php'); 
$rsid=rsid();
$_SESSION["rsid"]=$rsid;
		}
		?>