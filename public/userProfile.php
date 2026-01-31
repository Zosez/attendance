<?php
	include "../config/db.php";
	include "../config/session.php";
	$name=$_SESSION['name'];
	$id = $_SESSION['empId'];

	if(isset($_SESSION['logged_in']) & $_SESSION['role']==='user'){
		global $pdo; 
		try{

			$stmt=$pdo->query("Select email,department,joined_at from employee where empId=$id");

			$result=$stmt->fetch(PDO::FETCH_ASSOC);

			$email=$result['email'];
			$department=$result['department'];
			$joinedAt=$result['joined_at'];

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
	<link rel="stylesheet" type="text/css" href="../assets/css/userProfile.css">
</head>
<body>
	<section class="dashboard" >
		<?php include "../includes/userHeader.php" ?>

		<main class="main-right">
			<p class="home-welcome">Profile</p>

			<article class="details">
				<p class="user-details">Employee ID: <?php echo htmlspecialchars($id) ?></p>
				<p class="user-details">Name: <?php echo htmlspecialchars($name) ?></p>
				<p class="user-details">Email: <?php echo htmlspecialchars($email) ?></p>
				<p class="user-details">Department: <?php echo htmlspecialchars($department) ?></p>
				<p class="user-details">Joined at: <?php echo htmlspecialchars($joinedAt) ?></p>
			</article>
			
			
		</main>
	</section>

	

	<?php include "../includes/footer.php" ?>
	
</body>
</html>