<?php
    declare(strict_types=1);
    function getUserByUsername(object $pdo,string $username)
    {
        $sql = "SELECT * FROM users WHERE username = :username;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":username",$username, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
