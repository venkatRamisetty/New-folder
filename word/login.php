<?php

 include("config.php");
   session_start();
  
 //if(isset($_SESSION["username"])){

	// header("Location: details.php");   
   //   exit;    
// }
session_unset();
session_destroy();
?><!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="./images/nxl-home.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Netxcell Wahtsapp Solutions">
        <meta name="keywords" content="Netxcell Wahtsapp Solutions Reports">
        <meta name="author" content="Netxcell">
        <title>Login </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="./css_js/style.css" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="https://www.netxcell.com" class="-intro-x flex items-center pt-5">
                        <img alt="Netxcell Logo" src="./images/nxl.logo.png">
                        <!-- <span class="text-white text-lg ml-3">Netxcell<span class="font-medium"> Whatsapp</span> </span> -->
                    </a>
                    <div class="my-auto">
                        <!-- <img alt="Netxcell Logo" class="-intro-x w-1/2 -mt-16" src=""> -->
                        <div class="-intro-x text-white font-medium text-3xl leading-tight mt-10">
                          Netxcell  Whatsapp Business 
                            <br>
                           Report Management Solutions
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Manage all your Reports at one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign In
                        </h2>
						<form>
                        <!-- <div class="intro-x mt-2 text-gray-500 xl:hidden text-center"></div> -->
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block form-control" placeholder="User Name" aria-describedby="emailHelp"  size = 20 maxlength = 30  name="user"  id="user">
                            <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4  form-control" size = 20 maxlength = 30  name="pass"  id="pass"  placeholder="Password">
                        </div>
                        <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4" style='float:right;margin-bottom:10px'>
                            <!--<div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>-->
                            <a href="forgot_password.php" target='_blank'>Forgot Password?</a> 
                        </div>
						<div class="d-flex justify-content-around">  <div><p class="lprogress_bar" style="display:none">Please wait</p></div><div><p class="login_error" style="display:none">Invalid Credentials</p></div></div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
						<input type="button" class="button button--lg w-full  text-white bg-theme-1 xl:mr-3"   name="submit"  id="login" value='Login' />
                            
                            <!-- <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</button> -->
                        </div>
                        <!-- <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                            By signin up, you agree to our 
                            <br>
                            <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a> 
                        </div> -->
                    </div>
                </div>
				</form>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="./css_js/script.js"></script>
        <!-- END: JS Assets-->
    </body>

	<script src="./css_js/jquery.min.js"></script> 
<script src="./css_js/bootstrap.min.js"></script> 
</body>

 <script>

$(document).ready(function() {
            ///
            $("#login").click(function(){
                var form = new FormData();
                var username=$("#user").val();
                var password = $("#pass").val();
               // alert(password);
                form.append("username",username);
                form.append("password",password);
                form.append("cmd", 'login');
                var settings = {
                "url": "api.php",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data":form
                };
                $(".lprogress_bar").show();
                $(".login_error").hide();
                $.ajax(settings).done(function (response) {
				//alert(response); return false;
                  if(response=="success"){
                    window.location.href = "dashboard.php";
                  }else {
                    //alert(response)
                    $(".login_error").show();
                    $(".lprogress_bar").hide();
                  }
                    
                    
                });
                   
            })
});
  </script>
</html>