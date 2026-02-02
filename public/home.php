<?php
	include "../includes/functions.php";
	include "../config/session.php";

	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='admin'){

		$name = $_SESSION['name'];

		$length = count(json_decode(infoEmployee()));

		$dept = dept();

		$leaveNum = leaveNum();

		$presentEmployee = present();


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
			<p class="home-welcome">Welcome to HAZIR <?php echo htmlspecialchars($name) ?> !</p>

			<article class="feature-card">
				<div class="feature">
					<p>Total Number of Employee</p>
					<p class="numbers"><?php echo htmlspecialchars($length) ?> </p>
				</div>
				<div class="feature">
					<p>Total Number of Departments</p>
					<p class="numbers"><?php echo htmlspecialchars($dept) ?></p>
				</div>
				<div class="feature">
					<p>Total Number of pending Leave Requests</p>
					<p class="numbers"><?php echo htmlspecialchars($leaveNum) ?></p>
				</div>
				<div class="feature">
					<p>Total Employee present</p>
					<p class="numbers"><?php echo htmlspecialchars($presentEmployee) ?></p>
				</div>
				
			</article>
		</main>

	</section>

	<?php include "../includes/footer.php" ?>
</body>
</html>