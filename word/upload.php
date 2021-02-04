<?php
   session_start();
//print_r();
ini_set('display_errors',1);
error_reporting(E_ALL);
 include("config.php");
  global $ms;
$uid=$_SESSION["uid"];
$message=$_REQUEST['message'];

$rsid=$_SESSION["rsid"];
   //include_once 'database.php';
if(isset($_REQUEST['upload']))
{   
     
 $file = rand(1000,100000)."_".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/user".$_SESSION["uid"].'/';
 
 $new_size = $file_size/1024;  
 
 $new_file_name = strtolower($file);
 if(move_uploaded_file($file_loc,$folder.$new_file_name))
 {

 $token='eeyJhbGciOiAiSFMyNTYiLCAidHlwIjogIkpXVCJ9.eyJ1c2VyIjoiYWRtaW4iLCJpYXQiOjE2MDk4MzA2MzgsImV4cCI6MTYxMDQzNTQzOCwid2E6cmFuZCI6Ijc0ZmZiMzIwYjcyZjBiMjhhMGUyM2I5MzA5MDBhMmU5In0.pz71Dyg1pRcVmGOhrF3CK4_pBLL1qV8YqBHaA7USBM';
$header = array('Content-Type: multipart/form-data');
$headers = array(   'Content-Type: image/jpeg',  'Connection: Keep-Alive', 'Authorization: Bearer ' . $token);
 $url='https://192.168.0.165:9090/v1/media';
$filename='http://192.168.0.81:8081/whatsapp_dashboard/'.$folder.$new_file_name;

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => file_get_contents($filename),
        CURLOPT_SSL_VERIFYPEER=> false,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $token",
            "Content-Type: multipart/form-data",
            "Content-Length: " . strlen(file_get_contents($filename))           
        ),
    ));

    $response = curl_exec($curl);
    $info = curl_getinfo($curl);
    $json= json_decode($response, TRUE);
    $tid= $json['media'][0]['id'];

 if($tid){
    $sql="insert into `messagelist` (`message_id`, `message_text`, `file_path`, `upload_by`, `upload_type`, `upload_service_id`) values('$tid','$message','$filename','$uid','Media','$rsid')";
    mysqli_query($ms,$sql);
    echo $tid;exit;
   }
    curl_close($curl); 
 }
 else {  echo "Error.Please try again"; exit;}
}

?>
