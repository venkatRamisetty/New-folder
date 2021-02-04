<?php

$req1=array(
    "si_type"=>"ONDEMAND", 
    "si_ref_no"=>789654123, 
    "si_amount"=>2.00,  
    "si_setup_amount"=>4.00,
    "si_currency"=>"AED",
    "si_start_date"=>"14/01/2021", 
    "si_frequency"=>1,
    "si_frequency_type"=>"days",
    "si_billing_cycle"=>2,
    "si_customer_email"=>"xxxx.xxxx@xxxxx.xxxx",
    "si_customer_mobile_number"=>7878787878, 
    "si_customer_name"=>"xxxxx", 
    "si_billing_address"=>"santacruz",
    "si_billing_city"=>"mumbai",
    "si_billing_country"=>"india",
    "si_billing_state"=>"maharashtra",
    "si_billing_zip"=>400054,
    "si_shipping_address"=>"santacruz",
    "si_shipping_city"=>"mumbai",
    "si_shipping_country"=>"india",
    "si_shipping_state"=>"maharashtra",
    "si_shipping_zip"=>400054,
    "si_is_card_included"=>"yes",
    "si_card_name"=>"MASTERCARD",
    "si_card_number"=>"5123456789012346",
    "si_card_expired_date"=>"05/2021",
    "si_name_on_card"=>"Customer" 
);
$req=json_encode($req1);
include('crypto.php');      
$req= encrypt($req,'11BBAC2202DCF7BDBA895F120ABC4EB8');
  echo "Req".$req."</br>";     
  $curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://login.ccavenue.ae/apis/servlet/DoWebTrans',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => 'enc_request='.$req.'&access_code=AVZJ03IA64AJ91JZJA&command=createSI&request_type=JSON&response_type=JSON&version=1.1',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/x-www-form-urlencoded'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo "</br>Response";
echo "<pre>";
parse_str($response);

$response=$enc_response;
echo $response;
echo "-----</br>";      
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
$REP= decrypt($response,'11BBAC2202DCF7BDBA895F120ABC4EB8');	
echo "</br>Rep:".$REP;
}catch(Exception $e){
	print_r($e->getMessage());
}
?>