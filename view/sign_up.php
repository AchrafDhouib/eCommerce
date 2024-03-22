<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<?php
    session_start();

    require_once ".././model/account.class.php";
    $us=new account();
    if (isset($_POST['email'])){
        $us->user_name=$_POST['user_name'];
        $us->email =$_POST["email"];
        $us->pwd =$_POST["pwd"];
        if ($us->verifyAccount())
            echo "Email exist";
        else
        {
            $us->insertAccount();
            header("location:login.php");
        }
    }
?>

<body>
    <form action="sign_up.php" method="post">
        <h1> <em> sign up </em></h1>
        <br>
        <table class='table table-striped'>
            <tr>
                <td> <label for="user_name">User name</label> </td>
                <td> <input type="text" name="user_name" id="user_name"><br> </td>
            </tr>
            <tr>
                <td> <label for="login">Email :</label> </td>
                <td> <input type="text" name="email" id="email"><br> </td>
            </tr>
            <tr>
                <td><label for="pwd">Password : </label></td>
                <td><input type="password" name="pwd" id="pwd"> <br> </td>
            </tr>
            <tr>
                <td> <input type="submit" value="Create"></td>
            </tr>
            <table>
    </form>
</body>

</html>