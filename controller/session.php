<?php
session_start();
function verify_session(){
    if(!isset($_SESSION["connecte"]) || $_SESSION["connecte"] !== "1"){
        header("location:.././view/login.php"); 
        exit();
    }
}
function permission_admin(){
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "1" && $_SESSION["role"] !== "2"){
        header("location:.././view/index.php");
        exit();
    }
}
function permission_super_admin(){
    if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "2"){
        header("location:.././view/index.php");
        exit();
    }
}
ob_end_flush();
?>