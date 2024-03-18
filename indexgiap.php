<?php
require_once('model/dbconfig.php');
$db = new Database();
$db->connect();

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
} else {
    $controller = '';
}

switch($controller){
    case 'dbproducts':
        require_once $_SERVER['DOCUMENT_ROOT'].'/controller/products/index.php';
        break;
}   
    

?>
