<?php
    declare(strict_types=1);

    function isExistToken(object $pdo,string $token,string $expired)
    {
        return getToken($pdo,$token,$expired);
    }
