<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <title>Giới Thiệu Trang Web Bán Giày Đá Bóng</title>
    <style>
        /* CSS cho phần giới thiệu */
        .introduction {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* CSS cho tiêu đề */
        h1 {
            color: #333;
        }

        /* CSS cho nội dung */
        p {
            color: #666;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* CSS cho nút cuộn trang */
        .scroll-button {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .scroll-button:hover {
            background-color: #0056b3;
        }
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Đảm bảo footer cố định ở cuối trang */
}
    </style>
</head>
<body>
    <div class="introduction">
        <h1>Giới Thiệu Trang Web Bán Giày Đá Bóng</h1>
        <p>
            Chào mừng đến với trang web bán giày đá bóng - nơi bạn có thể tìm thấy những đôi giày phong cách và chất lượng để nâng cao hiệu suất của mình trên sân cỏ. Với một sự kết hợp hoàn hảo giữa thiết kế đẹp mắt và công nghệ tiên tiến, chúng tôi cam kết mang đến cho bạn những sản phẩm chất lượng nhất từ các thương hiệu hàng đầu trên thị trường.
        </p>
        <p>
            Tại trang web của chúng tôi, bạn sẽ được khám phá một bộ sưu tập đa dạng các mẫu giày đá bóng, từ những đôi giày cổ điển đến những thiết kế hiện đại, phù hợp với mọi phong cách và sở thích của người chơi. Bạn có thể dễ dàng tìm thấy những đôi giày phù hợp với sân cỏ mà bạn yêu thích, từ sân cỏ tự nhiên đến sân cỏ nhân tạo.
        </p>
        <p>
            Với sự cam kết về chất lượng và sự phục vụ tận tâm, chúng tôi đặt sự hài lòng của khách hàng lên hàng đầu. Chúng tôi cung cấp các dịch vụ hỗ trợ khách hàng chuyên nghiệp để đảm bảo bạn có được trải nghiệm mua sắm trực tuyến dễ dàng và thoải mái nhất.
        </p>
        <p>
            Hãy tham gia cùng chúng tôi và khám phá thế giới giày đá bóng đa dạng và phong phú, mang lại sự tự tin và hiệu suất tốt nhất cho bạn trên sân cỏ.
        </p>
        <!-- Thêm nút để cuộn sang trang khác -->
        <a href="#contact" class="scroll-button">Liên Hệ Ngay</a>
    </div>
    <?php include 'inc/footer.php';?>
</body>
</html>

