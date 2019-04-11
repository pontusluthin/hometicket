<?php

$dbobject = new DBConnect(); 
$pdo = $dbobject->pdo; 

if(isset($_POST['signupAdminBtn'])){
    $adminUsername = filter_input(INPUT_POST,'adminUsername',FILTER_SANITIZE_STRING);
    $adminPassword = filter_input(INPUT_POST,'adminPassword', FILTER_SANITIZE_STRING);
    $adminEmail = filter_input(INPUT_POST,'adminEmail', FILTER_SANITIZE_STRING);  
    $adminPhone = filter_input(INPUT_POST, 'adminPhone', FILTER_SANITIZE_STRING);
   
    $signupAdmin = "INSERT INTO adminLogin(adminUsername, adminPassword, adminEmail, adminPhone) VALUES ('$adminUsername', '$adminPassword', '$adminEmail', '$adminPhone')";
    $statement = $pdo->prepare($signupAdmin);
    $statement->execute(); 

    $_SESSION['message'] = "Registration of a new admin user success!";
    $_SESSION['msg_type'] = "success";

    }


?>