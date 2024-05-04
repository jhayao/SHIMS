<?php
require_once ('../controller/database.php');
require_once '../assets/phpmailer/PHPMailer.php';
require_once '../assets/phpmailer/SMTP.php';
require_once '../assets/phpmailer/template.php';
require_once '../assets/phpmailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Otp
{
    public function sendMail($email, $name)
    {
        $template = new Template();
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host = 'mail.nmscstshims.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'notification@nmscstshims.com';
            $mail->Password = '0,&l+r-Gc0_J';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('notification@nmscstshims.com', 'OTP Verification');
            $mail->addAddress($email, $name);
            $template = new Template;
            $body = $template->OtpTemplate();

            $mail->isHTML(true);
            $mail->Subject = 'Subject';
            $mail->Body = $body;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
