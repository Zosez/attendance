<?php

	include "db.php";


	if ($_SERVER['REQUEST_METHOD']=="GET"){
		echo viewLeave();
	}

	if ($_SERVER['REQUEST_METHOD']=="POST"){
		addLeave();
	}



	function addLeave(){

		global $pdo;

		$rawData = file_get_contents("php://input");

		$data=json_decode($rawData,true);

		$name=$data['name'];
		$date=$data['date'];
		$type=$data['type'];
		$reason=$data['reason'];
		try{
			$stmt = $pdo->prepare("Insert into leaves(fullname,reason,leave_date,leave_type) values (?,?,?,?);");

			$stmt->execute([$name,$reason,$date,$type]);	

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

			$allLeave[]=['name'=>$leave['fullname'],
				'leave_date'=>$leave['leave_date'],
				'leave_type'=>$leave['leave_type'],
				'status'=>$leave['status'],
				'reason'=>$leave['reason'],
			];
			return json_encode($allLeave);
		}
		
		}

		
	}



?>