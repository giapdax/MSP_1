<?php
    require_once '../config.php';
    require_once 'login_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>

</head>
<body>

    <form action="login.php" method="post">
        <div class="login-box">
            <div class="login-header">
                <header>Login</header>
                <div class="form-error">
                    <?php
                    checkErrorsLogin();
                    ?>
                </div>
            </div>
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="forgot" >
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="../forgotpassword/forgot_password_form.php">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <button class="submit-btn" type="submit" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
            <div class="sign-up-link">
                <p>Don't have account? <a href="../signup/signupform.php">Sign Up</a></p>
            </div>
        </div>

    </form>
</body>
</html>