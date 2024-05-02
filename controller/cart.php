<?php
require_once "session.php";
verify_session();
require_once ('.././model/product.class.php');
require_once ('.././model/account.class.php');


if(isset($_GET['action']) && $_GET['action'] == 'add') {
    if(isset($_GET['product_id']) && isset($_GET['quantity'])) {
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        $us=new Account();
        $us->id =$_SESSION["user_id"];
        $us->addToCart($product_id, $quantity);
        header("location:.././view/cart.php");
        exit;
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'remove') {

        $product_id = $_GET['product_id'];
        $us=new Account();
        $us->id =$_SESSION["user_id"];
        $us->deleteCartProduct($product_id);
        header("location:.././view/cart.php");
        exit;
}
?>