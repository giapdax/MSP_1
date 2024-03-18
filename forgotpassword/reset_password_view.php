<?php
    declare(strict_types=1);

    function checkErrorResetPassword() : void
    {
        if(isset($_SESSION['reset_password_error'])){
            $errors = $_SESSION['reset_password_error'];

            echo '</br>';

            foreach ($errors as $error){
                echo  $error;
            }
            unset($_SESSION['errors_login']);
        }else if (isset($_GET['reset_password']) and $_GET['reset_password'] === 'success'){
            echo '</br>';
            echo '<p class="form-success">Reset password successfully,Please login again! </p>';
        }
    }