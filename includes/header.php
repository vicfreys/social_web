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
    <title>Welcome to Socialeed</title>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>

    <div class="top_bar">
        <div class="logo">
            <a href="index.php">Socialeed!</a>
        </div>
    </div>
