<?php
include 'header.php'; 
require_once 'pagination.php'; // Import class Pagination


// Lấy dữ liệu sản phẩm
require_once('indexgiap.php');
$tblTable = "products";
$data = $db->getAllData($tblTable);

// Khởi tạo class Pagination với dữ liệu và cấu hình
$pagination = new Pagination(['total' => count($data), 'limit' => 10]); // Giả sử mỗi trang có 5 sản phẩm

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pagination.css"> <!-- Liên kết với file CSS cho trang chủ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/trangchu.css"> <!-- Liên kết với file CSS -->
</head>
<body>
    
    <div id="wrapper">
        <div id="banner">
            <div class="box-left">
                <h1>
                    <span>GIÀY ĐÁ BÓNG CHÍNH HÃNG</span>
                </h1>
            </div>
        </div>
        <div id="wp-products">
            <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <ul id="list-products">
            <?php
                require_once 'pagination.php'; // Import class Pagination
                // Lấy trang hiện tại từ class Pagination
                $currentPage = $pagination->getCurrentPage();
                // Tính chỉ số bắt đầu của sản phẩm trong trang hiện tại
                $startIndex = ($currentPage - 1) * 10;
                // Tính chỉ số kết thúc của sản phẩm trong trang hiện tại
                $endIndex = min($startIndex + 10, count($data));

                // Lặp qua dữ liệu sản phẩm chỉ hiển thị từ $startIndex đến $endIndex
                for ($i = $startIndex; $i < $endIndex; $i++) { 
                    $value = $data[$i]; ?>
                   <div class="item">
                    <a href="javascript:void(0);"
                        onclick="
                            redirectToInformation('<?php $value['img']; ?>')">
                        <img src="<?php echo $value['img']; ?>" alt="">
                    </a>
                    <div class="name"><?php echo $value['name']; ?></div>

                    </div>

            <?php    } ?>
                
            </ul>
        </div>
    </div>
    <input type="hidden" id="productImage" name="productImage" value=""> <!-- Input hidden để lưu đường dẫn ảnh -->
    <script>
        function redirectToInformation(imageSrc) {
            // Chuyển hướng người dùng đến trang information.php và truyền đường dẫn ảnh
            window.location.href = 'information.php?img=' + encodeURIComponent(imageSrc);
        }
    </script>
    <div class="pagination-container">
        <?php
        // Hiển thị phân trang
        require_once 'pagination.php'; // Import class Pagination
        echo $pagination->getPagination();
        ?>
    </div>
    
    <?php
    if(isset($_SESSION['user_id'])){
        // Nếu user đã đăng nhập, thực hiện chuyển hướng
        echo "<script>
                    function redirectToInformation(imageSrc) {
                        // Chuyển hướng người dùng đến trang information.php và truyền đường dẫn ảnh
                        window.location.href = 'information.php?img=' + encodeURIComponent(imageSrc);
                    }
                </script>";
    } else {
        // Nếu user chưa đăng nhập, chuyển hướng đến trang đăng nhập
        echo "<script>
                        function redirectToLogin() {
                            window.location.href = 'login/loginform.php ';
                        }
                    </script>";

    }
    ?>
</body>
</html>
<?php include "inc/footer.php"; ?>


