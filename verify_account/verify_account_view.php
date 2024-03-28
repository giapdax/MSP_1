<?php
    declare(strict_types=1);
    function checkVerify(){
        if(isset($_SESSION['activate_account_error'])){
            $errors = $_SESSION['activate_account_error'];

            echo '</br>';

            foreach ($errors as $error){
                echo '<p class="form-error">' .$error . '</p>';
            }
            unset($_SESSION['activate_account_error']);
        }else if(isset($_GET['verify_account']) and $_GET['verify_account'] === 'success'){
            echo '</br>';
            echo '<p class="form-success">Activated successfully </p>';
        }
    }