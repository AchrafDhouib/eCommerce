<!doctype html>
<html lang="en">

<head>
	<title>Log in</title>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.auth.css">
</head>

<?php
    session_start();
    require_once ".././model/account.class.php";
    $us=new Account();
	$emailMessage="";
	$passwordMessage="";
    if (isset($_POST['email'])){
        $us->email =$_POST["email"];
        $us->pwd =$_POST["pwd"];
        if ($us->verifyAccount()==false)
			echo"Email not found";
        else
            try{
                $data = $us->getUser();               
                if ($data){
                    $_SESSION["connecte"]="1";
					$_SESSION["user_id"]=$data["id"];
                    $_SESSION["user"]=$data["user_name"];
					$_SESSION["role"]=$data["role"];
                    header("location:index.php");
                    exit();
                }
                else
					echo"Incorrect Password\n";
                }
        catch (PDOException $e){
            echo "ERREUR : ".$e->getMessage(). " LIGNE : ".$e->getLine();
        }
    }
?>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Sign Up</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">Don't have an account yet? <a href="./signup.php">Sign up now</a>
						</h3>
						<form action="login.php" class="login-form" method="post">
							<div class="form-group">
								<input type="email" class="form-control rounded-left" placeholder="Email" name="email" required>
								<label style="color : red;"><?php $emailMessage ?> </label>
							</div>
							<div class="form-group d-flex">
								<input type="password" id="password" class="form-control rounded-left"
									placeholder="Password"  name="pwd" required>
									<label style="color : red;"><?php $passwordMessage ?> </label>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Show password
										<input type="checkbox" onclick="showPassword()">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get
									Started</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>