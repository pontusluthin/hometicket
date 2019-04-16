<?php


require_once('../dbconnect/dbconnect.php');




Class Search {

    //database connection
    public function __construct()
    {
        $db = new DBConnect();
        $this->db = $db->pdo;
    }

 //function to show the logged in customers bought tickets
public function searchResult(){
    require('../loginCustomer/customer.php');
    $query = 
    "SELECT Customers.customerId, Orders.orderId, Customers.firstName, Customers.lastName, Orders.date, Events.eventTitle, Events.eventPrice, Events.eventDate, COUNT(Tickets.ticketId) AS NumOfTickets FROM Orders
   JOIN Customers  ON Orders.customerId = Customers.customerId
   JOIN Events ON Orders.eventId = Events.eventId
   JOIN Tickets ON Tickets.ticketId
   WHERE Customers.username ='".$_SESSION['username']."'";
   
    $result = $this->db->prepare($query);  
    $result ->execute();  


    
    if($result->rowCount() > 0){
                    
        while($row = $result->fetch()){
            
            $data[] = $row; 

        }

        return $data; 

        
    }
}

//function that shows the logged in customers tickets and if they are valid
    public function validTickets(){
        require('../loginCustomer/customer.php');
        $query =  "SELECT Tickets.ticketId, Events.eventTitle, Events.eventPrice,Events.eventDate, Tickets.validation FROM Tickets
       JOIN Orders ON Tickets.orderId = Orders.orderId
       JOIN Events ON Tickets.eventId = Events.eventId
       JOIN Customers ON Orders.customerId = Customers.customerId
        WHERE Customers.username ='".$_SESSION['username']."' AND Tickets.validation = 'valid'";
        
     

            $result = $this->db->prepare($query);  
            $result ->execute();  



            if($result->rowCount() > 0){
                            
                while($row = $result->fetch()){
                    
                    $data[] = $row; 

                }

                return $data; 

                }
            }

            public function notValidTickets(){
                require('../loginCustomer/customer.php');
                $query =  "SELECT Tickets.ticketId, Events.eventTitle, Events.eventPrice,Events.eventDate, Tickets.validation FROM Tickets
               JOIN Orders ON Tickets.orderId = Orders.orderId
               JOIN Events ON Tickets.eventId = Events.eventId
               JOIN Customers ON Orders.customerId = Customers.customerId
                WHERE Customers.username ='".$_SESSION['username']."' AND Tickets.validation = 'not valid'";
                
             
        
                    $result = $this->db->prepare($query);  
                    $result ->execute();  
        
        
        
                    if($result->rowCount() > 0){
                                    
                        while($row = $result->fetch()){
                            
                            $data[] = $row; 
        
                        }
        
                        return $data; 
        
                        }
                       
                    }

        

    }

    



?>