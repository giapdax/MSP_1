<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $token = bin2hex(random_bytes(16));
        $expired = date('U') + 300; // thời hạn token có giá trị
        $url = "Hi there, click on this <a href=http://localhost/MSP/forgotpassword/reset_password_form.php?token=". $token
            .">Link</a> to resest your password for application" ;
        $userEmail = $_POST['email'];
        try {
            
            $pdo = require_once "../database.php";
            require_once 'forgot_password_model.php';
            require_once 'forgot_password_contr.php';
            require_once "../email/email_util.php";
            $errors = [];
            
            if(!isEmailExist($pdo,$userEmail)){
                $errors['email_not_exist'] = "Email is not exist";
            }
            require_once '../config.php';
            if($errors){
                $_SESSION['forgot_password_error'] = $errors;
                header("Location:forgot_password_form.php");
                die();
            }
            deleteEmailExistPwdReset($pdo,$userEmail);

            addRecordPwd($pdo,$userEmail,$token,$expired);
            //Send email
            resetPasswordEmail($userEmail,$url);
            header("Location:forgot_password_form.php?forgot_password=success");

        }catch (PDOException $exception){
            die("Query failed: ". $exception->getMessage());
        }
    }else{
        header("Location:forgot_password_form.php");
        die();
    }