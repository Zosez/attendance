<?php

	include "../config/db.php";
	session_start();
	$error="";

	global $pdo;
	if($_SERVER['REQUEST_METHOD']=="POST"){

		if ($_POST['login_button']){

			if( trim($_POST['login_password'])!=""&trim($_POST['login_email'])!=""){

				if(filter_var($_POST['login_email'],FILTER_VALIDATE_EMAIL)){
					try{

					$email=$_POST['login_email'];
					$stmt = $pdo->prepare("SELECT email,fullname,password,role from employee where email=?");
					$stmt->execute([$email]);

					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					if($result){


						if(password_verify(trim($_POST['login_password']), $result['password'])  ){

							session_regenerate_id(true);
							
							$_SESSION['logged_in']=true;
							$_SESSION['name']=$result['fullname'];
							$_SESSION['role']=$result['role'];

							if($_SESSION['role']=="admin"){
								header("Location:home.php");
								
							}else{
								header("Location:user.php");
							}


						}else{
							$error="User not found";
						}
					}else{
						$error="User not found";
					}
					}catch(Exception $e){

					}


				}else{
					$error = "Format of email is not correct";
				}
			}else{
				$error="All Fields need to be filled";
			}
		}
	}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HAZIR</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
	<section class="login-page">
		<main class="login-section">
			<h1 class="login-header">HAZIR</h1>
			<article class="login-place">
				<h3 style="font-size: 2em; margin-bottom: 0px;">Welcome Back</h3>
				<p style="font-size: 0.8em; color: grey;">Enter your email and password to access your account.</p>
				<form class="login-form" method="POST">
					<label>Email:</label>
					<input type="Email" name="login_email" placeholder="johndoe@gmail.com">
					<label>Password: </label>
					<input type="password" name="login_password" placeholder="Enter your password here">
					<p class="message" style="color:red;"><?php echo $error ?></p>
					<input type="submit" name="login_button" value="Log In" class="login-submit">
				</form>
				<p class="new-login">Don't Have An Account?<a href="signup.php" style="color: blue;">Register now</a></p>
			</article>
		</main>

		<aside class="side-section">
			<article class="side-image">
				<h4 style="font-size: 2em; font-weight: 500; color: white; margin-bottom: 2px;">Effortlessly manage your employee attendance and leave.</h4>
				<p style="font-size: 0.8em; color: gray;">Login to access your HAZIR dashboard and manage you employee.</p>

				<img src="../images/dash.png" class="side-dash">
			</article>
		</aside>	
	</section>
	<?php include "../includes/footer.php" ?>
</body>
</html>