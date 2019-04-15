<?php

require_once('../dbconnect/dbconnect.php');

class Orders{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database 

        public function select(){

            $sql = "SELECT * FROM Orders";
            $result = $this->db->prepare($sql);
            $result->execute(); 

                if($result->rowCount() > 0){
                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 

                        }

                        return $data; 

                }
            
        }

        //Function to insert new orders
        public function insert($fields){

            $implodeColumns = implode(',', array_keys($fields));
            $implodePlaceholder = implode(", :", array_keys($fields));

            $sql = "INSERT INTO Orders ($implodeColumns) VALUES (:".$implodePlaceholder.")";

            $stmt = $this->db->prepare($sql);

                foreach($fields as $key => $value){
                    $stmt->bindValue(':'.$key,$value); 
                }

            $stmtExec = $stmt->execute(); 

                if($stmtExec){
                    header('Location: orderDisplay.php '); 
                    
                }
        }

        //Function to select specific order to edit
        public function selectOne($id)
        {
            $sql = "SELECT * FROM Orders WHERE orderId = :orderId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":orderId",$id);
            $stmt->execute(); 
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            return $result; 
            
        }

        //Function to proceed and confirm edit on specific order
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
            $sql.= "UPDATE Orders SET ".$st;
            $sql.=" WHERE orderId = ".$id; 

            $stmt = $this->db->prepare($sql);

            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value); 
            }

            $stmtExec = $stmt->execute();
            
            if($stmtExec){
                header('Location: orderDisplay.php');
            }

        }

        //Function to delete specific order on delete click
        public function delete ($id){
            $sql = "DELETE FROM Orders WHERE orderId = :orderId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":orderId", $id);
            $stmtExec = $stmt->execute();  

            if($stmtExec){
                header('Location: orderDisplay.php');
            }
        }
} 
