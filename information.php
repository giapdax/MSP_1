<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="css/information.css"> <!-- Liên kết với file CSS -->
</head>
<body>
    <?php
        require_once 'header.php';
    ?>
    <div class="product-detail-container">
        <?php
        require_once('indexgiap.php');
        $tblTable = "products";
        $data = $db->getAllData($tblTable);

        // Kiểm tra xem tham số 'img' đã được truyền qua URL hay chưa
        if(isset($_GET['img'])) {
            // Lặp qua dữ liệu sản phẩm
            $found = false; // Biến để kiểm tra xem có sản phẩm nào trùng khớp không
            foreach ($data as $value) {
                // Kiểm tra nếu đường dẫn ảnh của sản phẩm trùng với ảnh được truyền qua tham số 'img'
                if ($value['img'] == $_GET['img']) {
                    $found = true;
        ?>
        <div class="product-image-container">
            <img src="<?php echo $value['img']; ?>" alt="Product Image" class="product-image">
        </div>
        <div class="product-info-container">
            <h2 class="product-title">SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <div class="product-item">
                <div class="product-name"><?php echo $value['name']; ?></div>
                <div class="product-description"><?php echo $value['category']; ?></div>
                <div class="product-description"><?php echo "Size:".$value['size']; ?></div>
                <div class="product-description"><?php echo "Quantity:".$value['quantity']; ?></div>
                <div class="product-price"><?php echo "Price: ".$value['price']; ?></div>
            </div>
            <div class="product-information"><?php echo "".$value['information']; ?></div>
        </div>
        <?php
                    break; // Sau khi tìm thấy sản phẩm, thoát khỏi vòng lặp
                }
            }
            if (!$found) {
                echo "Không tìm thấy thông tin sản phẩm.";
            }
        } else {
            // Nếu không có tham số 'img', bạn có thể hiển thị một thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
            echo "Không tìm thấy thông tin sản phẩm.";
        }
        ?>
    </div>
<!--    <a href="trangchu.php" class="back-btn">Quay lại trang chủ</a>  Nút quay lại trang chủ -->
    <?php include "inc/footer.php"; ?>
</body>
</html>
