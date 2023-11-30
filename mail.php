<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './assets/phpmailer/Exception.php';
require './assets/phpmailer/PHPMailer.php';
require './assets/phpmailer/SMTP.php';
require './assets/phpmailer/template.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;






$mail = new PHPMailer(true);
 
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'mail.smtp2go.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'otp-notification';                 
    $mail->Password   = 'hayao101422';                        
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                              
    $mail->Port       = 465;  
 
    $mail->setFrom('notification@nmscstshims.com', 'Name');           
    $mail->addAddress('liernuj25@gmail.com', 'Name');
    $template = new Template;
    $body = $template->OtpTemplate();
      
    $mail->isHTML(true);                                  
    $mail->Subject = 'Subject';
    $mail->Body    = $body;
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}