<?php
require_once "session.php";
verify_session();
permission_super_admin();

require_once ('.././model/account.class.php');
$us=new Account();
$us-> updateAccountRole($_GET['id_us'],"1");
header('location:.././view/users.php');
?>