<?php

	include "db.php";
	header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    

	if ($_SERVER['REQUEST_METHOD']=="GET"){
		echo viewLeave();
	}

	if ($_SERVER['REQUEST_METHOD']=="POST"){
		addLeave();
	}

	if ($_SERVER['REQUEST_METHOD']=="PUT"){
		editLeave();
	}



	function addLeave(){

		global $pdo;

		$rawData = file_get_contents("php://input");

		$data=json_decode($rawData,true);
		$empId=$data['empId'];
		$name=$data['name'];
		$date=$data['date'];
		$type=$data['type'];
		$reason=$data['reason'];
		try{
			$stmt = $pdo->prepare("Insert into leaves(empId,fullname,reason,leave_date,leave_type) values (?,?,?,?,?);");

			$stmt->execute([$empId,$name,$reason,$date,$type]);	

			echo viewLeave();



		}catch(PDOException $e){
			http_response_code(500);
			echo $e->getMessage();
		}
		

	

	}

	function viewLeave(){
		global $pdo;

		$stmt = $pdo->query("Select * from leaves");

		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(isset($result)){
			foreach($result as $leave){

			$allLeave[]=['Id'=>$leave['leaveID'],
				'name'=>$leave['fullname'],
				'leave_date'=>$leave['leave_date'],
				'leave_type'=>$leave['leave_type'],
				'status'=>$leave['status'],
				'reason'=>$leave['reason'],
			];
			
			
		}
		return json_encode($allLeave);
		}
	}

	function editLeave(){
		global $pdo;
		if(isset($_REQUEST['leaveId'])){

			$id = $_REQUEST['leaveId'];
			$status = $_REQUEST['status'];
			try{
				$stmt = $pdo->prepare("UPDATE leaves SET status = ? WHERE leaveID = ?");
				$stmt->execute([$status,$id]);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
		}else{
			http_response_code(500);
		}
	}



?>