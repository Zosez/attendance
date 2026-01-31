<?php

	include "../config/session.php";
	$name=$_SESSION['name'];
	$id = $_SESSION['empId'];
	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='user'){

		include '../config/db.php';

		global $pdo;
		try{

			$stmt=$pdo->query("SELECT * from attendance where empId=$id");
			$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			
		}catch(PDOException $e){

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
	<link rel="stylesheet" type="text/css" href="../assets/css/userLeave.css">
</head>
<body>
	<section class="dashboard" >
		<?php include "../includes/userHeader.php" ?>

		<main class="main-right">
			<p class="home-welcome">Attendance History</p>

			<table class="table" id="leave_table">
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Date</th>
					</tr>
					<?php 
						if(isset($result)){

							foreach ($result as $attendance) {

								echo '<tr>';
								echo "<td>{$attendance['empId']}</td>";
								echo "<td>$name</td>";
								echo "<td>{$attendance['attendance_date']}</td>";
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