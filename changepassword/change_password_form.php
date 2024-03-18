<?php
    require_once "../config.php";
    require_once 'change_password_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/header1.css"> -->
    <link rel="stylesheet" href="../css/login.css">
    
    <title>Change Password</title>
</head>
<body>

    <?php
        if(!isset($_SESSION['user_id'])){
            echo "Khong ton tai user_id";
        }else{ ?>
            <form action="change_password.php" method="post">
                
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                <div class="login-box">
                    <div class="login-header">
                        <header>Change Password</header>
                        <?php
                            checkErrorChangePassword();
                        ?>
                    </div>
                    <div class="input-box">
                        <input type="password" name="oldPassword" class="input-field" placeholder="Old password..." autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="newPassword" class="input-field" placeholder="New password..." autocomplete="off" required>
                    </div>
                    <div class="input-box">
                        <input type="password" name="confirmNewPassword" class="input-field" placeholder="Confirm password" autocomplete="off" required>
                    </div>
                    <div class="input-submit">
                        <button class="submit-btn" id="submit"></button>
                        <label for="submit">Change</label>
                    </div>
            </form>
       <?php } ?>

</body>
</html>
