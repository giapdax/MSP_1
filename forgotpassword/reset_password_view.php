<?php
    declare(strict_types=1);

    function checkErrorResetPassword() : void
    {
        if(isset($_SESSION['reset_password_error'])){
            $errors = $_SESSION['reset_password_error'];

            echo '</br>';

            foreach ($errors as $error){
                echo  '<p class="form-error">' .$error .'</p>';
            }
            unset($_SESSION['reset_password_error']);
        }else if (isset($_GET['reset_password']) and $_GET['reset_password'] === 'success'){
            echo '</br>';
            echo '<p class="form-success">Reset password successfully,Please login again! </p>';
        }
    }