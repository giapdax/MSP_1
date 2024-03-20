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
        <div class="edit-products">
            <h3 class="text-center">UPDATE PRODUCT</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><label for="name">Name:</label></td>
                        <td><input type="text" id="name" name="name" value="<?php echo $dataID['name']?>" placeholder="Enter product name"></td>
                    </tr>
                    <tr>
                        <td><label for="category">Category:</label></td>
                        <td><input type="text" id="category" name="category" value="<?php echo $dataID['category']?>" placeholder="Enter category"></td>
                    </tr>
                    <tr>
                        <td><label for="price">Price:</label></td>
                        <td><input type="text" id="price" name="price" value="<?php echo $dataID['price']?>" placeholder="Enter price"></td>
                    </tr>
                    <tr>
                        <td><label for="size">Size:</label></td>
                        <td><input type="text" id="size" name="size" value="<?php echo $dataID['size']?>" placeholder="Enter size"></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Quantity:</label></td>
                        <td><input type="text" id="quantity" name="quantity" value="<?php echo $dataID['quantity']?>" placeholder="Enter quantity"></td>
                    </tr>
                    <tr>
                        <td><label for="information">Information:</label></td>
                        <td><input type="text" id="information" name="information" value="<?php echo $dataID['information']?>" placeholder="Enter information"></td>
                    </tr>
                    <tr>
                        <td><label for="img">Image:</label></td>
                        <td>
                            <input type="file" id="img" name="img">
                            <p><?php echo $dataID['img']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" name="update_products" value="Update" class="btn btn-primary"></td>
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
