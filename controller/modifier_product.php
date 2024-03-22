<?php
require_once ('.././model/account.class.php');
$prd = new Product();
$id = $_POST['id'];
$prd->nom = $_POST['name'];
$prd->prenom = $_POST['price'];
$prd->sexe = $_POST['discount'];
$prd->an_naissance = $_POST['quantity'];
$prd->photo = $_FILES['photo']['name'];
$prd->an_naissance = $_POST['description'];

$photo = $_FILES['photo']['name'];
if ($photo == "") {
    $et->modifyProductWithoutPhoto($id);
    header('location:liste_etudiant.php');
} else {
    $fichierTemp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($fichierTemp, '.././images/products/' . $photo);
    $et->modifyProduct($id);
    header('location:.././view/liste_etudiant.php');
}
?>