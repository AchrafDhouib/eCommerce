<?php
require_once "session.php";
verify_session();
permission_admin();

require_once ('.././model/product.class.php');
$prd=new Product();
$prd-> deleteProduct($_GET['id_prd']);
header('location:.././view/products.php');
?>