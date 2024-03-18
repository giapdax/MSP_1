<?php
    $dsn = "mysql:host=localhost;dbname=msp";
    $db_username = "root";
    $db_password = "mysql";
        try {
    $pdo = new PDO($dsn,$db_username,$db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }   catch (PDOException $exception){
        echo "Connection failed: " . $exception->getMessage();
    }
    return $pdo;
