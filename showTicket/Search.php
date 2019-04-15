<?php



require_once('../dbconnect/dbconnect.php');



Class Search {

    //database connection
    public function __construct()
    {
        $db = new DBConnect();
        $this->db = $db->pdo;
    }

 //search function
public function search_name($keyword){

    $query = "SELECT * FROM Tickets WHERE ticketId = '$keyword'";  
    $result = $this->db->prepare($query);  
    $result ->execute();  

    return $result;
}

 //view search result function 
public function view_all(){
    $query = "SELECT * FROM Tickets";  
    $result = $this->db->prepare($query);  
    $result ->execute();  

    return $result;
} 
}

?>