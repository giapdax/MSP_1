<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update products</title>
</head>
<link rel="stylesheet" type="text/css" href="./style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
<body>
    <div class="container">
        <div class="editproducts">
        <a href="indexgiap.php?controller=dbproducts&action=edit"></a>
            <h3 style="text-align: center;">UPDATE PRODUCT</h3>

            <form action="" method="POST" enctype="multipart/form-data">
                <table>
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
                            <input type="file" id="img" name="img"><p><?php echo $dataID['img']?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"><input type="submit" name="update_products" value="Update"></td>
                    </tr>
                   
                </table>
            </form>
           
        </div>
    </div>
</body>
</html>
