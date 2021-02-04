<?php
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//require 'phpmail/Exception.php';
require 'phpmail/PHPMailer.php';
require 'phpmail/SMTP.php';
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
$mail->AddAddress("sudheerreddy.p@netxcell.com", "recipient-name");
$mail->SetFrom("whatsapp.support@netxcell.com", "from-name");
$mail->AddReplyTo("whatsapp.support@netxcell.com", "reply-to-name");
$mail->AddCC("sudhir9909@gmail.com", "cc-recipient-name");
$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
 // var_dump($mail);
} else {
  echo "Email sent successfully";
}

?>
