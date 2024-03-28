<?php
    require_once "../config.php";
    require_once 'forgot_password_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Forgot password </title>
</head>
<body>
<form action="forgot_password.php" method="post">
    <div class="login-box">
        <div class="login-header">
            <header>Forgot Password</header>
            <?php
                checkErrorsForgotPassword();
            ?>
        </div>
        <div class="input-box">
            <input type="email" name="email" class="input-field" placeholder="Enter your email......" autocomplete="off" required>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit" name="send"></button>
            <label for="submit">Continue</label>
        </div>
        <a href="../trangchu.php" class="btn">Quay lại trang chủ</a>
</form>
</body>
</html>