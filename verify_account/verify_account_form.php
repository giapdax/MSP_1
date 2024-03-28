<?php
    require '../config.php';
    require 'verify_account_view.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
</head>
<body>
        <form action='verify_account.php' method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
        <div class="login-header">
                <header>Hi there, Thank you for your register
                    , please click to activate account for using more features of Application</header>
                <?php
                    checkVerify();
                ?>
            </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit" name="activate_password"></button>
            <label for="submit">Activated Account</label>
        </div>
        </form>
</body>
</html>