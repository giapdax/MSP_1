<?php declare(strict_types=1);
    function isEmailValid(string $email) : bool
    {
        return !filter_var($email,FILTER_VALIDATE_EMAIL);
    }
    function isMatchPasswordAndConfirmPassword(string $password,string $confirmPassword) : bool
    {
        return ($password !== $confirmPassword);
    }
    function isExistUsername(object $pdo, string $username) 
    {
        return getUsername($pdo,$username);
    }
    function isExistEmail(object $pdo,string $email)
    {
        return getEmail($pdo,$email);
    }

    function addUser(object $pdo,string $username,string $password,string $email) : void
    {
        createUser($pdo,$username,$password,$email,1);
    }
