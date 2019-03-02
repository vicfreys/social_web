<!-- Header called on each page -->

<?php 
// Connect the database social with php (from phpmyadmin)
require 'config/config.php';

//$query = mysqli_query($con, "INSERT INTO test VALUES('', 'Victor')"); // Query to insert a value Vicot (the id is autoinc hence '')

if(isset($_SESSION['username'])){
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query); // Returns all the information about the logged user in an array
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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

    <div class="top_bar">

        <div class="logo">
            <a href="index.php">Socialeed!</a>
        </div>

        <nav>
            <a href="#">
                <?php echo $user['first_name']; ?>
            </a>
            <a href="#">
                <i class="fas fa-home"></i>
                Home
            </a>
            <a href="#">
                <i class="far fa-comments"></i>
                Messages
            </a>
            <a href="#">
                <i class="fas fa-sliders-h"></i>
                Settings
            </a>
            <a href="#">
                <i class="fas fa-users"></i>
                Users
            </a>
            <a href="#">
                <i class="far fa-bell"></i>
            </a>
        </nav>

    </div>
