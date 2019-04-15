<?php

 //logout function for logged in customers and admin users
 session_start();  
 session_destroy();  
 header("location:../startpage(index).php");  
 ?>  