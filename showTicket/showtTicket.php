<?php

//shis page is to search a valid ticket or see if ticket is valid

include('Search.php');
$search= new Search();

if (isset($_GET['submit'])){  
    $keyword = $_GET['keyword'];
    $go_search = $search->search_name($keyword);

    $data = $go_search->fetchAll(PDO::FETCH_ASSOC);   

    foreach($data as $row){
        echo $row['ticketId'];  
        /*echo $row['orderId']; 
        echo $row['eventId']; 
        echo $row['quantity'];
        echo $row['validation'];  */
        
    }  

}else{
    $view = $search->view_all();
    $data = $view->fetchAll(PDO::FETCH_ASSOC);  

    foreach($data as $row){
        echo $row['ticketId'];  
       /* echo $row['orderId']; 
        echo $row['eventId']; 
        echo $row['quantity'];
        echo $row['validation']; */ 
        
    }
}


?>

<html>
<form action="" method="get">  
<input type="text" name="keyword">  
<input type="submit" name="search">
</form>

</html>