<?php
    function checkErrorChangePassword() : void
    {
        if(isset($_SESSION['change_password_error'])){
            $errors = $_SESSION['change_password_error'];

            echo '</br>';
            foreach ($errors as $error){
                echo '<p class="form-error">' .$error . '</p>';
            }
            unset($_SESSION['change_password_error']);
        } else if (isset($_GET['changepassword']) && $_GET['changepassword'] === "success"){
            echo '</br>';
            echo '<p class="form-success">Change_success </p>';
        }

        // Thêm nút quay lại trang chủ
        echo '</br>';
        echo '<a href="../trangchu.php" class="btn">Quay lại trang chủ</a>'; 
    }
?>
