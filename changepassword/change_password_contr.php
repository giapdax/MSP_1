<?php
function isValidatePassword(string $password,string $hashPassword) : bool
{
    return (password_verify($password,$hashPassword));
}
