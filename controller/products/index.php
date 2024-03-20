<?php
require_once 'inc/header.php';
// include "model/dbconfig.php";
// Kiểm tra xem có tham số 'action' được truyền qua URL không
if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}
$thanhcong = array();

switch($action){
    case 'add': {
        if(isset($_POST['add_products'])) {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];
            $information = $_POST['information'];

            require_once 'uploads.php';
            // Thêm sản phẩm vào cơ sở dữ liệu
            if($db->InsertData($name, $category, $hinhanhpath, $price, $size, $quantity,$information )) {
                $thanhcong[] = 'add_success';
            } else {
                echo "Sorry, there was an error adding your product."; // Thông báo lỗi khi thêm sản phẩm không thành công
            }
        }
        require_once(__DIR__ . '/../../view/products/add_products.php'); // Đường dẫn đến trang thêm sản phẩm
        break;
    }
    
    case 'edit': {
            
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $tblTable = "products";
            $dataID = $db->getDataID($tblTable, $id);
                if (isset($_POST['update_products'])) {
                    $name = $_POST['name'];
                    $category = $_POST['category'];
                    $price = $_POST['price'];
                    $size = $_POST['size'];
                    $quantity = $_POST['quantity'];
                    $information = $_POST['information'];
                    
                    // Kiểm tra xem người dùng đã tải lên tệp mới hay không
                    if (!empty($_FILES['img']['name'])) {
                        // Nếu có tệp mới, cập nhật đường dẫn hình ảnh mới
                        $hinhanhpath = 'images/' . basename($_FILES['img']['name']);
                        // Tiến hành upload ảnh mới
                        require_once 'uploads.php';
                        if ($uploadOk) {
                            // Xóa ảnh cũ (nếu cần)
                            // Đặt đường dẫn ảnh mới trong cơ sở dữ liệu
                        }
                    } else {
                        // Nếu không có tệp mới, giữ nguyên đường dẫn ảnh cũ
                        $hinhanhpath = $dataID['img'];
                    }
                    
                    // Tiến hành cập nhật dữ liệu vào cơ sở dữ liệu
                    $db->UpdateData($id, $name, $category, $hinhanhpath, $price, $size, $quantity, $information);
                    $thanhcong[] = 'add_success';
                }
                
                }
                require_once('view/products/edit_products.php');
                break;
    }
    
    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $tblTable = "products";
    
            // Lấy tên tệp hình ảnh của sản phẩm từ cơ sở dữ liệu
            $product = $db->getDataID($tblTable, $id);
            $imageFilePath =$product['img'];
    
            // Kiểm tra và xóa tệp hình ảnh nếu tồn tại
            if (file_exists($imageFilePath)) {
                if(unlink($imageFilePath)){
                    echo "File deleted successfully.";
                } else {
                    echo "Failed to delete file.";
                }
            } else {
                echo "File does not exist.";
            }
    
            // Xóa sản phẩm từ cơ sở dữ liệu
            if($db->Delete($id, $tblTable)){
                header('location: indexgiap.php?controller=dbproducts&action=list');
                exit; // Thêm exit để ngăn chương trình tiếp tục thực thi sau khi chuyển hướng
            } else {
                echo "Failed to delete product."; // Xử lý khi không xóa được sản phẩm
            }
        } else {
            echo "Product ID is not set."; // Xử lý khi không có ID sản phẩm
        }
        break;
    
    case 'list':{
        $tblTable = "products";
        $data  = $db->getAllData($tblTable);
        require_once('view/products/list.php');
        break;
    }
    default: {
        require_once('view/products/list.php');
        break;
    }
}

?>
