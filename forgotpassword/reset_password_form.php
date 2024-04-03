<?php
    require_once '../config.php';
    require 'reset_password_view.php';
    require 'reset_password_model.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Reset Password|</title>
</head>
<body>
    <?php
        if(!isset($_GET['token'])){
            require '../404.php';
        }else { ?>
    <form action="reset_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
        <div class="login-box">
            <div class="login-header">
                <header>Reset password</header>
                <?php
                    checkErrorResetPassword();
                ?>
            </div>
            <div class="input-box">
                <input type="password" name="new_password"
                       class="input-field" placeholder="Your new password..." autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password"
                       class="input-field" placeholder="Confirm password..." autocomplete="off" required>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit" name="reset-password"></button>
                <label for="submit">Reset password</label>
            </div>
            <a href="../login/loginform.php" class="btn">Log In</a>
            <a href="../trangchu.php" class="btn">Quay lại trang chủ</a>
    </form> 
    <?php } ?>



</body>
</html>