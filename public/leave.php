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
	<link rel="stylesheet" type="text/css" href="../assets/css/leave.css">
</head>
<body>
	<section class="dashboard">
		<?php include "../includes/header.php" ?>

		<main class="main-right">
			<p class="home-welcome"> Leave List  </p>
			<div class="filter">
				<p class="filter-text"><img src="../images/filter.png" class="filter-image">Filter: </p>
				<select class="filter-option" id="filter-option">
					<option value="all">All</option>
					<option value="Pending">Pending</option>
					<option value="Approved">Approved</option>
					<option value="Rejected">Rejected</option>
				</select>
				<select class="filter-option" id="filter-type">
					<option value="all">All</option>
					<option value="Casual Leave">Casual</option>
					<option value="Menstrual Leave">Menstrual</option>
					<option value="Sick Leave">Sick</option>
				</select>
			</div>

			<article class="leave-table">

				<table class="table" id="leave_table">
					<tr>
						<th>Leave ID</th>
						<th>Name</th>
						<th>Leave Date</th>
						<th>Leave Type</th>
						<th>Reason</th>
						<th>Status</th>
					</tr>
				</table>			
		</main>
	</section>

	<?php include "../includes/footer.php" ?>

	<script src="../assets/js/leave.js"></script>
</body>
</html>