<?php
	
	session_start();

	if(isset($_SESSION['logged_in'])){
		$name = $_SESSION['name'];
	}else{
		header("Location:login.php");
	}

?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/header.css">
</head>
<body>
	<section class="dashboard">
		<?php include "../includes/header.php" ?>

		<main class="main-right">
			<p class="home-welcome">Welcome to Hazir dashboard <?php echo htmlspecialchars($name) ?> !!!</p>

			<article class="feature-card">
				<div class="feature">
					<p>Total Number of Employee</p>
					<p class="numbers">10</p>
				</div>
				<div class="feature">
					<p>Total Number of Departments</p>
					<p class="numbers">3</p>
				</div>
				<div class="feature">
					<p>Total Number of Leave requests</p>
					<p class="numbers">7</p>
				</div>
				
			</article>
		</main>

	</section>

	<?php include "../includes/footer.php" ?>
</body>
</html>