<?php

include '../dbconnect/dbconnect.php';

class ShowAllEvents{

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

    }