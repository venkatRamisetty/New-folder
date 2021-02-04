<?php

include('crypto.php');
$req='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
        <SI_Creation_Query>
        <si_type>ONDEMAND</si_type>
        <si_ref_no>789654123</si_ref_no>
        <si_amount>2.00</si_amount>
        <si_setup_amount>4.00</si_setup_amount>
        <si_currency>AED</si_currency>
        <si_start_date>14/01/2021</si_start_date>
        <si_frequency>1</si_frequency>
        <si_frequency_type>days</si_frequency_type>
        <si_billing_cycle>10</si_billing_cycle>
        <si_customer_email>Saravanan.chokalingam@avenues.info</si_customer_email>
        <si_customer_mobile_number>8097177090</si_customer_mobile_number>
        <si_customer_name>Saravanan Chokalingam</si_customer_name>
        <si_billing_address>santacruz</si_billing_address>
        <si_billing_city>mumbai</si_billing_city>
        <si_billing_country>india</si_billing_country>
        <si_billing_state>maharashtra</si_billing_state>
        <si_billing_zip>400054</si_billing_zip>
        <si_shipping_address>santacruz</si_shipping_address>
        <si_shipping_city>mumbai</si_shipping_city>
        <si_shipping_country>india</si_shipping_country>
        <si_shipping_state>maharashtra</si_shipping_state>
        <si_shipping_zip>400054</si_shipping_zip>
        <si_is_card_included>yes</si_is_card_included>
        <si_card_name>MASTERCARD</si_card_name>
        <si_card_number>5123456789012346</si_card_number>
        <si_card_expired_date>05/2021</si_card_expired_date>
        <si_name_on_card>Customer</si_name_on_card>
        
        </SI_Creation_Query>
    ';
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
  CURLOPT_POSTFIELDS => 'enc_request='.$req.'&access_code=AVZJ03IA64AJ91JZJA&command=createSI&request_type=XML&response_type=XML&version=1.1',
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
echo decrypt($response,'11BBAC2202DCF7BDBA895F120ABC4EB8');	
}catch(Exception $e){
	print_r($e->getMessage());
}


?>