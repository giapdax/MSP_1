<?php declare(strict_types=1);

    function checkSignUpError(): void
    {
        if (isset($_SESSION['errors_signup'])){
            $errors = $_SESSION['errors_signup'];

            echo "<br>";
            foreach ($errors as $error){
                echo '<p class="form-error">' .$error . '</p>';
            }
            
            unset($_SESSION['errors_signup']);
        }else if (isset($_GET['signup']) && $_GET['signup'] === "success"){
            echo '</br>';
            echo '<p class="form-success">Sign-up success, Please check your-email to activate account </p>';
        }
    }