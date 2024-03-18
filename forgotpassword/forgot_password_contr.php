<?php
    declare(strict_types=1);

    function isEmailExist(object $pdo,string $email) 
    {
        return getUserByEmail($pdo,$email);
    }

    function isTokenExist(object $pdo, string $email) : bool
    {
        return deleteEmailExistPwdReset($pdo,$email);
    }
    function addRecordPwd(object $pdo,string $email,string $token,string $expired) : void
    {
         createPasswordReset($pdo,$email,$token,$expired);
    }