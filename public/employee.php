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
			<aside class="edit-form" id="form">
				<div class="close" id="close">X</div>
				<p class="edit-text">Edit Employee</p>
				<form class="form" id="edit-form">
					<input type="hidden" id="edit-id">	
					<label>Full Name:</label>
					<input type="text" id="edit-name" class="input">
					<label>Email:</label>
					<input type="Email" id="edit-email" class="input">
					<label>Department:</label>
					<input type="Text" id="edit-department" class="input">
					<label>Role:</label>
					<select id="edit-role" class="input">
						<option value="user">User</option>
						<option value="admin">Admin</option>
					</select>
					<input class="edit" id="edit" value="Submit" type="button" onclick="editBtn()">
				</form>
				
			</aside>
				
			</article>
		</main>
	</section>

	<?php include "../includes/footer.php" ?>

	<script src="../assets/js/employee.js"></script>
</body>
</html>