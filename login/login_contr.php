<?php
    declare(strict_types=1);
    function isValidatePassword(string $password,string $hashPassword)
    {
        return (password_verify($password,$hashPassword));
    }
    function isValidateUsername($result) {
        return is_bool($result) || is_array($result);
    }
    