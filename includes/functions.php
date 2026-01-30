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

            return count($rows);
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    function leaveNum(){

        try{
            global $pdo;

            $dept = $pdo->query("Select leaveID from leaves where status='Pending'");

            $rows=$dept->fetchAll(PDO::FETCH_ASSOC);

            return count($rows);
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    function present(){
        try{
            global $pdo;
            $date=date("Y-m-d");
            
            $pre = $pdo->query("Select empId from attendance where attendance_date='{$date}';");

            $rows = $pre->fetchAll(PDO::FETCH_ASSOC);

            return count($rows);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


?>