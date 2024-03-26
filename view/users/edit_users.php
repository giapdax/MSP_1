<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update users</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="edit-products">
            <h3 class="text-center">Chỉnh Sửa Thông Tin</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><label for="username">username:</label></td>
                        <td><input type="text" id="username" name="username" value="<?php echo $dataIDuser['username']?>" placeholder="Enter username"></td>
                    </tr>

                    <tr>
                        <td><label for="email">email:</label></td>
                        <td><input type="text" id="email" name="email" value="<?php echo $dataIDuser['email']?>" placeholder="Enter email"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" name="update_user" value="Cập Nhật" class="btn btn-primary"></td>
                    </tr>
                </table>
            </form>
            <?php

if(isset($thanhcong) && in_array('add_success', $thanhcong)) {
    $_SESSION['add_success'] = true;
} elseif (isset($thanhcong) && in_array('add_fail', $thanhcong)) {
    $_SESSION['add_fail'] = true;
}

if(isset($_SESSION['add_success'])) {
    echo "<p style='color: green; text-align: center'>UPDATE SUCCESS.</p>";
    unset($_SESSION['add_success']); // Xóa biến session sau khi hiển thị thông báo
} elseif(isset($_SESSION['add_fail'])) {
    echo "<p style='color: red; text-align: center'>UPDATE FAIL.</p>";
    unset($_SESSION['add_fail']); // Xóa biến session sau khi hiển thị thông báo
} else {
    // Không có thông báo
}
?>
        </div>
    </div>
</body>
</html>
