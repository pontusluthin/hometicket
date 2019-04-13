<?php

require_once('../dbconnect/dbconnect.php');

class Admins{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database 

        public function select(){

            $sql = "SELECT * FROM adminLogin";
            $result = $this->db->prepare($sql);
            $result->execute(); 

                if($result->rowCount() > 0){
                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 

                        }

                        return $data; 

                }
            
        }


        public function selectOne($id)
        {
            $sql = "SELECT * FROM adminLogin WHERE adminId = :adminId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":adminId",$id);
            $stmt->execute(); 
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            return $result; 
            
        }

        public function update($fields, $id){

            $st = ""; 
            $counter = 1; 
            $total_fields = count($fields);
                foreach($fields as $key => $value){
                    
                        if($counter === $total_fields){
                            $set = "$key = :".$key; 
                            $st = $st.$set;                 
                            } 
                        else {
                            $set = "$key = :".$key.", ";
                            $st = $st.$set; 
                            $counter++; 
                        } 

                }

            $sql = ""; 
            $sql.= "UPDATE adminLogin SET ".$st;
            $sql.=" WHERE adminId = ".$id; 

            $stmt = $this->db->prepare($sql);

            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value); 
            }

            $stmtExec = $stmt->execute();
            
            if($stmtExec){
                header('Location: adminDisplay.php');
            }

        }

        public function delete ($id){
            $sql = "DELETE FROM adminLogin WHERE adminId = :adminId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":adminId", $id);
            $stmtExec = $stmt->execute();  

            if($stmtExec){
                header('Location: adminDisplay.php');
            }
        }
} 
