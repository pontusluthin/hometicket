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

        public function insert($fields){

                //Insert new data into events
                //"INSERT INTO Events (eventTitle, eventImg, eventInfo, eventPrice) VALUES (:eventTitle, :eventImg, :eventInfo, :eventPrice)";

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
} 
