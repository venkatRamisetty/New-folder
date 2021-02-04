<?php
session_start();
$uid=$_SESSION['uid'];

include("config.php");
?>
<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta charset="utf-8">
    <link href="./images/nxl-home.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Netxcell Wahtsapp Solutions">
    <meta name="keywords" content="Netxcell Wahtsapp Solutions Reports">
    <meta name="author" content="Netxcell">
    <title> Message Template </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="./css_js/style.css" />
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="https://www.netxcell.com" class="flex mr-auto">
                <img alt="Netxcell Logo" src="./images/nxl.logo.png">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-bar-chart-2 w-8 h-8 text-white transform -rotate-90">
                    <line x1="18" y1="20" x2="18" y2="10"></line>
                    <line x1="12" y1="20" x2="12" y2="4"></line>
                    <line x1="6" y1="20" x2="6" y2="14"></line>
                </svg> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="index.html" class="menu ">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>

            <!-- <li class="menu__devider my-6"></li> -->

            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg> </div>
                    <div class="menu__title"> Users <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down menu__sub-icon">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="Userform.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Create Users </div>
                        </a>
                    </li>
                    <li>
                        <a href="Userslist.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Users List </div>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg></div>
                    <div class="menu__title"> Reports <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down menu__sub-icon">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="reports_tabular.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Tabular Reports </div>
                        </a>
                    </li>
                    <li>
                        <a href="reports_grpahical.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Graphical Reports </div>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" class="menu menu--active">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square mx-auto"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> </div>
                    <div class="menu__title"> Messaging <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down menu__sub-icon">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg> </div>
                </a>
                <ul  class="menu__sub-open">
                    <li>
                        <a href="Message_Template.html" class="menu menu--active">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Message Template </div>
                        </a>
                    </li>
                    <li>
                        <a href="Template_list.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Template List </div>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="account_setting.html" class="menu ">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mx-auto"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></div>
                    <div class="menu__title">Account Settings </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <?php include('nav_menus.php');?>
        <!-- BEGIN: Content -->
        <div class="content">
            <!-- BEGIN: Top Bar -->
            <div class="top-bar">
                <!-- BEGIN: Breadcrumb -->
                <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="index.html" class="">Messaging</a> <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right breadcrumb__icon">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg> <a href="Message_Template.html" class="breadcrumb--active">Message Template</a> </div>
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
                                <a href="view_profile.html"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user w-4 h-4 mr-2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile </a>
                                <a href="forgot_password.html"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg> Reset Password </a>
                            </div>
                            <div class="p-2 border-t border-theme-40">
                                <a href="login.html"
                                    class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-toggle-right w-4 h-4 mr-2">
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
         
            <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Chat Side Menu -->
                <div class="col-span-12 lg:col-span-12 xxl:col-span-9">
                    <!-- <div class="intro-y pr-1"> -->
<!-- BEGIN: Datatable -->

<div class="intro-y datatable-wrapper box p-5 mt-5">
    <div class="overflow-x-auto overflow-y-auto">
    <div class="preview">

            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                <a href="templates.php" type="button" class="button w-60 mb-2 bg-theme-1 text-white " >Create Message Template</a>
                <table
                    class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline"
                    id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                    style="width: 806px;">
                    <thead>
                        <tr role="row">
                            <th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="PRODUCT NAME: activate to sort column descending">Template name
                            </th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="IMAGES: activate to sort column ascending">
                                Category</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                style="width: 124px;"
                                aria-label="REMAINING STOCK: activate to sort column ascending">Preview</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="STATUS: activate to sort column ascending">Quality</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting w-20" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                
                                aria-label="ACTIONS: activate to sort column ascending">Languages</th>
                                <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                aria-label="ACTIONS: activate to sort column ascending">Last Updated</th>
                                <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0"
                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                aria-label="ACTIONS: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include('ajax/common_functions.php');
                                        global $ms; 
                                       
                                       $q="select t1.sno as 'tid',t1.template_name as 'name', tc.Category_name as 'category', t1.created_date as 'created_at'
                                            from templates t1 
                                            left join template_catagory tc on tc.id = t1.template_catagory_id
                                            WHERE t1.createdby=".$uid.";";
                                            
                                        $r = mysqli_query($ms, $q); 
                                        
                                        $rowcount=mysqli_num_rows($r);
                                        $i=0;
                                        while ($row = mysqli_fetch_array($r)){
                                            $lngs=getlanguages_by_templateid($row['tid']);
                                            $class="even";
                                            if($i%2==0){
                                                $class="even";
                                            }else{
                                                $class="odd";
                                            }
                                            echo '<tr role="row" class="odd">
                                            <td class="text-center border-b">
                                                <div class="font-medium whitespace-no-wrap">'.$row['name'].'</div>
                                                </td>
                                            <td class="text-center border-b">
                                               <div class="w-40 border-b">
                                               <div class="text-gray-600 text-xs whitespace-no-wrap">'.$row['category'].'</div>
                                               </div>
                                             </td>
                                            <td class="text-center border-b ">
                                                <div class="ellipsis">
                                                   Dear {{1}},welcome message_sms_tool
                                                     </div>
                                            </td>
                                            <td class=" border-b text-center ">
                                               <div class="text-gray-600 text-xs flex justify-center items-center whitespace-no-wrap ellipsis">
                                                <div class="py-1 px-2 rounded-full text-xs bg-theme-9 w-20 text-white cursor-pointer font-medium">Ineligible</div>
                                               </div>
                                            </td>
                                            <td class=" border-b text-center ">
                                                <div class="text-gray-600 text-xs flex justify-center items-center whitespace-no-wrap ">';

                                                
                                               
                                            foreach($lngs as $lng){
                                               // echo $lng[0];
                                                echo ' <div class="py-1 px-2 rounded-full text-xs bg-theme-9 w-20 mr-2 text-white cursor-pointer font-medium">'.$lng[0].'</div>';
                                                         
                                            }
                                            echo ' </div>
                                            </td>
                                            <td class="text-center border-b ">
                                               <div class="ellipsis">'.$row['created_at'].' </div>
                                           </td>
                                            
                                            <td class="text-center border-b">
                                               <div class="text-gray-600 text-xs flex justify-center items-center whitespace-no-wrap">
                                                   <div class="flex ">
                                                       <a class="flex items-center mr-3" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>
                                                       <a class="flex items-center text-theme-6" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                                   </div>
                                               </div>
                                               </td>
                                              
                                             
                                       </tr>';
                                         $i++; 
                                        }
                                            
                                            
                                        ?>
                        
                   
                        
                    </tbody>
                </table>
                
              
            </div>
        </div>
    </div>
</div>
<!-- END: Datatable -->
                <!-- </div> -->
                <!-- END: Chat Side Menu -->
               
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="./css_js/script.js"></script>
    <!-- END: JS Assets-->
<script>
$(document).ready(function(){
    $("#messaging").addClass("side-menu--active");
});
   
$('#add-defalut-param').click(function(){
    alert("Adding Deafult Param");
$('.defalut-param').append('  <div class=" pb-5 mt-5 defalut-param"><div class="w-full"> <label class="flex flex-col sm:flex-row text-gray-600 pb-3"> Default Param <button class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Remove</button> </label><div ><input type="text" class="input border w-full" placeholder="Deafult Text"></div></div>');
});
$('#add-currency-param').click(function(){
    alert("Adding Currency Param");
$('.currency-param').append(' <div class=" pb-5 mt-5 currency-param"><label class="flex flex-col sm:flex-row text-gray-600 pb-3"> Currency Param <button class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Remove</button> </label><div class="grid grid-cols-12 gap-2"> <input type="text" class="input w-full border col-span-4" placeholder="Default Text"><input type="text" class="input w-full border col-span-4"placeholder="Currency Code"> <input type="text"class="input w-full border col-span-4" placeholder="Amount"> </div></div></div>');
});
$('#add-component-param').click(function(){
    alert("Adding Component Param");
$('.component-param').append(' <div class=" pb-5 mt-5 component-param"><label class="flex flex-col sm:flex-row text-gray-600 pb-3"> Component Param <button class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Remove</button> </label> <div class="grid grid-cols-12 gap-2"> <input type="text"class="input w-full border col-span-4" placeholder="Default Text"><input type="text" class="input w-full border col-span-4"placeholder="Day of the Week"> <input type="text"class="input w-full border col-span-4"placeholder="Day of the Month"> </div><div class="grid grid-cols-12 gap-2 mt-5"> <input type="text"class="input w-full border col-span-4" placeholder="Year"> <input type="text" class="input w-full border col-span-4"placeholder="Month"> <input type="text" class="input w-full border col-span-4" placeholder="Hour"> </div><div class="grid grid-cols-12 gap-2 mt-5"> <input type="text" class="input w-full border col-span-4" placeholder="Minute"> </div></div>');
});
$('#add-unix-param').click(function(){
    alert("Adding Unix Epoch Param");
$('.unix-param').append(' <div class=" pb-5 mt-5 unix-param"><label class="flex flex-col sm:flex-row text-gray-600 pb-3"> Unix Epoch Param <button class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Remove</button> </label> <div class="grid grid-cols-12 gap-2"> <input type="text" class="input w-full border col-span-6" placeholder="Default Text"><input type="text" class="input w-full border col-span-6"placeholder="Timestamp"></div></div></div>');
});
function removeRow (input) {
  input.parentNode.remove()
}

    </script>

</body>

</html>