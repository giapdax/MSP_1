<?php
require_once ('model/dbconfig.php');
$db = new Database('localhost','msp','root','mysql');
$db->connect();

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
} else {
    $controller = '';
}

switch($controller){
    case 'dbproducts':
        require_once './controller/products/index.php';
        break;
}   
?>
