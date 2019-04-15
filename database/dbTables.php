<?php

//PHP code for created tables with specific foreign keyes

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hometicket";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 //refers to current object 



$event_Table = "CREATE TABLE Events (
    eventId INT (10) AUTO_INCREMENT PRIMARY KEY,
    eventTitle VARCHAR (100) NOT NULL, 
    eventImg VARCHAR (100) NOT NULL,
    eventInfo VARCHAR (250) NOT NULL, 
    eventPrice INT (11) NOT NULL
)";




$conn->exec($event_Table); 
echo "Table Events created successfully";


$customer_Table = "CREATE TABLE Customers(
    customerId INT (10) AUTO_INCREMENT PRIMARY KEY, 
    firstName VARCHAR (100) NOT NULL, 
    lastName VARCHAR (100) NOT NULL, 
    adress VARCHAR (150) NOT NULL, 
    zip_code INT (20) NOT NULL, 
    city VARCHAR (100) NOT NULL, 
    mail VARCHAR (100) NOT NULL,
    phone VARCHAR (100) NOT NULL
)";

$conn->exec($customer_Table); 
echo "Table Customers created successfully";

$order_Table = "CREATE TABLE Orders(
    orderId INT (10) AUTO_INCREMENT PRIMARY KEY, 
    date DATETIME NOT NULL, 
    customerId INT NOT NULL, 
    FOREIGN KEY fk_customer(customerId)
    REFERENCES Customers(customerId)
    

)";

$conn->exec($order_Table); 
echo "Table Orders created successfully";

$tickets_Table = "CREATE TABLE Ticket(
    ticketId INT (10) AUTO_INCREMENT PRIMARY KEY,
    orderId INT NOT NULL, 
    FOREIGN KEY fk_order(orderId)
    REFERENCES Orders(orderId), 
    eventId INT NOT NULL, 
    FOREIGN KEY fk_event(eventId)
    REFERENCES Events(eventId), 
    quantity INT NOT NULL
    
)";


$conn->exec($tickets_Table); 

echo "Table Ticket created successfully";

}
catch (PDOException $e){

    echo  "<br>" . $e->getMessage();

}

$conn = null;
?>

