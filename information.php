<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Chi Tiết</title>
    <link rel="stylesheet" href="css/information.css"> <!-- Link to CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
</head>
<body>
    <?php require_once 'inc/header.php'; ?>
    <div class="product-detail-container">
        <?php
        require_once('indexgiap.php');
        $tblTable = "products";
        $data = $db->getAllData($tblTable);

        // Check if the 'img' parameter is passed through the URL
        if (isset($_GET['img'])) {
            $found = false; // Variable to check if any product matches
            foreach ($data as $value) {
                // Check if the product image path matches the 'img' parameter
                if ($value['img'] == $_GET['img']) {
                    $found = true;
        ?>
        <div class="product-image-container">
            <img src="<?php echo $value['img']; ?>" alt="Product Image" class="product-image">
        </div>
        <div class="product-info-container">
            <h2 class="product-title">THÔNG TIN CHI TIẾT</h2>
            <div class="product-item">
                <div class="product-name"><?php echo $value['name']; ?></div>
                <div class="product-description"><?php echo "Size: " . $value['size']; ?></div>
                <div class="product-price"><?php echo "Price: " . $value['price']; ?></div>
            </div>
            <div class="product-information"><?php echo $value['information']; ?></div>
        </div>
        <?php
                    break;
                }
            }
            if (!$found) {
                echo "Product information not found.";
            }
        } else {
            echo "Product information not found.";
        }
        ?>
    </div>
    <?php include "inc/footer.php"; ?>
</body>
</html>
