<?php
include 'inc/header.php'; 
require_once 'pagination.php'; // Import class Pagination

// Lấy dữ liệu sản phẩm
require_once('indexgiap.php');
$a = 5; // Số sản phẩm mỗi trang 
$tblTable = "products";

// Khởi tạo biến để kiểm tra tìm kiếm
$searchNotFound = false;

// Xử lý tìm kiếm
$key = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : ''; // Lấy từ khóa tìm kiếm từ URL
if (!empty($key)) {
    $data = $db->SearchData($tblTable, $key); // Tìm kiếm nếu có từ khóa
    // Kiểm tra xem dữ liệu từ tìm kiếm có tồn tại không
    if (empty($data)) {
        $searchNotFound = true; // Đặt biến kiểm tra tìm kiếm không thành công
        $data = $db->getAllData($tblTable); // Lấy tất cả dữ liệu nếu không có từ khóa
    }
} else {
    $data = $db->getAllData($tblTable); // Lấy tất cả dữ liệu nếu không có từ khóa
}

// Khởi tạo class Pagination với dữ liệu và cấu hình
$pagination = new Pagination(['total' => count($data), 'limit' => $a]); // Giả sử mỗi trang có 5 sản phẩm

// Lấy chỉ số bắt đầu và kết thúc của dữ liệu trang hiện tại
$startIndex = ($pagination->getCurrentPage() - 1) * $a;
$endIndex = min($startIndex + $a, count($data));

// Chỉ lấy dữ liệu của trang hiện tại từ $startIndex đến $endIndex
$dataPage = array_slice($data, $startIndex, $a);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pagination.css"> <!-- Liên kết với file CSS cho trang chủ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>Danh sách sản phẩm</title>
    <link rel="stylesheet" href="css/trangchu.css"> <!-- Liên kết với file CSS -->
</head>
<body>
<div class="timkiem">
    <form action="" method="GET">
        <table>
        <tr>
            <input type="hidden" name="controller" value="dbproducts">
            <td><input type="text" name="tukhoa" placeholder="Nhập từ khóa"></td>
            <td><input type="submit" value="Tìm kiếm"></td>
        </tr>
        </table>
        <input type="hidden" name="action" value="tim-kiem">
        <?php if ($searchNotFound): ?>
        <p>Không tìm thấy kết quả cho từ khóa "<?php echo $key; ?>"</p>
    <?php endif; ?>
    </form>
</div>  
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
            // Lặp qua dữ liệu sản phẩm để hiển thị
            foreach ($dataPage as $value) {
            ?>
                <div class="item">
                    <a href="javascript:void(0);" onclick="redirectToInformation('<?php echo $value['img']; ?>')">
                        <img src="<?php echo $value['img']; ?>" alt="">
                    </a>
                    <div class="name"><?php echo $value['name']; ?></div>
                    <?php if(isset($_SESSION['user_id'])): ?>
                <form action="trangchu.php?controller=dbproducts&action=add_to_cart" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?php echo $value['id']; ?>"> <!-- Input hidden để lưu ID sản phẩm -->
                    <button type="submit" name="add_to_cart">Favorite</button> <!-- Sử dụng button thay vì link -->
                </form>
        
        <?php endif; ?>
                </div>
            <?php
            }
            ?>
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
    echo $pagination->getPagination();
    ?>
</div>
</body>
</html>

<?php include "inc/footer.php"; ?>
