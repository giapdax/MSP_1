<?php
    require_once('config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/header1.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <title>Document</title>
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
<!--        <a href="#">Đơn Hàng</a>-->
<!--        Role Admin-->
        <?php
            if(
                isset($_SESSION['user_id']) && isset($_SESSION['user_role_id'])
                    && $_SESSION['user_role_id'] == 2
            ){ ?>
            <a href="indexgiap.php?controller=dbproducts&&action=list">Sản Phẩm</a>
            <a href="indexgiap.php?controller=dbproducts&&action=add">Thêm Sản Phẩm</a>
            <a href="indexgiap.php?controller=dbusers&&action=listuser">Danh Sách Người Dùng</a>
        <?php } ?>
<!--        Role user-->
        <?php
            if(isset($_SESSION['user_id'])){ ?>
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" style="background-color: #918081"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span style="color:#5a393d; font-weight: bold">Tài khoản</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="changepassword/change_password_form.php">Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="indexgiap.php?controller=dbusers&action=edituser&id=<?php echo $_SESSION['user_id']; ?>">Đổi thông tin</a></li>
                        <li><a class="dropdown-item" href="#">Menu item</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Thoát tài khoản</a></li>
                    </ul>
                </div>
        <?php } else { ?>
                <a href="login/loginform.php">Đăng Nhập</a>
        <?php } ?>


<!--        <a href="logout.php">Dang xuat</a>-->
    </nav>
</header>
</body>
</html>