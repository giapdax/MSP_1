<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];
        try {
            $pdo = require_once  '../database.php';
            require_once 'signup_model.php';
            require_once 'signup_contr.php';
            $errors = [];
            if (isMatchPasswordAndConfirmPassword($password,$confirm_password)){
                $errors['confirm_password'] = "Password do not match";
            }
            if (isExistUsername($pdo,$username)){
                $errors['username_exist'] = "Username already exist";
            }
            if (isExistEmail($pdo,$email)){
                $errors['email_exist'] = "Email already exist";
            }
            if (isEmailValid($email) || !preg_match('/^\\S+@\\S+\\.\\S+$/',$email)){
                $errors['invalid_email'] = "Invalid email";
            }
//            if(!preg_match('^(?=.*[a-zA-Z])[a-zA-Z0-9]{8,}$', $username)){
//                $errors['invalid_username'] =
//                    'Username must have least 8 characters,
//                     does not contain space and special character';
//            }
            require_once  '../config.php';
            if ($errors){
                $_SESSION['errors_signup'] = $errors;
                header("Location:signupform.php");
                die();
            }
            addUser($pdo,$username,$password,$email);
            header("Location:signupform.php?signup=success");
        }catch (PDOException $exception){
            die("Query failed: " . $exception->getMessage());
        }
    }else{
        die();
    }