<?php
    ini_set('session.use_only_cookies',1);
    ini_set('session.use_strict_mode',1);

    session_set_cookie_params([
        'lifetime' => 1800,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true
    ]);

    session_start();
    //Check user logged into website?
    if(isset($_SESSION['user_id'])){
        //If last session doesn't exist
        if (!isset($_SESSION['last_regeneration'])){
            regenerateSessionLogged();
        }else{
            $INTERVAL = 1800;
            if (time() - $_SESSION['last_regeneration'] >= $INTERVAL){
                regenerateSessionLogged();
            }
        }
    }else{
//        header("Location:../loginform.php");
//        die();
        if(!isset($_SESSION['last_regeneration'])){
            session_regenerate_id(true);
            $_SESSION['last_regeneration'] = time();
        }else{
            $INTERVAL = 1800;
            if (time() - $_SESSION['last_regeneration'] >= $INTERVAL){
                session_regenerate_id(true);
                $_SESSION['last_regeneration'] = time();
            }
        }
    }
    function regenerateSessionLogged() : void
    {
        $userID = $_SESSION['user_id'];
        session_regenerate_id(true);
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" .$userID;
        session_id($sessionId);
        $_SESSION['last_regeneration'] = time();
    }






