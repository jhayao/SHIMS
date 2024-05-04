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
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "mail.nmscstshims.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'notification@nmscstshims.com';
    $mail->Password = '0,&l+r-Gc0_J';oc
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('notification@nmscstshims.com', 'Name');
    $mail->addAddress('liernuj25@gmail.com', 'Name');
    // $template = new Template;
    // $body = $template->OtpTemplate();
    $body = "Hello World";
    $mail->isHTML(true);
    $mail->Subject = 'Subject';
    $mail->Body = $body;
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}