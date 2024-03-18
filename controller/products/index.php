<?php
require_once 'header.php';
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

            $hinhanhpath = ''; // Khởi tạo đường dẫn hình ảnh rỗng
    
            // Xử lý tải lên hình ảnh
            if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                $hinhanhpath = 'images/' . basename($_FILES['img']['name']); // Tạo đường dẫn đầy đủ cho hình ảnh
                $uploadOk = move_uploaded_file($_FILES['img']['tmp_name'], $hinhanhpath); // Di chuyển hình ảnh vào thư mục uploads
                if(!$uploadOk) {
                    echo "Sorry, there was an error uploading your file.";
                    exit; // Thoát khỏi quá trình thêm sản phẩm nếu có lỗi khi tải lên hình ảnh
                }
            }
    
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
            if(isset($_POST['update_products'])) {
                $name = $_POST['name'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $size = $_POST['size'];
                $quantity = $_POST['quantity'];
                $information = $_POST['information'];
                $hinhanhpath = ''; // Initialize empty image path
                if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $hinhanhpath = 'images/' . basename($_FILES['img']['name']); // Tạo đường dẫn đầy đủ cho hình ảnh
                    $uploadOk = move_uploaded_file($_FILES['img']['tmp_name'], $hinhanhpath); // Di chuyển hình ảnh vào thư mục uploads
                    if(!$uploadOk) {
                        echo "Sorry, there was an error uploading your file.";
                        exit; // Thoát khỏi quá trình thêm sản phẩm nếu có lỗi khi tải lên hình ảnh
                    }
                }
    
                $db->UpdateData($id, $name, $category, $hinhanhpath, $price, $size, $quantity,$information);
                header('location: indexgiap.php?controller=dbproducts&action=list');
            }
        }
        require_once('view/products/edit_products.php');
        break;
    }
    
    case 'delete':
        if(isset($_GET['id'])){
            $id =$_GET['id'];
            $tblTable= "products";

            if($db->Delete($id,$tblTable)){
                header('location: indexgiap.php?controller=dbproducts&action=list');
            }
            else{
                header('location: indexgiap.php?controller=dbproducts&action=list');
            }
        }
        require_once('view/products/delete_products.php');
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
