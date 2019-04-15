<?php 


$dbobject = new DBConnect(); 
$pdo = $dbobject->pdo; 

//customer signup function
if(isset($_POST['signupCustomerBtn'])){
        $firstName = filter_input(INPUT_POST,'firstname',FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST,'lastname', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST,'adress', FILTER_SANITIZE_STRING); 
        $zip_code = filter_input(INPUT_POST,'zip',FILTER_SANITIZE_NUMBER_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $userData = filter_input(INPUT_POST, 'userData', FILTER_SANITIZE_STRING);
       
    
    
        $signup = "INSERT INTO Customers(firstName, lastName, adress, zip_code, city, email, phone, username, password, userData) VALUES ('$firstName', '$lastName', '$address', '$zip_code', '$city', '$email', '$phone', '$username', '$password', '$userData')";
        $statement = $pdo->prepare($signup);
        $statement->execute(); 
    
        $_SESSION['message'] = "Registration of a new admin user success!";
        $_SESSION['msg_type'] = "success";
    
        }
    

          //customer login function
if(isset($_POST['loginCustomerBtn'])) {
        if(empty($_POST["username"]) || empty($_POST["password"]))  
        {  
             $message = '<label>All fields are required</label>';  
        }  
        else  
        {  
             $login = "SELECT * FROM Customers WHERE username = :username AND password = :password";  
             $result = $pdo->prepare($login);  
             $result->execute(  
                  array(  
                       'username'     =>     filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING),  
                       'password'     =>     filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING)  
                  )  
             );  
             
             $count = $result->rowCount();  
             if($count > 0)  
             {  
                  $_SESSION["username"] = $_POST["username"];  
     
                  header("location:startpage(index).php");  
                  echo $_SESSION['username'];
                   
             }  
             else  
             {  
                  $message = '<label>Wrong Data</label>';  
             }  
        }  
   }  
 
