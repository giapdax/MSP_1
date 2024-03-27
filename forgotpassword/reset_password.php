<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $password = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];
        $token = $_POST['token'];
        $expired = date('U');

        try {
            $errors = [];

            $pdo = require "../database.php";
            require 'reset_password_model.php';
            require 'reset_password_contr.php';
            $result = getToken($pdo,$token,$expired);
            if($password !== $confirmPassword){
                $errors['password_not_match'] = 'Password do not match';
            }
            if(empty($password) || empty($confirmPassword)){
                $errors['empty'] = 'Do not blank';
            }
            if (strpos($password, ' ') !== false) {
                $errors['invalid_password'] = 'Password must not contain spaces';
            }
            if(!isExistToken($pdo,$token,$expired)){
                $errors['resend_email'] = 'Could not reset password. Please resend email';
            }
            require '../config.php';
            if ($errors){
                $_SESSION['reset_password_error'] = $errors;
                header("Location:reset_password_form.php?token=".$token);
                die();
            }
                $email = $result['email'];
                $hash_password = password_hash($password,PASSWORD_DEFAULT);
                $sql = "UPDATE users SET password = :password WHERE email = :email";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':email',$email,PDO::PARAM_STR);
                $stmt->bindValue(':password',$hash_password,PDO::PARAM_STR);
                $stmt->execute();
                
                header("Location:reset_password_form.php?token=".$token."&reset_password=success");
        
        }catch (PDOException $exception){
            die("Query failed: ".$exception->getMessage());
        }

    }else{
        header("Location:reset_password_form.php");
        die();
    }