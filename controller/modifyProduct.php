<?php
require_once "session.php";
verify_session();
permission_admin();
require_once ('.././model/product.class.php');
$prd = new Product();
$id = $_POST['id'];
$prd->name = $_POST['name'];
$prd->price = $_POST['price'];
$prd->discount = $_POST['discount'];
$prd->quantity = $_POST['quantity'];
$prd->photo = $_FILES['photo']['name'];
$prd->description = $_POST['description'];

$photo = $_FILES['photo']['name'];
if ($photo == "") {
    $prd->modifyProductWithoutPhoto($id);
    header('location:.././view/products.php');
} else {
    $fichierTemp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($fichierTemp, '.././view/img/'.$photo);
    $prd->modifyProduct($id);
    header('location:.././view/products.php');
}
?>