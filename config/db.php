<?php 
	$servername="localhost";
	$username="root";
	$password="";
	$database="final_db";

	try{
	$pdo = new PDO("mysql:host=$servername;dbname=$database",$username,$password);

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	


	}catch(PDOException $e){
		echo $e->getMessage();
	}

	
?>

