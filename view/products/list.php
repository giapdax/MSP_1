<?php
require_once './config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/list.css"> <!-- Liên kết với file CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <style>
        /* CSS code for resizing images */
        table img {
            max-width: 100px; /* Đặt chiều rộng tối đa cho hình ảnh là 100px */
            max-height: 100px; /* Đặt chiều cao tối đa cho hình ảnh là 100px */
        }
    </style>
</head>
<body>
<div class="danhsach">
    <h3> DANH SÁCH SẢN PHẨM</h3>
    <table class="table">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Kích cỡ</th>
            <th>Thông Tin</th>
            <th>Ảnh</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $stt = 1;
        $tblTable= "products";
        $data = $db->getAllData($tblTable);
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['price']; ?></td>
                <td><?php echo $value['size']; ?></td>
                <td><?php echo $value['information']; ?></td>

                <!-- Sử dụng thẻ <img> để hiển thị hình ảnh -->
                <td><img src="<?php echo $value['img']; ?>" alt="Product Image"></td>
                <td class="action-buttons">
                    <a onclick="return confirm('Bạn có muốn sửa không ?')" href="indexgiap.php?controller=dbproducts&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                    <a onclick="return confirm('Bạn có muốn xóa không ?')" href="indexgiap.php?controller=dbproducts&action=delete&id=<?php echo $value['id']; ?>">Del</a>
                </td>
            </tr>
            <?php
            $stt++;
        }
        ?>
        </tbody>
    </table>
</div>
<?php
require 'inc/footer.php';
?>
</body>
</html>
