<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/config.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán Giày Đá Bóng</title>
</head>
<body>
<header>
    <div class="logo"> <img src="images/logo_web.png" alt="Logo" width="100" height="100"></div>
    <nav class="navbar">
        <div class="search-box">
            <img src="images/search.png" alt="Search Icon" width="20" height="20">
            <input type="text" placeholder="Tìm kiếm...">
        </div>
        <a href="trangchu.php">Trang Chủ</a>
        <a href="introduce.php">Giới Thiệu</a>
        <a href="contact.php">Liên Hệ</a>
        <a href="#">Đơn Hàng</a>
        <a href="indexgiap.php?controller=dbproducts&&action=list">Sản Phẩm</a>
        <a href="indexgiap.php?controller=dbproducts&&action=add">Thêm Sản Phẩm</a>
        <?php
            if(isset($_SESSION['user_id'])){ ?>
                <?php echo $_SESSION['user_username'] ?>
        <?php } else { ?>
            <a href="login/loginform.php">Đăng Nhập</a>
        <?php } ?>

    </nav>
</header>
</body>
</html>
