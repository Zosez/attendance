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
	<link rel="stylesheet" type="text/css" href="../assets/css/employee.css">
</head>
<body>
	<section class="dashboard">
		<?php include "../includes/header.php" ?>

		<main class="main-right">
			<p class="home-welcome"> Employee list  </p>

			<article class="employee-table">

				<input type="text" class="search-emp" id="serch_emp" placeholder="Search">
				<table class="table" id="employee_table">
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Department</th>
						<th>Role</th>
						<th>Joined At</th>
					</tr>
							
				</table>

				<form class="edit-form" id="edit-form">
					<input type="hidden" id="edit-id">	
					<label>Full Name:</label>
					<input type="text" id="edit-name">
					<label>Email:</label>
					<input type="Email" id="edit-email">
					<label>Department:</label>
					<input type="Text" id="edit-department">
					<label>Role:</label>
					<select id="edit-role">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select>
					<input id="edit-btn" value="Submit" type="button" onclick="editBtn()">
				</form>
				
			</article>
		</main>
	</section>

	<?php include "../includes/footer.php" ?>

	<script src="../assets/js/employee.js"></script>
</body>
</html>