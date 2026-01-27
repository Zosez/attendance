<?php

	session_start();

	$name = $_SESSION['name'];



?>



<header class="header-section">
			<div class="user-info">
				<img src="../images/user.png" class="user-image">
				<p class="user-name"><?php echo htmlspecialchars($name) ?><br> <?php echo date("Y-m-d")?></p>
			</div>

			<nav class="navigation">
				<a href="../public/home.php"><p><img src="../images/home.png" class="nav-images" alt="Home icon">Home</p></a>
				<a href="../public/employee.php"><p><img src="../images/employee.png" class="nav-images" alt="Employees icon">Employee</p></a>
				<a href="../public/attendance.php"><p><img src="../images/attendance.png" class="nav-images"alt="Attendance icon">Attendence</p></a>
				<a href="../public/leave.php"><p><img src="../images/leave.png" class="nav-images" alt="Leave icon">Leave</p></a>

			</nav>

			<a href="logout.php"><p class="logout"><img src="../images/logout.png" class="nav-images" alt="Logout icon">Log Out </p></a>
</header>