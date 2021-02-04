<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'phpmail/Exception.php';

require 'phpmail/PHPMailer.php';
require 'phpmail/SMTP.php';
function send_email($to,$name="Netxcell",$subject,$message){
    

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 1;  
    $mail->SMTPAuth   = TRUE;
    //$mail->SMTPSecure = "tls";
    $mail->Port       = 25;
    $mail->Host       = "nxlmail.netxcell.com";
    $mail->Username   = "whatsapp.support@netxcell.com";
    $mail->Password   = "Reset@123";
    $mail->IsHTML(true);
    $mail->AddAddress($to, $name);
    $mail->SetFrom("whatsapp.support@netxcell.com", "Netxcell");
    $mail->AddReplyTo("whatsapp.support@netxcell.com", "No Reply");
    //$mail->AddCC("sudhir9909@gmail.com", "cc-recipient-name");
    $mail->Subject = $subject;
    $content = $message;
    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      return false;
     // var_dump($mail);
    } else {
      return true;
    }
}
?>