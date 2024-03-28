<?php
    declare(strict_types=1);
 // This file is used to implemented query in database (CRUD)
    function getUsername(object $pdo, string $username)
    {
        $sql = "SELECT username FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username",$username,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function getEmail(object $pdo,string $email)
    {
        $sql = "SELECT email FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//    function isExistData(object $pdo, string $identity,string $type = 'username')
//    {
//        $column = ($type === 'username') ? 'username' : 'email';
//        $sql = "SELECT $column FROM users WHERE $column = :identity;";
//        $stmt = $pdo->prepare($sql);
//        $stmt->bindValue(":identity",$identity,PDO::PARAM_STR);
//        $stmt->execute();
//
//        return $stmt->fetch(PDO::FETCH_ASSOC);
//    }

    function createUser(object $pdo,string $username,string $password,string $email,int $role_id,string $activate_token) : void
    {
        $sql = "INSERT INTO users(username,password,email,role_id,activate_token) 
                    VALUES (:username,:password,:email,:role_id,:activate_token);";
        $stmt = $pdo->prepare($sql);
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $stmt->bindValue(":username",$username,PDO::PARAM_STR);
        $stmt->bindValue(":password",$hash_password,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":role_id",$role_id,PDO::PARAM_INT);
        $stmt->bindValue(":activate_token",$activate_token,PDO::PARAM_STR);
        $stmt->execute();
    }