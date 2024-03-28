<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $token = $_POST['token'];
        try{
            $pdo = require '../database.php';
            require 'verify_account_model.php';
            $result = getUserByActivateToken($pdo,$token);
            $errors = [];
            if(!$result){
                $errors['error'] = "Please resend email";
            }
            require '../config.php';
            if($errors){
                $_SESSION['activate_account_error'] = $errors;
                header("Location:verify_account_form.php?token".$token);
                die();
            }
            $email = $result['id'];
            //Set activate for user
            $sql = "UPDATE users set isActivated = true,activate_token = null WHERE id = :id;";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id",$email,PDO::PARAM_INT);
            $stmt->execute();
            header("Location:verify_account_form.php?token=".$token."&verify_account=success");
        }catch(PDOException $exception){
            die("Query failed: ". $exception->getMessage());
        }
    }else{
        header("Location:verify_account_form.php");
        die();
    }
?>