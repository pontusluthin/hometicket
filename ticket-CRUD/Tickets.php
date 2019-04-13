<?php

require_once('../dbconnect/dbconnect.php');

class Tickets{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database 

        public function select(){

            $sql = "SELECT * FROM Tickets";
            $result = $this->db->prepare($sql);
            $result->execute(); 

                if($result->rowCount() > 0){
                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 

                        }

                        return $data; 

                }
            
        }

        public function insert($fields){

                //Insert new data into events
                //"INSERT INTO Events (eventTitle, eventImg, eventInfo, eventPrice) VALUES (:eventTitle, :eventImg, :eventInfo, :eventPrice)";

            $implodeColumns = implode(',', array_keys($fields));
            $implodePlaceholder = implode(", :", array_keys($fields));

            $sql = "INSERT INTO Tickets ($implodeColumns) VALUES (:".$implodePlaceholder.")";

            $stmt = $this->db->prepare($sql);

                foreach($fields as $key => $value){
                    $stmt->bindValue(':'.$key,$value); 
                }

            $stmtExec = $stmt->execute(); 

                if($stmtExec){
                    header('Location: ticketDisplay.php '); 
                    
                }
        }

        public function selectOne($id)
        {
            $sql = "SELECT * FROM Tickets WHERE ticketId = :ticketId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":ticketId",$id);
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
            $sql.= "UPDATE Tickets SET ".$st;
            $sql.=" WHERE ticketId = ".$id; 

            $stmt = $this->db->prepare($sql);

            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value); 
            }

            $stmtExec = $stmt->execute();
            
            if($stmtExec){
                header('Location: ticketDisplay.php');
            }

        }

        public function delete ($id){
            $sql = "DELETE FROM Tickets WHERE ticketId = :ticketId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":ticketId", $id);
            $stmtExec = $stmt->execute();  

            if($stmtExec){
                header('Location: ticketDisplay.php');
            }
        }
} 
