<?php
require_once './config.php';
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Quản lý sản phẩm</title>
</head>
<link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
<body>
<table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>Price</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stt = 1;
        $user_id = $_SESSION['user_id'];
        $data = $db->getDataCart($user_id);
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['product_id']; ?></td>
                <?
                $result = $db->getDatafrom('products', 'id', $value['product_id'])
                ?>
                <td><?php echo $result['name']; ?></td>
                <td><?php echo $result['price']; ?></td>
                <td><img src="<?php echo $result['img']; ?>" alt="Product Image" width="200px"></td>


                <!-- Sử dụng thẻ <img> để hiển thị hình ảnh -->
                <form action="indexgiap.php?controller=dbproducts&action=deleteFavor" method="POST" enctype="multipart/form-data">
                <td class="action-buttons">
                    <input type="hidden" name="cart_id" value="<?php echo $value['cart_id']; ?>"> <!-- Input hidden để lưu ID sản phẩm -->
                    <button type="submit" name="deleteFavor">DELETE</button>
                    <!-- <a onclick="return confirm('Bạn có muốn xóa không ?')" href="index.php?controller=dbproducts&action=deleteFavor&id=<?php 
                    // echo $value['cart_id']; 
                    ?>">Del</a> -->
                </td>
                </form>
            </tr>
            <?php
            $stt++;
        }
        ?>
        </tbody>
    </table>
</body>
    <?php
    // require 'inc/footer.php';
    ?>
</html>
