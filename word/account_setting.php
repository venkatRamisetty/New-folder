<?php
  
  include("api.php");
   session_start();
  $_SESSION["uid"];

$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

include("header.php");

?>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.html" class="">Application</a> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right breadcrumb__icon">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> <a href="Message_Template.html" class="breadcrumb--active">Account Settings</a> </div>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">

                </div>
                <!-- END: Search -->
                <!-- BEGIN: Notifications  -->
                <div class="relative mr-auto sm:mr-6">
                </div>
                <!-- END: Notifications -->
                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8 relative">
                    <div class="dropdown-toggle w-12 h-12 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img alt="Provider_logo" src="./images/profile.jpg">
                    </div>
                    <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                        <div class="dropdown-box__content box bg-theme-38 text-white">
                            <div class="p-4 border-b border-theme-40">
                                <div class="font-medium">SunNext</div>
                                <div class="text-xs text-theme-41">Service Provider</div>
                            </div>
                            <div class="p-2">
                                <a href="view_profile.html" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user w-4 h-4 mr-2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile </a>
                                <a href="forgot_password.html" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg> Reset Password </a>
                            </div>
                            <div class="p-2 border-t border-theme-40">
                                <a href="login.html" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-toggle-right w-4 h-4 mr-2">
                                        <rect x="1" y="5" width="22" height="14" rx="7" ry="7"></rect>
                                        <circle cx="16" cy="12" r="3"></circle>
                                    </svg> Logout </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
            <!-- END: Top Bar -->
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="intro-y  col-span-12 lg:col-span-8">
                    <!-- BEGIN: Form Validation -->
                    <div class="intro-y box">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                            <h2 class="font-medium text-base mr-auto">
                                Bussiness Account Settings
                            </h2>

                        </div>
                        <div class="p-5" id="basic-datepicker">
                            <div class="preview">
                                <form class="validate-form" novalidate="novalidate">
                                    <div class="grid grid-cols-12 gap-2 pb-5 border-b border-gray-200 dark:border-dark-5">
                                        <div class=" w-full  col-span-6">
                                            <div class="mb-1">WhatsApp User ID</div>
                                            <input type="text" name="userid" class="input w-full border mt-2" placeholder="mobilenumber">
                                        </div>
                                        <div class=" w-full  col-span-12">
                                            <div class="mb-1">About</div>
                                            <input type="text" name="about" class="input w-full border mt-2" placeholder="Hey there ! I am using whatsApp">
                                        </div>
                                        <div class=" w-full  col-span-4  ">
                                            <div class="mb-1">Profile Picture</div>
                                            <div class=" rounded-md p-5">
                                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="./images/profile.jpg">
                                                   
                                                </div>
                                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                                    <button type="button" class="button w-full bg-theme-1 text-white">Change Photo</button>
                                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>
                                  
                                    <div class="grid grid-cols-12 gap-2 pb-5 border-b border-gray-200 dark:border-dark-5">
                                        
                                        <div class=" w-full  col-span-6 mt-3">
                                            <div class="mb-1">Bussiness Profile</div>
                                            <input type="text" name="bussinessprofile" class="input w-full border mt-2" placeholder="Bussiness Profile Name">
                                        </div>
                                        <div class=" w-full  col-span-6 mt-3">
                                            <div class="mb-1">Address</div>
                                            <input type="text" name="address" class="input w-full border mt-2" placeholder=" Provider Address">
                                        </div>
                                        <div class=" w-full  col-span-12 mt-3">
                                            <div class="mb-1">Bussiness Description</div>
                                            <textarea class="input w-full border mt-2" name="bussiness_description" placeholder="Describe About your Bussiness"></textarea> 
                                                </div>
                                                <div class=" w-full  col-span-6 mt-3">
                                                    <div class="mb-1">Contact Email</div>
                                                    <input type="mail" name="contact_email" class="input w-full border mt-2" placeholder="Contact Email">
                                                </div>
                                                <div class=" w-full  col-span-6 mt-3">
                                                    <div class="mb-1">Bussiness Category (e.g .service type)</div>
                                                    <select class="input w-full  border  mt-2">
                                                        <option>Entertainment-1</option>
                                                        <option>Entertainment-2</option>
                                                        <option>Entertainment-3</option>
                                                    </select>
                                                </div>
                                                <div class=" w-full  col-span-12 mt-3 website-url">
                                                    <div class="mb-1">Website Url</div>
                                                    <input type="mail" name="website" class="input w-full border mt-2" placeholder="Provide Url">
                                                </div>
                                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                                    <button id="add-website-url" type="button" class="button w-full bg-theme-1 text-white">Add Website URL</button>
                                                    <!-- <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0"> -->
                                                </div>
                                                </div>
                                                <div class="w-full col-span-12 justify-center text-center mt-2">
                                                    <button class="button  w-24 rounded-full mr-1 mb-2 bg-gray-200 text-gray-600">Reset</button> 
                                                   <button type="submit" class="button w-24 rounded-full mr-1 mb-2 bg-theme-9 text-white">Save</button> 
                              
                                                </div>
                                                
                                        </div>
                                      
                                    </div>
                                  
                                   
                                    </form>
                            </div>

                        </div>
                    </div>
                    <!-- END: Form Validation -->
                </div>

            </div>
           
        </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
   <?php
include('footer.php');
   ?>
    <!-- END: JS Assets-->
    <script>
    
        $('#add-website-url').click(function(){
            alert("Adding Website Url");
        $('.website-url').append('  <div class=" w-full  col-span-12 mt-3 website-url"> <label class="flex flex-col sm:flex-row  pb-3"> Website Url <button class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Remove</button> </label> <input type="mail" name="website" class="input w-full border mt-2" placeholder="Provide Url"></div>');
        });
    </script>
</body>

</html>