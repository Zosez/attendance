<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$database="final_db";

	try{
	$pdo = new PDO("mysql:host=$servername;dbname=$database",$username,$password);

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdo->query("CREATE TABLE IF NOT EXISTS employee (
					empId INT PRIMARY KEY AUTO_INCREMENT,
					fullname VARCHAR(100) NOT NULL,
					email VARCHAR(100) NOT NULL UNIQUE,
					password VARCHAR(255) NOT NULL,
					department VARCHAR(50),
					role VARCHAR(50),
					joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
				);");

	

	$pdo->query("CREATE TABLE IF NOT EXISTS leaves (
					leaveID INT PRIMARY KEY AUTO_INCREMENT,
					fullname VARCHAR(100) NOT NULL,
					leave_date DATE NOT NULL,
					leave_type VARCHAR(50) NOT NULL,
					reason TEXT,
					status VARCHAR(20) DEFAULT 'Pending'
				);");

	


	}catch(PDOException $e){
		echo $e->getMessage();
	}

	
?>

