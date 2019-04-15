<?php

require_once('../dbconnect/dbconnect.php');

class Events{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database 

        public function select(){

            $sql = "SELECT * FROM Events";
            $result = $this->db->prepare($sql);
            $result->execute(); 

                if($result->rowCount() > 0){
                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 

                        }

                        return $data; 

                }
            
        }

        //Function to insert/create new events
        public function insert($fields){


            $implodeColumns = implode(',', array_keys($fields));
            $implodePlaceholder = implode(", :", array_keys($fields));

            $sql = "INSERT INTO Events ($implodeColumns) VALUES (:".$implodePlaceholder.")";

            $stmt = $this->db->prepare($sql);

                foreach($fields as $key => $value){
                    $stmt->bindValue(':'.$key,$value); 
                }

            $stmtExec = $stmt->execute(); 

                if($stmtExec){
                    header('Location: eventDisplay.php '); 
                    
                }
        }

        //function to select specific event to edit
        public function selectOne($id)
        {
            $sql = "SELECT * FROM Events WHERE eventId = :eventId";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":eventId",$id);
            $stmt->execute(); 
            $result = $stmt->fetch(PDO::FETCH_ASSOC); 

            return $result; 
            
        }

        //function to confirm edit and insert new values
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
            $sql.= "UPDATE Events SET ".$st;
            $sql.=" WHERE eventId = ".$id; 

            $stmt = $this->db->prepare($sql);

            foreach($fields as $key => $value){
                $stmt->bindValue(':'.$key, $value); 
            }

            $stmtExec = $stmt->execute();
            
            if($stmtExec){
                header('Location: eventDisplay.php');
            }

        }

        //function to delete the selected event
        public function delete ($id){
            $sql = "DELETE FROM Events WHERE eventId = :eventId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":eventId", $id);
            $stmt->execute();  
        }
} 
