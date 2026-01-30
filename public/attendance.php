<?php

	include "../config/session.php";
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
	<link rel="stylesheet" type="text/css" href="../assets/css/attendance.css">
</head>
<body>
	<section class="dashboard">
		<?php include "../includes/header.php" ?>

		<main class="main-right">
			<p class="home-welcome"> Employees Present  </p>

			<article class="table">
				
					<div class="filter">
						<label>Date:</label>
						<input type="Date" class="search-date" id="serch_date" >		
					</div>
					
				
				<table class="table" id="attendance_table">
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Department</th>
						<th>Role</th>
						<th>Date</th>
					</tr>
							
				</table>

			</article>
		</main>
	</section>

	<?php include "../includes/footer.php" ?>
	<script src="../assets/js/attendance.js"></script>
</body>
</html>