<?php
    include "db.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    

    if($_SERVER['REQUEST_METHOD']==="GET"){
        echo infoEmployee();
    }

    if($_SERVER['REQUEST_METHOD']==="PUT"){
        editEmployee();
    }

    if($_SERVER['REQUEST_METHOD']==="DELETE"){
        deleteEmployee();
    }

    function infoEmployee(){
        try{

        global $pdo;

        $stmt = $pdo->query("Select * from employee");

        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $emp) {
            
            $allEmployee[] = ['ID'=>$emp['empId'],
                            'name'=>$emp['fullname'],
                            'email'=>$emp['email'],
                            'dept'=>$emp['department'],
                            'role'=>$emp['role'],
                            'joined_at'=>$emp['joined_at'],
                            ];
        }

        return json_encode($allEmployee);
        

        }catch (PDOException $e){

            echo $e->getMessage();
        }

    }

    function editEmployee(){
        if(isset($_REQUEST['empId'])){
            $id = $_REQUEST['empId'];
            $rawData = file_get_contents("php://input");
            $data = json_decode($rawData,true);
            $name=$data['name'];
            $email=$data['email'];
            $dept=$data['department'];
            $role=$data['role'];
            try{
                global $pdo;

                $stmt=$pdo->prepare("Update employee set fullname=?,email=?,department=?,role=? where empId=?");

                $stmt->execute([$name,$email,$dept,$role,$id]);

                echo infoEmployee();

            }catch(PDOException $e){
                echo $e->getMessage();
            }

        }
    }

    function deleteEmployee(){
        global $pdo;
        if(isset($_REQUEST['empId'])){
            $id = $_REQUEST['empId'];
            try{

                $stmt = $pdo->prepare("Delete from employee where empId=?");

                $stmt->execute([$id]);

                echo infoEmployee();

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

?>