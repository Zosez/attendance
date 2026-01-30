<?php


	include "db.php";

	header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    

	if ($_SERVER['REQUEST_METHOD']=="GET"){
		echo viewAttendance();
	}

	function viewAttendance(){
		global $pdo;
		if (isset($_REQUEST['date'])) {
			$date=$_REQUEST['date'];
			try{

				$stmt = $pdo->prepare("Select empId from attendance where attendance_date=?");
				$stmt->execute([$date]);	
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

				if(count($result)>0){

					foreach($result as $value){

						foreach($value as $id){

							$fetch=$pdo->query("Select empId,fullname,department,role from employee where empId=$id");

							$info=$fetch->fetchAll(PDO::FETCH_ASSOC);

							foreach($info as $emp){
								$allAttendance[]=['id'=>$emp['empId'],
								'name'=>$emp['fullname'],
								'department'=>$emp['department'],
								'role'=>$emp['role'],
								'date'=>$date
								];	
						
							}
						}
							
					}
					return json_encode($allAttendance);
					
					
				}else{
					return json_encode($allAttendance[]=['id'=>'NO',
								'name'=>'Datas',
								'department'=>'Found',
								'role'=>'In this',
								'date'=>'Date'
								]);
				}
			}catch(PDOException	$e){
				
			}
		}
		

	}

?>


