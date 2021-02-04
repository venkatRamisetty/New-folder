<?php
  
include("api.php");
 //session_start();

$uid=$_SESSION["uid"];
 if($uid==''){
  header('Location: login.php');
     exit();
 }
 $userd_services=user_services($_SESSION['uid']);


//print_r($_REQUEST);
$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services($_SESSION['uid'],$_SESSION["rsid"]);

$userd_servicesa=user_services($_SESSION['uid']);



$usrd_list=user_lists($_SESSION['uid']);

$dir = $_SERVER["DOCUMENT_ROOT"].'/whatsapp_dashboard/uploads/user'.$_SESSION["uid"];

if ((is_dir($dir)== false) && (file_exists($dir)== false)) {
		 if (mkdir($dir, 0777))// create images dir
			$done = true;
	} else if (!is_writeable($dir)) {
		if (chmod($dir, 0777)) // change perm. setting
			$done = true;

	} else{
		$done = true;
	}

//echo error_reporting(E_ALL);
include('header.php'); 
?>
         
            <div class="intro-y chat grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Chat Side Menu -->
                <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                    <div class="intro-y pr-1">

                      <div class="box p-2">
                           <!--   <div class="flex flex-col sm:flex-row items-center">
                                <label class="w-full sm:w-40 sm:text-right sm:mr-5">Send Message to</label>
                                <select class="input w-full border mt-2 flex-1">
                                    <option>Sender-1</option>
                                    <option>Sender-2</option>
                                    <option>Sender -3</option>
                                </select>
                            </div>-->
                            
                            <div class="chat__tabs nav-tabs justify-center flex mt-5">
                                <!--<a data-toggle="tab" data-target="#template" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center active">Template</a>
                                <a data-toggle="tab" data-target="#text" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center">Text</a>
                                <a data-toggle="tab" data-target="#document" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center">Document</a>-->
                                <a data-toggle="tab" data-target="#media" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center active">Media</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                     <div class="tab-content__pane " id="template">

                            <div class="pr-1">
                                <div class="box p-5 mt-5">
                                    <div class="preview">
                                        <!-- <form class="validate-form" novalidate="novalidate"> -->
                                            <div class="grid grid-cols-12 gap-2 pb-5 ">
                                                <div class=" w-full  col-span-6">
                                                  
                                                    <div class="mb-1">Namespace</div>
                                                    <input type="text" name="Namespace" class="input w-full border mt-2"
                                                        placeholder="Namespace">
                                                </div>
                                                <div class=" w-full  col-span-6">
                                                    <div class="mb-1">Element Name</div>
                                                    <input type="text" name="Elementname"
                                                        class="input w-full border mt-2" placeholder="Element Name">
                                                </div>
                                            </div>
                                            <div class="grid grid-cols-12 gap-2 pb-5 ">
                                                <div class=" w-full  col-span-6">
                                                    <div class="mb-1">Language</div>
                                                    <select class="input w-full  border mr-2">
                                                        <option>Language -1</option>
                                                        <option>Language -2</option>
                                                        <option>Language -3</option>
                                                    </select>
                                                </div>
                                                <div class=" w-full  col-span-6 mt-3 ml-10 ">

                                                    <div
                                                        class="flex items-center text-gray-700 dark:text-gray-500 mt-2  ">
                                                        <input type="checkbox" class="input border mr-2" id="Fallback">
                                                        <label class="cursor-pointer select-none"
                                                            for="Fallback">Fallback</label>
                                                    </div>

                                                    <div
                                                        class="flex items-center text-gray-700 dark:text-gray-500 mt-2 ">
                                                        <input type="checkbox" class="input border mr-2"
                                                            id="Deterministic">
                                                        <label class="cursor-pointer select-none"
                                                            for="Deterministic">Deterministic</label>
                                                    </div>
                                                </div>
                                            </div>
                                          

                                    </div>
                                    <div class="text-gray-600 pb-2">Configure Parameters for this Message</div>
                                    <div class="  border-b dark:border-dark-5 pb-5 mt-5 defalut-param">
                                        <div class="w-full">
                                           
                                                <div class="text-gray-600 pb-3">{{ 1 }} Default Param</div>
                                            <!-- <div>Default Text</div> -->
                                            <input type="text" class="input border w-full" placeholder="Deafult Text">
                                          
                                        </div>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                                    </div>
                                    <div class=" border-b dark:border-dark-5 pb-5 mt-5 currency-param">
                                        <div class="w-full">
                                            <div class="text-gray-600 pb-3">{{ 2 }} Currency Param</div>

                                            <div class="grid grid-cols-12 gap-2"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Default Text">
                                                <input type="text" class="input w-full border col-span-4"
                                                    placeholder="Currency Code"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Amount"> </div>
                                              </div>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                                    </div>
                                    <div class=" border-b dark:border-dark-5 pb-5 mt-5 component-param">
                                        <div class="w-full">
                                            <div class="text-gray-600 pb-3">{{ 3 }} Component Param</div>

                                            <div class="grid grid-cols-12 gap-2"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Default Text">
                                                <input type="text" class="input w-full border col-span-4"
                                                    placeholder="Day of the Week"> <input type="text"
                                                    class="input w-full border col-span-4"
                                                    placeholder="Day of the Month"> </div>
                                            <div class="grid grid-cols-12 gap-2 mt-5"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Year"> <input
                                                    type="text" class="input w-full border col-span-4"
                                                    placeholder="Month"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Hour"> </div>
                                            <div class="grid grid-cols-12 gap-2 mt-5"> <input type="text"
                                                    class="input w-full border col-span-4" placeholder="Minute"> </div>

                                        </div>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                                    </div>
                                    <div class=" border-b dark:border-dark-5 pb-5 mt-5 unix-param">
                                        <div class="w-full">
                                            <div class="text-gray-600 pb-3">{{ 4 }} Unix Epoch Param</div>

                                            <div class="grid grid-cols-12 gap-2"> <input type="text"
                                                    class="input w-full border col-span-6" placeholder="Default Text">
                                                <input type="text" class="input w-full border col-span-6"
                                                    placeholder="Timestamp"> </div>

                                        </div>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x mx-auto"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                                    </div>
                                    <div class="flex items-center text-center dark:border-dark-5 pb-5 mt-5">
                                        <button id="add-defalut-param"
                                            class="button w-24 shadow-md mr-1 mb-2 bg-theme-7 text-white">Default</button>
                                        <button id="add-currency-param"
                                            class="button w-24 shadow-md mr-1 mb-2 bg-theme-7 text-white">Currency</button>
                                        <button id="add-component-param"
                                            class="button w-24 shadow-md mr-1 mb-2 bg-theme-7 text-white">Timestamp</button>
                                        <button id="add-unix-param" class="button w-24 shadow-md mr-1 mb-2 bg-theme-7 text-white">Unix
                                            Epoch</button>
                                    </div>
                                    <div class="flex  dark:border-dark-5 pb-5 mt-5">
                                        <button class="button  shadow-md mr-1 mb-2 bg-theme-1 text-white">Send
                                            Message</button>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-content__pane" id="text">
                            <div class="pr-1">
                                <div class="box p-5 mt-5">
                                    <div class="relative text-gray-700 dark:text-gray-300">
                                        Text
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="tab-content__pane " id="document">
                            <div class="pr-1">
                                <div class="box p-5 mt-5">
                                    <div class="relative text-gray-700 dark:text-gray-300">
                                        Document
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane active" id="media">
                            <div class="pr-1">
                                
                                <div class="box p-5 mt-5 text-center">
                                <div class="text-center" >
                             <form id="uploadForm" action="upload.php" method="post">  
                                   
                          <div class="intro-y col-span-12 sm:col-span-6">
                                                <div>
                                  <label class="flex flex-col sm:flex-row">Message text <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 2 characters</span> </label>
                                   <input type="text" name="message" value="" class="input w-full border mt-2" id="message_text" placeholder="Text" minlength="2" required="">
                                                </div>
                                            </div>
							  <br/>
                             <div class="intro-y col-span-12 sm:col-span-6"><input type="file" id="upload_file" name="file"></div>  
                            <div class="flex  dark:border-dark-5 pb-5 mt-5 items-center justify-center ">
                                <button class="button  shadow-md mr-1 mb-2 bg-theme-1 text-white" id='btnSubmit'>Upload File</button>
                           </div> 
					<div class="d-flex justify-content-around"><div><p class="lprogress_bar" style="display:none">Please wait</p> </div><div>         
                     <p class="login_error" style="display:none">Invalid Credentials</p></div></div>	
               	      <input name="upload" type="hidden" value='upload' class="text" id='text' />
							 <div id='success' class="inputFile" /></div>

							 </form>
                            </div>
                            </div>
                            </div>
                    </div>
                </div>
                <!-- END: Chat Side Menu -->

            </div>
        </div>
        <!-- END: Content -->
    </div>
  <?php  include("footer.php");   ?>
<script>
 $(document).ready(function (e){
   $("#uploadForm").on('submit',(function(e){
		e.preventDefault();
		$(".lprogress_bar").show();
		$(".login_error").hide();
		$.ajax({
		url: "upload.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
		//alert(data);
		$('#uploadForm')[0].reset();
	if(data === 'Error.Please try again'){
		$(".lprogress_bar").hide();
		$(".login_error").show();
	}else{
		$(".lprogress_bar").hide();
	   $("#success").html("Please use on below Message ID : "+data);
	}
return false;
},
error: function(){} 	        
       });
  }));
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


    </script>
