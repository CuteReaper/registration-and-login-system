<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

function forgot_mail_sender2($email,$name,$token){
    $mail = new PHPMailer(true);
    echo "try to connect to mail server";
                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.web-page.freehostlk.xyz';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admin@web-page.freehostlk.xyz';                     //SMTP username
    $mail->Password   = '@p(sxgi]!F._';                               //SMTP password
    $mail->SMTPSecure = 'ssl';           //Enable implicit TLS encryption PHPMailer::ENCRYPTION_SMTPS
    $mail->Port       = 465;
    
    echo "connected to mail server";//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('admin@web-page.freehostlk.xyz',"admin");
     //Add a recipient
    $mail->addAddress($email , $name);               //Name is optional

    $mail->isHTML(true); 
    $mail->Subject = 'password reset test';
    echo "try to send mail";
    $email_templete = "$email,<br>"."$name".",<br>
    http://localhost:8000/controller/change-password.php?token=$token&email=$email <br>";
    $mail->Body = $email_templete;
    $mail->send();
    echo "mail sended";

    
}