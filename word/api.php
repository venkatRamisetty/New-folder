<?php

session_start();

  include("config.php");
  include("ajax/common_functions.php");
  include('mailingdetails.php');
  
  $cdate=date('Y-m-d H:i:s');
  foreach($_POST as $variable => $value)
  $$variable = $value;
   //
  
  //if(isset($_SESSION["username"])){

	//  header("Location: details.php");   
 //       exit;    
 // }else{}

 if(isset($_POST['cmd']) &&  $_POST['cmd']=== 'create_template') {  
  //  echo "<pre>";
  //  print_r($_POST);
  //  echo "----------";
  //  print_r($_FILES);
  //  exit;
    global $ms;
    $email_data="Dear Team</br></br></br> The  template is created with the following details</br></br>";
    $client_id=$_SESSION['rsid'];
    $uid=$_SESSION['uid'];  
    $sql = "insert into `templates` ( `clientid`, `createdby`, `created_date`, `template_name`,`template_catagory_id` )
          values ('$client_id',' $uid','$cdate','$name','$category')";
    $r = mysqli_query($ms, $sql); 
    $last_id = mysqli_insert_id($ms);
    $email_data=$email_data."Template Name:".$name."</br>";
    $nlanguages=explode("-",$languages);
    $nlanguages_id=explode("-",$languages_id);
    $i=0;
    
    foreach($nlanguages as $rlanguage){
      $email_data=$email_data."Languages:".$rlanguage."</br>";
      $header_type=$_POST["header-".$nlanguages_id[$i]];
      $body_text=$_POST["bodytxt-".$nlanguages_id[$i]];
      $footer_text=$_POST["footertxt-".$nlanguages_id[$i]];
      $email_data=$email_data."Header Type:".$header_type."</br>";
      if($header_type=="text"){
        $header_text=$_POST['headertxt-'.$nlanguages_id[$i]];
        $email_data=$email_data."Header Text:".$header_text."</br>";
        $email_data=$email_data."Body Text:".$body_text."</br>";
        $sql = "insert into `template_details` ( `templates_id`, `language_id`, `header_type`, `header_Text`,`Media_type`,`boady_text`,`Parameters_count`, `footer_text`)
              values ('$last_id',' $nlanguages_id[$i]','1','$header_text','','$body_text','0','$footer_text')";
      }else{
        $media_type=$_POST['media-'.$nlanguages_id[$i]];
        $sql = "insert into `template_details` ( `templates_id`, `language_id`, `header_type`, `header_Text`,`Media_type`,`boady_text`,`Parameters_count`, `footer_text`)
               values ('$last_id',' $nlanguages_id[$i]','2','','$media_type','$body_text','0','$footer_text')";
        //code to upload file


        // $target_dir = "uploads/";
        
        // $uploadOk = 1;
        // $filename = $_FILES['media-'.$nlanguages_id[$i]]['name'];
        // $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $target_file = $target_dir . date('m-d-Y_H_i_s').".".$ext;
        // $file_format=explode("/",$_FILES['media-'.$nlanguages_id[$i]]['type'])[0];
        // if($file_format=='application'){
        //   $file_format="document";
        // }
       
        // if(move_uploaded_file($_FILES['media-'.$nlanguages_id[$i]]['tmp_name'],$target_file))
        //   {
        //     $email_data=$email_data."Body Text:".$body_text."</br>";
        //     $sql = "insert into `template_details` ( `templates_id`, `language_id`, `header_type`, `header_Text`,`Media_type`,`body_text`,`Parameters_count`, `footer_text`)
        //       values ('$last_id',' $nlanguages_id[$i]','$header_type','','$file_format','$body_text','0','$footer_text')";
        //   }else{
        //     echo "Error in Uploading file";
        //   } 
        ///code end to upload file
        
      }
      $r = mysqli_query($ms, $sql); 
      $template_details_id = mysqli_insert_id($ms);
      $server_id=0;
      //upload details
      // $sql = "insert into `media_upload_details` ( `uploaded_by`, `client_id`, `server_id`, `MediaType`,`mediaPath`,`Media_id`, `uploaded_at`)
      //         values ('$uid',' $client_id','$server_id','$file_format','$target_file','$template_details_id','$cdate')";
      // $r = mysqli_query($ms, $sql); 
      //upload details end
      //button details
      $button_type=$_POST['footerbtn-'.$nlanguages_id[$i]]; 
      $email_data=$email_data."Button Type:".$button_type."</br>";
      if($button_type=="calltoaction"){
        $actions=explode("&&&",rtrim($_POST['clt-'.$nlanguages_id[$i]],"&&&"));
        $btn_text=explode("&&&",rtrim($_POST['clttext-'.$nlanguages_id[$i]],"&&&"));
        $url_type=explode("&&&",rtrim($_POST['cltsel-'.$nlanguages_id[$i]],"&&&"));
        $url=explode("&&&",rtrim($_POST['clturl-'.$nlanguages_id[$i]],"&&&"));
        $country_code="+91";
        $k=0;
        foreach($actions as $action){
          $bt_text=$btn_text[$k];
          $burl=$url[$k];
          $burltype=$url_type[$k];
          $email_data=$email_data."Action:".$body_text."</br>";
          $email_data=$email_data."Action Text:".$bt_text."</br>";
          $email_data=$email_data."Button Type:".$burltype."</br>";
          $email_data=$email_data."url/Phone:".$burl."</br>";
          if($action=="CallPhone"){
            $sql = "insert into `template_buttons` ( `temlate_details_id`, `button_type`, `action_type`, `button_text`,`country_code`,`phone_number`, `URL_type`,`website_url`)
            values ('$template_details_id','1','1','$bt_text','$country_code','$burl','1','')";
          }else{
            $sql = "insert into `template_buttons` ( `temlate_details_id`, `button_type`, `action_type`, `button_text`,`country_code`,`phone_number`, `URL_type`,`website_url`)
            values ('$template_details_id','1','2','$bt_text','','','2','$burl')";
          }
          
          $r = mysqli_query($ms, $sql);
          $k++;
        }
        
      }else{
        $actions=explode("&&&",rtrim($_POST['quicktext-'.$nlanguages_id[$i]],"&&&"));
        $j=0;
        foreach($actions as $action){
          
          $sql = "insert into `template_buttons` ( `temlate_details_id`, `button_type`, `action_type`, `button_text`,`country_code`,`phone_number`, `URL_type`,`website_url`)
          values ('$template_details_id','2','3','$action','','','3','')";
          $r = mysqli_query($ms, $sql);
          $j++;
        }
        

      }
      

       
      ///button details end
      $i++; 

    }
    send_email(EMAIL,"Netxcell","Template Creation Email",$email_data);
    echo "11Successfully updated";
     

}
 ///
if(isset($_POST['cmd']) &&  $_POST['cmd']=== 'rsid') {  
  
    global $ms; 
	 $rsid=$_REQUEST['rsid'];
	session_start();$_SESSION["rsid"] = $rsid;

}


if(isset($_POST['cmd']) &&  $_POST['cmd']=== 'userdetails') {  
  
    global $ms; 
	//print_r($_REQUEST);exit;
         $user=$_REQUEST['username'];
		 $password=$_REQUEST['password'];
		 $email=$_REQUEST['email'];
		 $mobile=$_REQUEST['mobile'];
		 $altmobile=$_REQUEST['altmobile'];
		 $service=$_REQUEST['service'];
		 $reports=$_REQUEST['reports'];
		 $byid=$_SESSION["uid"];
	//Array ( [username] => venkat [password] => 123467 [email] => venkat@gmail.com [mobile] => 8121538746 [altmobile] => 8121538745 [service] => 1,2 [cmd] => userdetails )

$sql = "insert into `users` ( `username`, `displayname`, `password`, `contactnumber`,altermobile,`emailid`, `status`, `createdby`) values('$user',' $user','$password','$mobile','$altmobile','$email','1','$byid')";

  $r = mysqli_query($ms, $sql); 
   $last_id = mysqli_insert_id($ms);
  

  $servids=explode(',',$service);
 // print_r($servids);
 foreach($servids as $servid){
  $sql1 = "insert into `user_client_mapping` ( `userid`, `clientid`, `createdby`, `status`) values('$last_id','$servid','$byid','1')";
 $r2 = mysqli_query($ms, $sql1); 
  }

  
    echo "success"; exit;
}
   

   if(isset($_POST['cmd']) &&  $_POST['cmd']=== 'updateuserdetails') {  
  
    global $ms; 
	//print_r($_REQUEST);exit;
         $user=trim($_REQUEST['username']);
		 $password=trim($_REQUEST['password']);
		 $email=trim($_REQUEST['email']);
		 $mobile=trim($_REQUEST['mobile']);
		 $altmobile=trim($_REQUEST['altmobile']);
		 $service=trim($_REQUEST['service']);
		 $reports=trim($_REQUEST['reports']);
		  $status=trim($_REQUEST['status']);
		  $userid=trim($_REQUEST['userid']);
		  
		 $byid=$_SESSION["uid"];
	//Array ( [username] => venkat [password] => 123467 [email] => venkat@gmail.com [mobile] => 8121538746 [altmobile] => 8121538745 [service] => 1,2 [cmd] => userdetails )

    $sql1 = "update  `users` set  `username`='$user', `displayname`='$user', `password`='$password', `contactnumber`='$mobile',altermobile='$altmobile',`emailid`='$email', `status`='$status' where id='$userid' ";

   $r = mysqli_query($ms, $sql1); 
   $last_id = $userid;
  
   $sql = "DELETE FROM `user_client_mapping` WHERE `userid`=".$userid;
  $r2 = mysqli_query($ms, $sql); 
  $servids=explode(',',$service);
 foreach($servids as $servid){
    $sql1 = "insert into `user_client_mapping` ( `userid`, `clientid`, `createdby`, `status`) values('$last_id','$servid','$byid','1')";
    $r2 = mysqli_query($ms, $sql1); 
  }
    echo "success"; exit;
}

 
 
if(isset($_POST['cmd']) && $_POST['cmd'] == 'login') {  
//  echo "venkat"; exit;
    global $ms; 
   $password = $_POST['password'];
  $q="SELECT * FROM whatsapp_db.users WHERE username='".$_POST['username']."' AND password='".$password."' AND  status=1 LIMIT 1 ";
   $r = mysqli_query($ms, $q); 
 $rowcount=mysqli_num_rows($r);
   $rows = mysqli_fetch_assoc($r);
	//print_r( $rows );
if($rowcount > 0)	{ session_start();$_SESSION["username"] = $rows['username'];
 $_SESSION["uid"] = $rows['id']; $_SESSION["displayname"] = $rows['displayname']; echo "success";   }else {  echo "Invalid Credentials";   }
}
   
   if (!function_exists('session_register')) {
     function session_register($name){
        global $name;
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $name;
          } 
          $name = &$_SESSION[$name]; 
      }
    }


	 if (!function_exists('user_details')) {
     function user_details($uid){
        global $ms;
        //
       $q="SELECT * FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.id WHERE `user_client_mapping`.userid=$uid and  `user_client_mapping`.status=1";
      
       $r = mysqli_query($ms, $q); 
        return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);
        exit;   

      }
    }

if (!function_exists('user_services')) {
     function user_services(){
        global $ms;
	//
	$uid=$_SESSION['uid'];
        $rsid=$_SESSION["rsid"];
       $q="SELECT `clientdetails`.id , `clientdetails`.clientname FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.id WHERE `user_client_mapping`.userid=$uid and  `user_client_mapping`.status=1";
        $r = mysqli_query($ms, $q); 
       // return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);
	  $data='';
	  if (mysqli_num_rows($r) > 0) {
            while($row = mysqli_fetch_assoc($r)) {
				if($row["id"]==$rsid){$select='selected';}else{$select='';}
               $data .= "<option  ".$select." value='" . $row["id"]. "'> " . $row["clientname"]. "</option>";
            }
         }
		 return $data;
        exit;   

      }
    }


if (!function_exists('user_lists')) {
     function user_lists($uid){
        global $ms;
        //
       $q="SELECT u.id,u.username,u.status,uc.`clientid` FROM `users` AS u INNER JOIN user_client_mapping AS uc ON uc.`userid`=u.`id`  WHERE u.`createdby` =".$uid."  GROUP BY u.id ";
        $r = mysqli_query($ms, $q); 
       // return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);status
	  $data ='';
	  $i=1;
	  if (mysqli_num_rows($r) > 0) {
            while($row = mysqli_fetch_assoc($r)) {
             $uidd= $row['id'];
           $qs="SELECT `clientdetails`.id , `clientdetails`.clientname FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.id WHERE `user_client_mapping`.userid= ".$uidd." and  `user_client_mapping`.status=1";
        $rs = mysqli_query($ms, $qs); 
       // return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);
	  $datas='';
	  if (mysqli_num_rows($rs) > 0) {
            while($rows = mysqli_fetch_assoc($rs)) {
               $datas .= $rows["clientname"].',';
            }
         }
$data .='<tr>';
 $data .='<td>'.$i.'</td>';
 $data .="<td>".$row['username']."</td>";
 $data .='<td>'.$datas.'</td>';
 if($row['status']==1){$t="Active";}else{$t='Deactive';}
 $data .="<td>".$t."</td>";
 $data .='<td><a href="userform.php?id='.$uidd.'">edit</a></td>';
$data .='</tr>';
$i++;
            }

         }else{
		 $data .='<tr><td colspan="4">No Records</td>';
			$data .='</tr>';
		 }
		 return $data;
        exit;   

      }
    }

	






?>
