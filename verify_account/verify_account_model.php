<?php
    declare(strict_types=1);
    function getUserByActivateToken(object $pdo,string $activate_token){
        $sql = "SELECT * FROM users WHERE activate_token = :activate_token;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":activate_token",$activate_token,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }