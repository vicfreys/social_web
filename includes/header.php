<!-- Header called on each page -->

<?php 
// Connect the database social with php (from phpmyadmin)
require 'config/config.php';

//$query = mysqli_query($con, "INSERT INTO test VALUES('', 'Victor')"); // Query to insert a value Vicot (the id is autoinc hence '')

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
}
else {
    header("Location: register.php"); // Redirect to the registration page
}
?>

<html>
<head>
    <title>Document</title>
</head>
<body>