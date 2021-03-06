<?php

require_once('../dbconnect/dbconnect.php');

class Customers{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database 

        public function select(){

            $sql = "SELECT * FROM Customers";
            $result = $this->db->prepare($sql);
            $result->execute(); 

                if($result->rowCount() > 0){
                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 

                        }

                        return $data; 

                }
            
        }

        //function to insert/create new customer
        public function insert($fields){


            $implodeColumns = implode(',', array_keys($fields));
            $implodePlaceholder = implode(", :", array_keys($fields));

            $sql = "INSERT INTO Customers ($implodeColumns) VALUES (:".$implodePlaceholder.")";

            $stmt = $this->db->prepare($sql);

                foreach($fields as $key => $value){
                    $stmt->bindValue(':'.$key,$value); 
                }

            $stmtExec = $stmt->execute(); 

                if($stmtExec){
                    header('Location: customerDisplay.php '); 
                    
                }
        }

        //function to select specific customer to edit
        public function selectOne($id)
        {
            $sql = "SELECT * FROM Customers WHERE customerId = :customerId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":customerId",$id);
            $stmt->execute(); 
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            return $result; 
            
        }

        //function to confirm update 
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
            $sql.= "UPDATE Customers SET ".$st;
            $sql.=" WHERE customerId = ".$id; 

            $stmt = $this->db->prepare($sql);

            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value); 
            }

            $stmtExec = $stmt->execute();
            
            if($stmtExec){
                header('Location: customerDisplay.php');
            }

        }

        //function to delete specific customer
        public function delete ($id){
            $sql = "DELETE FROM Customers WHERE customerId = :customerId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":customerId", $id);
             $stmtExec = $stmt->execute();  

            if($stmtExec){
                header('Location: customerDisplay.php');
            }
        }
} 
