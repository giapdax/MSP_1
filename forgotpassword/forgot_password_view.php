<?php
    declare(strict_types=1);
    function checkErrorsForgotPassword() : void
    {
        if (isset($_SESSION['forgot_password_error'])) {
            $errors = $_SESSION['forgot_password_error'];

            echo '</br>';
            foreach ($errors as $error) {
                echo '<p class="form-error">' .$error . '</p>';
            }
            unset($_SESSION['forgot_password_error']);
        }else if (isset($_GET['forgot_password']) and $_GET['forgot_password'] === 'success'){
            echo '</br>';
            echo '<p class="form-success">Check your e-mail </p>';
        }
    }
