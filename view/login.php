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
        $us->email =$_POST["email"];
        $us->pwd =$_POST["pwd"];
        if ($us->verifyAccount()==false)
            {echo "Email not found";}
        else
            try{
                $data = $us->getUser();               
                if ($data){
                    $_SESSION["connecte"]="1";
                    $_SESSION["user"]=$data["user_name"];
                    header("location:liste_etudiant.php");
                    exit();
                }
                else
                    {echo "Incorrect Password\n";}
                }
        catch (PDOException $e){
            echo "ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine();
        }
    }
?>

<body>
    <form action="./login.php" method="post">
        <h1> <em> sign in </em></h1>
        <br>
        <table class='table table-striped'>
            <tr>
                <td> <label for="login">Email :</label> </td>
                <td> <input type="text" name="email" id="email"><br> </td>
            </tr>
            <tr>
                <td><label for="pwd">Password : </label></td>
                <td><input type="password" name="pwd" id="pwd"> <br> </td>
            </tr>
            <tr>
                <td> <input type="submit" value="Connecter"></td>
                <td> <input type="button" onclick="location.href='sign_up.php';" value="sign up"></button></td>
            </tr>
            <table>
    </form>

</body>

</html>