<?php 
    // Connect the database social with php (from phpmyadmin)
    ob_start(); // Turns on the output buffering
    session_start();

    $timezone = date_default_timezone_set("Europe/Paris");
    
    $con = mysqli_connect("localhost", "root", "", "social"); // connection variable

    if(mysqli_connect_errno()){ // Just test if the connection is done
        echo "Failed to connect" .mysqli_connect_errno();
    }

?>