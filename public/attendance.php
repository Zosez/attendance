<?php

	session_start();
	$name = $_SESSION['name'];
	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='user'){
		header("location:login.php");
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
			
		</main>
	</section>

	<?php include "../includes/footer.php" ?>
</body>
</html>