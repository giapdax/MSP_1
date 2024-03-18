<?php
    require_once  '../config.php';
    require_once('signup_view.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Sign Up |</title>
</head>
<body>
    <form action="signup.php" method="post">
        <div class="login-box">
            <div class="login-header">
                <header>Sign Up</header>
                <?php
                checkSignUpError();
                ?>
            </div>
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" class="input-field" placeholder="Confirm password" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" class="input-field" placeholder="Email" autocomplete="off" required>
            </div>
            <div class="input-submit">
                <button class="submit-btn" id="submit"></button>
                <label for="submit">Sign Up</label>
            </div>
            <div class="sign-up-link">
                <p>If you have account? Please <a href="../login/loginform.php">log in</a> here!</p>
            </div>
    </form>
</body>
</html>`