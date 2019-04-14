SELECT  Orders.orderId, Orders.date, Customers.firstName, Customers.lastName, Customers.adress, Customers.zip_code, Customers.City, Customers.email, Customers.phone, Events.eventTitle, Events.eventDate, Tickets.quantity FROM Tickets
JOIN Events ON Tickets.eventId = Events.eventId
JOIN Orders ON Tickets.orderId = Orders.orderId
JOIN Customers ON Orders.customerId = Customers.customerId; 

<?php

include '../dbconnect/dbconnect.php';

$dbobject = new DBConnect(); 
$pdo = $dbobject->pdo; 


if(isset($_POST['search'])){


    


}
// Users search terms is saved in $_POST['q']
$q = $_POST['search'];
// Create array for the names that are close to or match the search term
$results = array();
foreach($pdo->query("SELECT  'Orders.orderId', 'Orders.date', 'Customers.firstName', 'Customers.lastName', 'Customers.adress', 'Customers.zip_code', 'Customers.City', 'Customers.email', 'Customers.phone', 'Events.eventTitle', 'Events.eventDate', 'Tickets.quantity' FROM Tickets
JOIN Events ON 'Tickets.eventId' = 'Events.eventId',
JOIN Orders ON 'Tickets.orderId = Orders.orderId',
JOIN Customers ON 'Orders.customerId' = 'Customers.customerId'; 
") as $name) {
  // Keep only relevant results
  // First takes the phonetic keys from each word, and compares the difference between them
  // If more than 3 charachters need to be added, deleted, or replaced, the word is thrown out
  // To get broader results, change the 3 to a higher number (and vice versa — for narrower results use a number below 3)
  if (levenshtein(metaphone($q), metaphone($name['name'])) < 3) {
    array_push($results,$name['name']);
  }
}
// Echo out results
foreach ($results as $result) {
  echo $result."\n";
}


?>

<html>

<form action="" method="post">
    <input type="text">
    <input type="submit" name="search">

</form>

</html>