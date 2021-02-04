<?php
include("api.php");
 session_start();
$userd_services=user_services($_SESSION['uid']);

$uid=$_SESSION["uid"];
 if($uid==''){
  header('Location: login.php');
     exit();
 }

//print_r($_REQUEST);
$_SESSION["rsid"];
$users_details= user_details($_SESSION["uid"]);
$userd_services=user_services();

$userd_servicesa=user_services($_SESSION['uid']);
//print_r($_REQUEST);
if(isset($_GET['id']) && $_GET['id']){
 $qq="SELECT * FROM `users` WHERE id=".$_GET['id']." and status=1";

$r = mysqli_query($ms, $qq); 
       // return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);
	  $data='';
	  if (mysqli_num_rows($r) > 0) {
            while($row = mysqli_fetch_assoc($r)) {
				//print_r($row);
           
				$username=trim($row['username']);
				$password=trim($row['password']);
				$contactnumber=trim($row['contactnumber']);
				$altermobile=trim($row['altermobile']);
				$emailid=trim($row['emailid']);
				$status=trim($row['status']);
				$userservices=user_services($_SESSION['uid'],$_GET['id']);
				//$username=$row['username'];
            }
         }else{
		 
		 
		 }
}
include('header.php');

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
                                                    <input type="text" name="name" value="<?php  echo isset($username)?$username:$username; ?>"  class="input w-full border mt-2" id='uname' placeholder="Service Provider Name" minlength="2" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6"></div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">
                                                    <label class="flex flex-col sm:flex-row"> Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, email address format</span> </label>
                                                    <input type="email" name="email"  value="<?php  echo isset($emailid)?$emailid:$emailid; ?>"  class="input w-full border mt-2" id='email' placeholder="example@gmail.com" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <div class="mb-2">
                                                    <label class="flex flex-col sm:flex-row"> Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, at least 6 characters</span> </label>
                                                    <input type="text" name="password" value="<?php  echo isset($password)?$password:$password; ?>"  class="input w-full border mt-2"  id='password'   placeholder="******" minlength="6" required="">
                                                </div>
                                            </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                                <label class="flex flex-col sm:flex-row">Mobile Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Mobile Number only</span> </label>
                                        <input type="text" name="mobile" value="<?php  echo isset($contactnumber)?$contactnumber:$contactnumber; ?>"   class="input w-full border mt-2" placeholder="9999999990"   id='mobile'  minlength="10" maxlength="10" required="">
                                   </div>
                                   <div class="intro-y col-span-12 sm:col-span-6">
                                    <label class="flex flex-col sm:flex-row"> Alternate Mobile Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Mobile Number only</span> </label>
                            <input type="text" name="altmobile" class="input w-full border mt-2" value="<?php  echo isset($altermobile)?$altermobile:$altermobile; ?>"  placeholder="9999999990" minlength="10"  id='altmobile' maxlength="10" >
                       </div>
                                            <div class="intro-y col-span-12 sm:col-span-6">
                                               
											   <div class="mb-2">Select Services</div>
                                                <select class="multiselect input w-full border flex-1" id="selectservice" name='service[]' multiple="multiple" data-target="multi-0">
												<?php if($_GET['id']  && $status==1){echo $userservices;}else{ echo $userd_servicesa; } ?>   
                                                </select>
												 
                                            </div>
                                        <?php if($_GET['id'] && $status==1){ ?>
											<div class="intro-y col-span-12 sm:col-span-6">
                                               
											   <div class="mb-2">Status</div>
                                                <select name='status' id='status'>
												<option value='1' <?php if($status==1){echo 'selected';}else{} ?>> Active</option>
												<option value='2' <?php if($status==2){echo 'selected';}else{} ?>>DeActive</option>
                                                </select>
												 
                                            </div>
											<?php } ?> 
									<div class="d-flex justify-content-around">										
										<div><p class="lprogress_bar" style="display:none">Please wait</p></div>
									    <div><p class="login_error" style="display:none">Invalid Credentials</p></div>
									</div>
									<?php if($_GET['id']  && $status==1){ ?>
									<input type='hidden' id='submitid' value='updateuserdetails'>
									<input type='hidden' id='userid' value="<?php echo $_GET['id'];?>">
									<div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5"> <input type='button' class="button w-24 justify-center block bg-theme-1 text-white ml-2" id='userform' value='Update'></div>
									<?php }										
											else{?>
											<input type='hidden' id='submitid' value='userdetails'>
                                   <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5"> <input type='button' class="button w-24 justify-center block bg-theme-1 text-white ml-2" id='userform' value='Submit'></div>
								   <?php } ?>
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
<?php include('footer.php'); ?>
     

	 <script>

$(document).ready(function() {
            ///
      $("#userform").click(function(){
                var form = new FormData();
                var username=$("#uname").val();
                var email = $("#email").val();
				var password = $("#password").val();
				var mobile = $("#mobile").val();
				var altmobile = $("#altmobile").val();
				var service='';
			 var data = $('#selectservice option:selected').map(function() {	return $(this).val();}).get();
	         var userid = $("#userid").val();
             var submitid = $("#submitid").val();
             var status = $("#status").val();
			     form.append("username",username);
                 form.append("password",password);
				 form.append("email",email);
                //form.append("password",password);
				 form.append("mobile",mobile);
				 form.append("altmobile",altmobile);
                 form.append("service",data);
				 form.append("userid",userid);
				 form.append("status",status);
                 form.append("cmd", submitid);
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
					alert(response); 
					//return false;
                  if(response=="success"){
					  if(userid){
                   window.location.href = "userform.php?id="+userid;
					  }else{
						  window.location.href = "userlist.php";
					  }
                  }else {
                    //alert(response)
                    $(".login_error").show();
                    $(".lprogress_bar").hide();
                  }
                    
                 return false;   
                });
                   
            })
});
  </script>
