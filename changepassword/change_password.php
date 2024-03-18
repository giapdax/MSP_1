<?php
    require_once '../config.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])){
        $userID = $_POST['user_id'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmNewPassword'];
        $hash_password = password_hash($newPassword,PASSWORD_DEFAULT);

        try {
            $pdo = require_once "../database.php";
            require_once 'change_password_model.php';
            require_once 'change_password_contr.php';
            $result = getUserByUserID($pdo,$userID);
            $errors = [];

            if(!isValidatePassword($oldPassword,$result['pwd'])){
                $errors['OldPassword_not_correct'] = 'OldPassword not correct';
            }
            if($newPassword !== $confirmPassword){
                $errors['Password_does_not_match'] = 'Confirm password does not match';
            }
            if($errors){
                $_SESSION['change_password_error'] = $errors;
                header("Location:change_password_form.php");
                die();
            }
            updatePassword($pdo,$userID,$hash_password);
            header("Location:change_password_form.php?changepassword=success");
            

        }catch (PDOException $exception){
            die("Query failed: ".$exception->getMessage());
        }
    }else{
        header("Location:loginform.php");
        die();
    }