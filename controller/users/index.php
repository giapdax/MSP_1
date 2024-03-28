<?php
require_once 'inc/header.php';
// Kiểm tra xem có tham số 'action' được truyền qua URL không
if(isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = '';
}
$thanhcong = array();

switch($action){   
    case 'edituser': {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $tblTableuser = "users";
            $dataIDuser = $user->getDataIDUser($tblTableuser, $id);
            
            // Kiểm tra xem người dùng đã gửi dữ liệu từ mẫu sửa đổi hay chưa
            if (isset($_POST['update_user'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                
                // Tiến hành cập nhật dữ liệu vào cơ sở dữ liệu
                $user->UpdateDataUser($id, $username, $email);
                $thanhcong[] = 'add_success';
            }
        }
        require_once('view/users/edit_users.php');
        break;
    }
    
    case 'deleteuser':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $tblTableuser = "users";
            if($user->DeleteUser($tblTableuser, $id) ){
                header('location: indexgiap.php?controller=dbusers&action=list_users');
                exit; // Thêm exit để ngăn chương trình tiếp tục thực thi sau khi chuyển hướng
            } else {
                echo "Failed to delete User."; // Xử lý khi không xóa được sản phẩm
            }
        } else {
            echo "User ID is not set."; // Xử lý khi không có ID sản phẩm
        }
        break;
    
    case 'listusers':{
        $tblTableuser = "users";
        $datauser = $user->getAllDataUser($tblTableuser);
        require_once('view/users/list_users.php');
        break;
    }
    default: {
        require_once('view/users/list_users.php');
        break;
    }
}

?>
