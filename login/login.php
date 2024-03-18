<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        try {
            $pdo = require_once( '../database.php');
            require_once 'login_contr.php';
            require_once 'login_model.php';

            //Exception
            $errors = [];
            $result = getUserByUsername($pdo,$username);

            if(!isValidateUsername($result)){
                $errors['login_failed'] = "Incorrect_information";
            }
            if (isValidateUsername($result) && !isValidatePassword($password,$result['password'])){
                $errors['login_failed'] = "Incorrect_information";
            }
            require_once  '../config.php';
            if ($errors){
                $_SESSION['errors_login'] = $errors;
                header("Location:loginform.php");
                die();
            }
            $newSessionID = session_create_id();
            $sessionID = $newSessionID . '_' . $result['id'];
            session_id($sessionID);
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_username'] = htmlspecialchars($result['username']);
            $role = $result['role_id'];
            $_SESSION['last_generation'] = time();
            $_SESSION['user_role_id'] =  $role ;
            //Dispatch
            header("Location:../trangchu.php");
            die();

        }catch (PDOException $exception){
            die("Query failed: ". $exception->getMessage());
        }
    }else{
        header("Location:loginform.php");
        die();
    }
