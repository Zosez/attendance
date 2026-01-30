<?php

	include "../config/session.php";
	$name=$_SESSION['name'];
	$id = $_SESSION['empId'];
	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='user'){

		include '../config/db.php';

		global $pdo;

		$stmt=$pdo->query("SELECT * from leaves where empId=$id");
		$result=$stmt->fetchAll(PDO::FETCH_ASSOC);



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
	<link rel="stylesheet" type="text/css" href="../assets/css/userLeave.css">
</head>
<body>
	<section class="dashboard" >
		<?php include "../includes/userHeader.php" ?>

		<main class="main-right">
			<p class="home-welcome">Leave History</p>

			<table class="table" id="leave_table">
					<tr>
						<th>Leave ID</th>
						<th>Name</th>
						<th>Leave Date</th>
						<th>Leave Type</th>
						<th>Reason</th>
						<th>Status</th>
					</tr>
					<?php 
						if(isset($result)){
							foreach ($result as $leave) {
								echo '<tr>';
								echo "<td>{$leave['leaveID']}</td>";
								echo "<td>{$leave['fullname']}</td>";
								echo "<td>{$leave['leave_date']}</td>";
								echo "<td>{$leave['leave_type']}</td>";
								echo "<td>{$leave['reason']}</td>";
								if($leave['status']==="Pending"){
									echo "<td><p class='status-text' id='pending'>{$leave['status']}</p></td>";
								}elseif ($leave['status']==="Rejected") {
									echo "<td><p class='status-text' id='rejected'>{$leave['status']}</p></td>";
								}else{
									echo "<td><p class='status-text' id='approved'>{$leave['status']}</p></td>";
								}
								echo "</tr>";
							}				
						}

					?>
				</table>	

		</main>
	</section>

	<?php include "../includes/footer.php" ?>
	
</body>
</html>