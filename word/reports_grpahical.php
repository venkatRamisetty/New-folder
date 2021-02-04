<?php
  
  include("api.php");
   session_start();
  $_SESSION["uid"];

$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

include("header.php");

?>
                <div class="grid grid-cols-12 gap-6 mt-5">
                   
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: User Form -->
                            <div class="intro-y box mt-5">
                             <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                 <h2 class="font-medium text-base mr-auto">
                                    Enter User Details
                                 </h2>
                                 <!-- <div class="w-full sm:w-auto flex items-center sm:ml-auto mt-3 sm:mt-0">
                                     <button class="button text-white bg-theme-1 shadow-md mr-2">Add New User</button>  
                                 </div> -->
                             </div>
                             <div class="p-5" id="User-form">
                                 <div class="preview">
                                     <form class="validate-form" novalidate="novalidate">
                                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div>
                                                    <label class="flex flex-col sm:flex-row">User Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 2 characters</span> </label>
                                                    <input type="text" name="name" class="input w-full border mt-2" placeholder="Service Provider Name" minlength="2" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6"></div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">
                                                    <label class="flex flex-col sm:flex-row"> Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, email address format</span> </label>
                                                    <input type="email" name="email" class="input w-full border mt-2" placeholder="example@gmail.com" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">
                                                    <label class="flex flex-col sm:flex-row"> Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 6 characters</span> </label>
                                                    <input type="password" name="password" class="input w-full border mt-2" placeholder="******" minlength="6" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <label class="flex flex-col sm:flex-row">Mobile Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Mobile Number only</span> </label>
                                        <input type="text" name="mobile" class="input w-full border mt-2" placeholder="9999999990" minlength="10" maxlength="10" required="">
                                   </div>
                                   <div class="intro-y col-span-12 sm:col-span-6">
                                    <label class="flex flex-col sm:flex-row"> Alternate Mobile Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Mobile Number only</span> </label>
                            <input type="text" name="altmobile" class="input w-full border mt-2" placeholder="9999999990" minlength="10" maxlength="10" >
                       </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">Select Services</div>
                                                <div class="multiselect input w-full border flex-1" id="selectservice" multiple="multiple" data-target="multi-0">
                                                    <div class="title noselect">
                                                        <span class="text">Please Select</span>
                                                        <span class="close-icon">&times;</span>
                                                        <span class="expand-icon">&plus;</span>
                                                    </div>
                                                    <div class="container">
                                                        <option value="S1">Service-1</option>
                                                        <option value="S2">Service-2</option>
                                                        <option value="S3">Service-3</option>
                                                        <option value="S4">Service-4</option>
                                                        <option value="S5">Service-5</option>
                                                        <option value="S6">Service-6</option>
                                                        <option value="S7">Service-7</option>
                                                        <option value="S8">Service-8</option>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">Select Report</div>
                                                <div class="multiselect input w-full border flex-1" id="selectreport" multiple="multiple" data-target="multi-0">
                                                    <div class="title noselect">
                                                        <span class="text">Please Select</span>
                                                        <span class="close-icon">&times;</span>
                                                        <span class="expand-icon">&plus;</span>
                                                    </div>
                                                    <div class="container">
                                                        <option value="R1">Report-1</option>
                                                        <option value="R2">Report-2</option>
                                                        <option value="R3">Report-3</option>
                                                        <option value="R4">Report-4</option>
                                                        <option value="R5">Report-5</option>
                                                        <option value="R6">Report-6</option>
                                                        <option value="R7">Report-7</option>
                                                        <option value="R8">Report-8</option>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                                
                                                <button class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                                            </div>
                                        </div>
                                         </form>
                                   
                                 </div>
                               
                             </div>
                             
                         </div>
                         <!-- END: User Form -->
                         
                         </div>
                     
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
       <?php
  

include("footer.php");
   ?>