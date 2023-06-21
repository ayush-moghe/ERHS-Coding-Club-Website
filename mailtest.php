<?php
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
//
//require 'vendor/autoload.php'; // Path to autoload.php from vendor folder
//
//
//
//
//$mail = new PHPMailer(true);
//$mail->isSMTP();
//$mail->Mailer = "smtp";
//
//$mail->SMTPDebug  = 1;
//$mail->SMTPAuth   = TRUE;
//$mail->SMTPSecure = "tls";
//$mail->Port       = 587;
//$mail->Host       = "smtp.gmail.com";
//$mail->Username   = "officialerhscodingclub@gmail.com";
//$mail->Password   = "nvyfddttmeatydyp";
//
//$mail->IsHTML(true);
//$mail->AddAddress("hypebyteprogrammer@gmail.com", "HypeByte");
//$mail->SetFrom("verify@erhscodingclub.org", "ERHS Coding CLub");
//$mail->AddReplyTo("verify@erhscodingclub.org", "ERHS Coding Club");
//$mail->Subject = "Test is Test Email sent via Gmail SMTP Server using PHP Mailer";
//$content = "<b>This is a Test Email sent via Gmail SMTP Server using PHP mailer class.</b>";
//
//$mail->MsgHTML($content);
//$mail->Send();