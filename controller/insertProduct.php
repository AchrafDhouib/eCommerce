<?php
require_once "session.php";
verify_session();
permission_admin();
require_once ('.././model/product.class.php');
$prd = new Product();
$prd->name = $_POST['name'];
$prd->price = $_POST['price'];
$prd->discount = $_POST['discount'];
$prd->quantity = $_POST['quantity'];
$fichierTemp = $_FILES['photo']['tmp_name'];
$prd->description = $_POST['description'];
move_uploaded_file($fichierTemp, '.././view/img/'.$_FILES['photo']['name']);

$prd->insertProduct();
header('location:.././view/products.php');
?>