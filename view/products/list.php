<?php
    require_once $_SERVER['DOCUMENT_ROOT']. '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/list.css"> <!-- Liên kết với file CSS -->
</head>
<body>
    <style>
            /* CSS code for resizing images */
table img {
    max-width: 100px; /* Đặt chiều rộng tối đa cho hình ảnh là 100px */
    max-height: 100px; /* Đặt chiều cao tối đa cho hình ảnh là 100px */
}
    </style>
    <div class="danhsach">
        <h3> DANH SÁCH SẢN PHẨM</h3>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Information</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
//                require_once $_SERVER['DOCUMENT_ROOT'].'/model/init.php';
//                require_once $_SERVER['DOCUMENT_ROOT'].'/indexgiap.php';
                $stt = 1;
                $data = $db->getAllData($tblTable);
                foreach($data as $value){
                ?>
                <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['category'];?></td>
                    <td><?php echo $value['price'];?></td>
                    <td><?php echo $value['size'];?></td>
                    <td><?php echo $value['quantity'];?></td>
                    <td><?php echo $value['information'];?></td>

                    <!-- Sử dụng thẻ <img> để hiển thị hình ảnh -->
                    <td><img src="<?php echo $value['img']; ?>" alt=""></td>
                    <td class="action-buttons">
                        <a onclick="return confirm('Bạn có muốn sửa không ?')" href="index.php?controller=dbproducts&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="index.php?controller=dbproducts&action=delete&id=<?php echo $value['id']; ?>">Del</a>
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
