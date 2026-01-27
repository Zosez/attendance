<?php

	include "../includes/functions.php";

	$info = infoEmployee();


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

				

				<table class="table">
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Department</th>
						<th>Role</th>
						<th>Joined At</th>
					</tr>
					
			<?php
				foreach($info as $emp){

						echo "<tr>";
						echo "<td>" . $emp['eID'] . "</td>";
						echo "<td>" . $emp['fullname'] . "</td>";
						echo "<td>" . $emp['email'] . "</td>";
						echo "<td>" . $emp['department'] . "</td>";
						echo "<td>" . $emp['role'] . "</td>";
						echo "<td>" . $emp['joined_at'] . "</td>";
						echo "</tr>";
					
				}
			?>					
				</table>
				
			</article>
		</main>
	</section>

	<?php include "../includes/footer.php" ?>
</body>
</html>