<?php
require_once ('model/dbconfig.php');
require_once ('model/users.php');
require_once ('database.php');
$db = new Database('localhost','msp_1','root','mysql');
$db->connect();
$user = new User("username", "password", "email", "date_created", "role_id", "isActivated", $pdo);
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
} else {
    $controller = '';
}
switch($controller){
    case 'dbproducts':
        require_once './controller/products/index.php';
        break;
    case 'dbusers':
        require_once './controller/users/index.php';
} 
  
?>
