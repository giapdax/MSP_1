<?php
declare(strict_types=1);
    function checkErrorsLogin() : void
    {
        if (isset($_SESSION['errors_login'])){
             $errors = $_SESSION['errors_login'];
             echo '</br>';

             foreach ($errors as $error){
                 echo  $error;
             }
             unset($_SESSION['errors_login']);
        }else if (isset($_GET['login']) && $_GET['login'] === 'success'){
            echo '</br>';
            echo '<p class="form-success">Login successfully </p>';
        }
    }
