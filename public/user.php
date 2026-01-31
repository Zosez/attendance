<?php
	include "../config/db.php";
	include "../config/session.php";

	include "../includes/functions.php";

	$name=$_SESSION['name'];
	$id = $_SESSION['empId'];

	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='user'){

		$totalPending = totalLeave($id);

		$attendance = todaysAttendance($id);

		

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			if (isset($_POST['attendance-btn'])){
				global $pdo;
				try{
					$pdo->query("Insert into attendance(empId) values ($id);");	
				}catch(PDOException $e){
					
				}
			}
		}

	}else{
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
	<link rel="stylesheet" type="text/css" href="../assets/css/user.css">
</head>
<body>
	<section class="dashboard" >
		<?php include "../includes/userHeader.php" ?>

		<main class="main-right">
			<p class="home-welcome">Welcome to Hazir dashboard <?php echo htmlspecialchars($name) ?> !!!</p>

			<article>
				<div class="attendance">
					<h3 class="leave-text">Today's Attendance: </h3>
					<form method="POST">
						<button class="attendance-btn" name="attendance-btn" type="Submit" >Present</button>	
					</form>
					
				</div>

				<div class="req-leave">
					<h3 class="leave-text">Request for leave:</h3>
					<button class="attendance-btn" id="leave-btn">Request</button>
				</div>

			</article>

			<aside class="feature-card">
				<div class="feature">
					<p>Today's Attendance Remark</p>
					<p class="numbers"><?php echo htmlspecialchars($attendance) ?> </p>
				</div>
				<div class="feature">
					<p>Total pending Leave Requests</p>
					<p class="numbers"><?php echo htmlspecialchars($totalPending) ?></p>
				</div>
			</aside>
			
		</main>
	</section>

	<aside class="pop-up" id="pop-up">

		<div class="close" id="close">X</div>

		<form class="leave-form" id="leave-form">
			<label>	Date for leave:</label>
			<input type="Date" id="leave-date" >
			<label>Leave Type: </label>
			<select id="leave-type">
				<option value="Casual Leave">Casual Leave</option>
				<option value="Menstrual Leave">Menstrual Leave</option>
				<option value="Sick Leave">Sick Leave</option>
			</select>
			<label>Reason for leave:</label>
			<textarea id="leave-reason"></textarea>
			<input type="hidden" id="emp-id" value="<?php echo htmlspecialchars($id) ?>">
			<input type="hidden" id="leave-name" value="<?php echo htmlspecialchars($name) ?>">
			<input type="button" value="Submit" class="leave-submit" id="leave-submit" onclick="addLeave()">
		</form>
	</aside>

	<?php include "../includes/footer.php" ?>
	<script src="../assets/js/user.js"></script>
</body>
</html>