<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update products</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <div class="dangkysanpham">
            <a href="indexgiap.php?controller=dbproducts&action=list"></a>
            
            <h3>Thêm Sản Phẩm</h3>

            <form action="indexgiap.php?controller=dbproducts&action=add" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="name">Tên Sản Phẩm:</label></td>
                        <td><input type="text" id="name" name="name" placeholder="Enter name product"></td>
                    </tr>
                    <tr>
                        <td><label for="price">Giá:</label></td>
                        <td><input type="text" id="price" name="price" placeholder="Enter price"></td>
                    </tr>
                    <tr>
                        <td><label for="size">Kích Cỡ:</label></td>
                        <td><input type="text" id="size" name="size" placeholder="Enter size"></td>
                        
                    </tr>
                    <tr>
                        <td><label for="information">Thông Tin Chi Tiết:</label></td>
                        <td><input type="text" id="information" name="information" placeholder="Enter information"></td>
                    </tr>
                    <tr>
                        <td><label for="img">Hình Ảnh:</label></td>
                        <td><input type="file" id="img" name="img" accept="image/*"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" name="add_products" value="Thêm"></td>
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
    echo "<p style='color: green; text-align: center'>THÊM THÀNH CÔNG</p>";
    unset($_SESSION['add_success']); // Xóa biến session sau khi hiển thị thông báo
} elseif(isset($_SESSION['add_fail'])) {
    echo "<p style='color: red; text-align: center'>THÊM THẤT BẠI</p>";
    unset($_SESSION['add_fail']); // Xóa biến session sau khi hiển thị thông báo
} else {
    // Không có thông báo
}
?>

        </div>
    </div>
<!--    --><?php
//    require 'inc/footer.php';
//    ?>
</body>
</html>

