<?php
session_start();
  include("config.php");
   //
  
  //if(isset($_SESSION["username"])){

	//  header("Location: details.php");   
 //       exit;    
 // }else{}




if (!function_exists('rsid')) {
     function rsid(){
        global $ms;
        //
		$uid=$_SESSION['uid'];
		$rsid=$_SESSION["rsid"];
       $q="SELECT `clientdetails`.id , `clientdetails`.clientname FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.clientid WHERE `user_client_mapping`.userid=$uid and  `user_client_mapping`.status=1";
        $r = mysqli_query($ms, $q); 
       // return $rowcount=mysqli_num_rows($r);
      //  $rows = mysqli_fetch_assoc($r);
	  $data='';
	  if (mysqli_num_rows($r) > 0) {
            while($row = mysqli_fetch_assoc($r)) {
$data=$row["id"];
				//if($row["id"]==$rsid){$select='selected';}else{$select='';}
               //$data .= "<option  ".$select." value='" . $row["id"]. "'> " . $row["clientname"]. "</option>";
            }
         }
		 return $data;
        exit;   

      }
    }


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
       $q="SELECT * FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.clientid WHERE `user_client_mapping`.userid=$uid and  `user_client_mapping`.status=1";
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
       $q="SELECT `clientdetails`.id , `clientdetails`.clientname FROM `clientdetails`INNER JOIN `user_client_mapping` ON `clientdetails`.id=`user_client_mapping`.clientid WHERE `user_client_mapping`.userid=$uid and  `user_client_mapping`.status=1";
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