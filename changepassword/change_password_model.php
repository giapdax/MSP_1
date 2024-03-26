<?php

    declare(strict_types=1);
    function getUserByUserID(object $pdo, int $id)
    {
       $sql = "SELECT * FROM users WHERE id = :id;";
       $stmt = $pdo->prepare($sql);
       $stmt->bindValue(':id',$id,PDO::PARAM_INT);
       $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       return $user;
    }

    function updatePassword(object $pdo,int $id,string $newPassword)
    {
        $sql = "UPDATE users set password = :newPassword WHERE id = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':newPassword',$newPassword,PDO::PARAM_STR);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
    }

