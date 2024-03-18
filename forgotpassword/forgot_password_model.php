<?php
    declare(strict_types=1);
    function getUserByEmail(object $pdo,string $email)
    {
        $sql = "SELECT * FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function deleteEmailExistPwdReset(object $pdo,string $email)
    {
        $sql = "DELETE FROM pwdreset WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function createPasswordReset(object $pdo,string $email,string $token,string $expired) : void
    {
        $sql =  "INSERT INTO pwdreset(email,token,expired)
                    VALUES (:email,:token,:expired);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':token',$token,PDO::PARAM_STR);
        $stmt->bindValue(':expired',$expired,PDO::PARAM_STR);
        $stmt->execute();
    }

