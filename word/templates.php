<?php
session_start();

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
    <title>New Message Template </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="./css_js/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>

.editor
{
	position:relative;
}
.editorAria {
  height:100%;
  min-height:200px;
  border:1px solid #ddd;
  overflow-y: auto;
  padding: 1em;
  margin-top: -2px;
  outline: none;
}

.toolbar {
	position:sticky;
	top:0;
	left:0;
	right:0;
	background-color:#fff;
	border:1px solid #ddd;
	padding:10px;
}

.toolbar a,
.fore-wrapper,
.back-wrapper {
  border: 1px solid #ddd;
  background: #FFF;
  font-family: 'Candal';
  color: #000;
  padding: 5px;
	margin: 2px 0px;
  width:35px;
	height:35px;
  display: inline-block;
	text-align:center;
  text-decoration: none;
}

.toolbar a:hover,
.fore-wrapper:hover,
.back-wrapper:hover {
  background: #0eacc6;
	color:#fff;
	border-color:#0eacc6;
}

a.palette-item {
	display:inline-block;
  height: 1.3em;
  width: 1.3em;
  margin: 0px 1px 1px;
	cursor:pointer;
}
a.palette-item[data-value="#FFFFFF"]{
	border:1px solid #ddd!important;
}
a.palette-item:hover {
  transform:scale(1.1);
}
.fore-wrapper,
.back-wrapper
{
	position:relative;
	cursor:auto;
}
.fore-palette,
.back-palette {
  display: none;
	cursor:auto;
}

.fore-wrapper:hover .fore-palette,
.back-wrapper:hover .back-palette {
	display:block;
}

.fore-wrapper .fore-palette,
.back-wrapper .back-palette {
	position:relative;
  display: inline-block;
  cursor: auto;
  display: block;
	left:0;
	top:calc(100% + 5px);
  position: absolute;
  padding: 10px 5px;
  width: 160px;
  background: #FFF;
  box-shadow: 0 0 5px #CCC;
	display:none;
	text-align:left;
}
.fore-wrapper .fore-palette:after,
.back-wrapper .back-palette:before
{
	content:'';
	display:inline-block;
	position:absolute;
	top:-10px;
	left:10px;
	width:0;
	height:0;
	border-left: 10px solid transparent;
	border-right: 10px solid transparent;
	border-bottom: 10px solid #fff;
}
.fore-palette a,
.back-palette a {
  background: #FFF;
  margin-bottom: 2px;
	border:none;
}
.editor img
{
	max-width:100%;
	object-fit:cover;
}

    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="https://www.netxcell.com" class="flex mr-auto">
                <img alt="Netxcell Logo" class="w-12" src="./images/nxl.logo.png">
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
                <a href="index.html" class="menu">
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
                <a href="javascript:;.html" class="menu ">

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
                <ul >
                    <li>
                        <a href="Userform.html" class="menu ">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Create User </div>
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
            <!-- <li class="menu__devider my-6"></li> -->

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
                <ul class="menu__sub-open">
                    <li>
                        <a href="Message_Template.html" class="menu">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> Message Template </div>
                        </a>
                    </li>
                    <li>
                        <a href="Template_list.html" class="menu menu--active">
                            <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg> </div>
                            <div class="menu__title"> New Message Template </div>
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li>
                <a href="account_setting.html" class="menu ">
                    <div class="menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mx-auto"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> </div>
                    <div class="menu__title">Account Settings </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <?php
        include('nav_menus.php');
        ?>
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
                    </svg> <a href="Template_list.html" class="breadcrumb--active">New Message Template</a> </div>
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
            <!-- start steppr -->
            
            <!-- end steppr -->
            <!-- BEGIN: Datatable -->
            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <div class="overflow-x-auto">
                    <div class="preview">

                       <!-- Begin:Stepper -->
                       <div class="" id="firstwizard">
                       <div class="wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20">
                        <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-white bg-theme-1">1</button>
                            <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Select your Preferences</div>
                        </div>
                        <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                            <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 dark:bg-dark-1">2</button>
                            <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Setup Your Profile</div>
                        </div>
  
                        <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 dark:bg-dark-1 absolute mt-5"></div>
                    </div>
                    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                       
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Category</div>
                                <select class="input w-full border flex-1" id="category">
                                <?php
                                        global $ms; 
                                       
                                       $q="SELECT * FROM template_catagory";
                                        $r = mysqli_query($ms, $q); 
                                        $rowcount=mysqli_num_rows($r);
                                        
                                        while ($row = mysqli_fetch_array($r)){
                                            echo "<option value=".$row['id'].">".$row['Category_name']."</option>";
                                          
                                        }
                                            
                                            
                                        ?>
                                    <!-- <option value=1>Account Update</option>
                                    <option value=2>Alert Update</option>
                                    <option value=3>Appointment Update</option>
                                    <option value=4>Auto-Reply</option>
                                    <option value=5>Issue Resolution</option>
                                    <option value=6>Payment Update</option>
                                    <option value=7>Personal Finance Update</option>
                                    <option value=8>Reservation Update</option>
                                    <option value=9>Shopping Update</option>
                                    <option value=10>Ticket Update</option>
                                    <option value=11>Transportation Update</option> -->
                                </select>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Name</div>
                                <input type="text" class="input w-full border flex-1" id="template_name" placeholder="Message Template Name" required>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Select Language(s)</div>
                                <select id="multiple" class="multiselect input w-full border flex-1" multiple="multiple" name="multiple">
                                        <?php
                                        global $ms; 
                                       
                                       $q="SELECT * FROM template_language";
                                        $r = mysqli_query($ms, $q); 
                                        $rowcount=mysqli_num_rows($r);
                                        
                                        while ($row = mysqli_fetch_array($r)){
                                            echo "<option value=".$row['id'].">".$row['Language']."</option>";
                                          
                                        }
                                            
                                            
                                        ?>
                                        <!-- <option value="eus">English(US)</option>
                                        <option value="euk">English(UK)</option>    
                                        <option value="ben">Bengali</option>
                                        <option value="Tl">Telugu</option>
                                        <option value="Hi">Hindi</option>
                                        <option value="Mr">Marathi</option>
                                        <option value="Or">Orria</option> -->
                                </select>
                                <!-- <div class="multiselect input w-full border flex-1" id="selectservice" multiple="multiple" data-target="multi-0">
                                    <div class="title noselect">
                                        <span class="text">Please Select</span>
                                        <span class="close-icon">&times;</span>
                                        <span class="expand-icon">&plus;</span>
                                    </div>
                                    <div class="container" id="select_language">
                                        <option value="eus">English(US)</option>
                                        <option value="euk">English(UK)</option>    
                                        <option value="ben">Bengali</option>
                                        <option value="Tl">Telugu</option>
                                        <option value="Hi">Hindi</option>
                                        <option value="Mr">Marathi</option>
                                        <option value="Or">Orria</option>
                                    </div>
                                </div> -->
                            </div>
                           
                          
                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <button class="button w-24 justify-center block bg-theme-1 text-white ml-2 " id="nxtbtn">Next</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div  id="secondwizard" style="display: none;">
                        <div class="wizard flex flex-col lg:flex-row justify-center  sm:px-20">
                            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                                <button class="w-10 h-10 rounded-full button text-gray-600 bg-gray-200 dark:bg-dark-1">1</button>
                                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700 dark:text-gray-600">Select your Preferences</div>
                            </div>
                            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                                
                                <button class="w-10 h-10 rounded-full button text-white bg-theme-1">2</button>
                                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Message Content</div>
                            </div>
      
                            <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 dark:bg-dark-1 absolute mt-5"></div>
                        </div>
                        <div id="language_templates">
                       
                  
                        </div>
                   
                       <!-- End: Stepper -->
                    </div>
                </div>
            </div>

            <!-- END: Datatable -->
        </div>
    </div>
    <!-- END: Content -->
    </div>
    <!-- BEGIN: JS Assets-->
    <script src="./css_js/script.js"></script>
    <script src="./css_js/mutliselect.js"></script>
    
    <!-- END: JS Assets-->
    <!-- start Test  Model -->
<div class="modal" id="test-modal">
    <div class="modal__content modal__content--lg  text-center">
        <div class="intro-y box mt-5">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                   Enter Template Details
                </h2>
               
            </div>
            <div class="p-5" id="User-form">
                <div class="preview">
                    <form class="validate-form" novalidate="novalidate">
                       <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">
                           <div class="intro-y col-span-12 sm:col-span-6">
                               <div>
                                <label class="flex flex-col sm:flex-row">Mobile Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Mobile Number only</span> </label>
                                <input type="text" name="mobile" class="input w-full border mt-2" placeholder="9999999990" minlength="10" maxlength="10" required="">
                            </div>
                           </div>
                           <div class="intro-y col-span-12 sm:col-span-6"></div>
                           <div class="intro-y col-span-12 sm:col-span-6">
                               <div class="mb-2">
                                   <label class="flex flex-col sm:flex-row"> Variable-1 <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                                   <input type="text" name="Variable-1" class="input w-full border mt-2" placeholder="Variable-1" required="">
                               </div>
                           </div>
                           <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">
                                <label class="flex flex-col sm:flex-row"> Variable-2 <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                                <input type="text" name="Variable-2" class="input w-full border mt-2" placeholder="Variable-1" required="">
                            </div>
                           </div>
                           <div class="intro-y col-span-12 sm:col-span-6">
                            <div class="mb-2">
                                <label class="flex flex-col sm:flex-row"> Variable-3 <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                                <input type="text" name="Variable-3" class="input w-full border mt-2" placeholder="Variable-1" required="">
                            </div>      
                        </div>
                  <div class="intro-y col-span-12 sm:col-span-6">
                    <div class="mb-2">
                        <label class="flex flex-col sm:flex-row"> Variable-4 <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required</span> </label>
                        <input type="text" name="Variable-4" class="input w-full border mt-2" placeholder="Variable-1" required="">
                    </div>  
                </div>
                
                           <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                               
                               <button class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button>
                           </div>
                       </div>
                      
                  
                </div>
              
            </div>
            
        </div>
    </div>
</div>
 <!-- End Test Model -->
<!-- start Delete Confirmation Model -->
<div class="modal" id="delete-confirmation-modal">
    <div class="modal__content">
        <div class="p-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle w-16 h-16 text-theme-6 mx-auto mt-3"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg> 
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
        </div>
        <div class="px-5 pb-8 text-center">
            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
            <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
        </div>
    </div>
</div>
 <!-- End Delete Confirmation Model -->
</body>
<script src="./css_js/custome.js"></script>
</html>