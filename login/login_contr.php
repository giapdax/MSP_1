<?php
    declare(strict_types=1);
    function isValidatePassword(string $password,string $hashPassword) : bool
    {
        return (password_verify($password,$hashPassword));
    }
    function isValidateUsername(bool|array $result) : bool|array
    {
        return $result;
    }
