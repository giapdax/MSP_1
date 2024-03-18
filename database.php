<?php
    $dsn = "mysql:host=localhost;dbname=test";
    $db_username = "root";
    $db_password = "tanphong1302";
        try {
    $pdo = new PDO($dsn,$db_username,$db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }   catch (PDOException $exception){
        echo "Connection failed: " . $exception->getMessage();
    }
    return $pdo;
