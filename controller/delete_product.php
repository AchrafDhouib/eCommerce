<?php
require_once('.././model/etudiant.class.php');
$prd=new Product();
$prd-> deleteProduct($_GET['prd_id']);
header('location:.././view/liste_etudiant.php');
?>