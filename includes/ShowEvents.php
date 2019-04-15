<?php



class ShowEvents{

    //connection to database
        public function __construct()
        {
            $db = new DBConnect();
            $this->db = $db->pdo;
        }

    //select all data from the database, function to show all events on start page

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