<?php 
session_start();
    
    //Database connection
    
    $conn = mysqli_connect('localhost', 'root', 'StillThere*23', 'registration') or die('Connection Failed..');
     
    //echo "Database Connection Successful";
?>