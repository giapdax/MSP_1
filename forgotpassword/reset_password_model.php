<?php
    declare(strict_types=1);

    function getToken(object $pdo,string $token,string $expired) 
    {
        $sql = "SELECT * FROM pwdreset WHERE token= :token and expired >= :expired;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token',$token,PDO::PARAM_STR);
        $stmt->bindValue(':expired',$expired,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

