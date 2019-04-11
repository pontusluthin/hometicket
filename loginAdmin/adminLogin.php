<?php 


$dbobject = new DBConnect(); 
$pdo = $dbobject->pdo; 

if(isset($_POST['adminLoginBtn'])) {
     if(empty($_POST["adminUsername"]) || empty($_POST["adminPassword"]))  
     {  
          $message = '<label>All fields are required</label>';  
     }  
     else  
     {  
          $query = "SELECT * FROM adminLogin WHERE adminUsername = :adminUsername AND adminPassword = :adminPassword";  
          $statement = $pdo->prepare($query);  
          $statement->execute(  
               array(  
                    'adminUsername'     =>     filter_input(INPUT_POST,"adminUsername", FILTER_SANITIZE_STRING),  
                    'adminPassword'     =>     filter_input(INPUT_POST,"adminPassword",FILTER_SANITIZE_STRING)  
               )  
          );  
          
          $count = $statement->rowCount();  
          if($count > 0)  
          {  
               $_SESSION["adminUsername"] = $_POST["adminUsername"];  
  
               header("location:loginAdmin/adminSite.php");  
                
          }  
          else  
          {  
               $message = '<label>Wrong Data</label>';  
          }  
     }  
}  