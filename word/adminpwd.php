<?php

//print_r();
 include("config.php");
   session_start();
   global $ms;
//print_r($_REQUEST);print_r($_FILES);exit;


$token='YWRtaW46TmV0eGNlbGxuZXdAMTIz';

//$data = array('new_password' => 'Netxcellnew@123');

$data = array(
    'new_password' => 'Netxcellnew@123'
);

$payload = json_encode($data);

$url='https://192.168.0.165:9090/v1/users/login';
//$data="new_password": "Netxcellnew@123";
 $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 300,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_SSL_VERIFYPEER=> false,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic $token",
            "Content-Type: application/json"
        ),
    ));

   $response = curl_exec($curl);
 $json= json_decode($response, TRUE);

//print_r($json);
$tokend= $json['users'][0]['token'];
$expires_after= $json['users'][0]['expires_after'];
//$dte=Y-m-d H:i:s;
$exp=$expires_after;
$sql = 'UPDATE token SET keyid="'.$tokend.'",edate ="'.$exp.'"  WHERE id=1';
   
   if (mysqli_query($ms, $sql)) {
     // echo "Record updated successfully<br>";

	   echo $tokend;

   } else {
    //  echo "Error updating record: " . mysqli_error($conn);
   }
$info = curl_getinfo($curl);

 exit;


?>