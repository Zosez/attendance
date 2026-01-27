<?php

	include "../config/db.php";
	global $pdo;

	$error="";

	if($_SERVER['REQUEST_METHOD']=="POST"){
		if ($_POST['signup_button']){
			if(trim($_POST['signup_name'])!="" & trim($_POST['signup_email'])!="" & trim($_POST['signup_password'])!=""&trim($_POST['confirm_password'])!=""){

				if(filter_var($_POST['signup_email'],FILTER_VALIDATE_EMAIL)){
					
					if($_POST['signup_password']===$_POST['confirm_password']){

						$name = trim($_POST['signup_name']);
						$email = trim($_POST['signup_email']);
						$department = trim($_POST['signup_department']);
						$password = password_hash(trim($_POST['signup_password']),PASSWORD_DEFAULT);
						try{

							$stmt=$pdo->prepare("INSERT INTO employee(fullname,email,department,password) values (?,?,?,?)");
							$stmt->execute([$name,$email,$department,$password]);

							$error="Added Sucessfully";

							header("Refresh:2;url=login.php");

						}catch(PDOException $e){

						}

					}else{
						$error= "Password doesnot match";
					}
				}else{
					$error="Email formate is not correct";
				}

			}else{
				$error = "All Fields must be field";	
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
	<link rel="stylesheet" type="text/css" href="../assets/css/signup.css">
</head>
<body>
	<section class="login-page">
		<main class="login-section">
			<h1 class="login-header">HAZIR</h1>
			<article class="login-place">
				<h3 style="font-size: 2em; margin-bottom: 0px;">Welcome !!!</h3>
				<p style="font-size: 0.8em; color: grey;">Register your email, password, and personal info to create your account .</p>
				<form class="login-form" method="POST">
					<label>Fullname: </label>
					<input type="text"  placeholder="John Doe" name="signup_name">
					<label>Email:</label>
					<input type="Email"  placeholder="johndoe@gmail.com" name="signup_email">
					<label>Department:</label>
					<select name="signup_department">
						<option value="IT">IT</option>
						<option value="HR">HR</option>
						<option value="Academics">Academics</option>
						<option value="Business Development">Business Development</option>
					</select>
					<label>Password: </label>
					<input type="password"  placeholder="Enter your password here" name="signup_password">
					<label>Confirm Password: </label>
					<input type="password"  placeholder="Confirm your password here" name="confirm_password">
					<p class="error-message"><?php echo $error ?></p>
					<input type="submit" value="Register" class="login-submit" name="signup_button">
				</form>
				<p class="new-login">Already Have An Account?<a href="login.php" style="color: blue;">Login</a></p>
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




