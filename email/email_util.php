<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/PHPMailer-master/src/SMTP.php';

    function emailService($subject,$receiver,$body)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rollnguyen57@gmail.com';
            $mail->Password = 'ezavkyoemptfrsqb';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom("rollnguyen57@gmail.com","Mailer");
            $mail->addAddress($receiver);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->send();
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }

    function resetPasswordEmail($receiver,$body){
        $subject = "RESET PASSWORD FOR YOUR APPLICATION";
        return emailService($subject,$receiver,$body);
    }

    function activateAccountEmail($receiver,$body){
        $subject = "Activate account for your application";
        return emailService($subject,$receiver,$body);
    }


    