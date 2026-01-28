<?php
    include "../config/db.php";
    


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

    function dept(){

        try{
            global $pdo;

            $dept = $pdo->query("Select distinct department from employee");

            $rows=$dept->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    function leaveNum(){

        try{
            global $pdo;

            $dept = $pdo->query("Select leaveID from leaves");

            $rows=$dept->fetchAll(PDO::FETCH_ASSOC);

            return $rows;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }


?>