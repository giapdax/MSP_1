<?php include 'inc/header.php';?>
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
    <title>Liên Hệ</title>
    <style>
        /* Định dạng cho phần liên hệ */
        .contact-container {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
        }

        .contact-info {
            flex-basis: 40%;
        }

        .contact-form {
            flex-basis: 50%;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-left: 40px; /* Thêm margin để tạo khoảng cách với thông tin liên hệ */
        }

        /* Định dạng cho tiêu đề */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Định dạng cho label và input */
        label {
            display: block;
            margin-bottom: 10px;
            color: #666;
        }

        input[type="text"],
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Định dạng cho nút gửi */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Đảm bảo footer cố định ở cuối trang */
        }
    </style>
</head>
<body>
    <div class="contact-container">
<!--        <div class="contact-info">-->
<!--            <h2>Thông Tin Liên Hệ</h2>-->
<!--            <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận XYZ, Thành Phố HCM</p>-->
<!--            <p><strong>Số điện thoại:</strong> 0123 456 789</p>-->
<!--        </div>-->
        <div class="contact-form">
            <h2>Liên Hệ</h2>
            <form action="submit_form.php" method="POST">
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <label for="message">Nội Dung:</label>
                <textarea id="message" name="message" rows="6" required></textarea>

                <input type="submit" value="Gửi">
            </form>
        </div>
    </div>
    <?php include 'inc/footer.php';?>
</body>
</html>

