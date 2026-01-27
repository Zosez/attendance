<?php
    include "../config/db.php";
    


    function infoEmployee(){
        try{

        global $pdo;

        $stmt = $pdo->query("Select * from employee");

        $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;

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


?>