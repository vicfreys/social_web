<?php 
    require 'config/config.php'; // include first so the next requires have it
    require 'includes/form_handlers/register_handler.php';
    require 'includes/form_handlers/login_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/register_style.css">
    <title>Welcome to Socialeed</title>
</head>
<body>

<form action="register.php" method="POST">
    <input type="email" name="log_email" placeholder="Email address" value="<?php
     if(isset($_SESSION['log_email'])){
         echo $_SESSION['log_email'];
     }
     ?>" required>
    <br>

    <input type="password" name="log_password" placeholder="Password">
    <br>

    <?php if(in_array("Email or password was incorrect<br>", $error_array)) echo "Email or password was incorrect<br>";?>
    <input type="submit" name="login_button" value="Login"> 
</form>


<form action="register.php" method="POST">

    <!-- First Name -->
    <input type="text" name="reg_fname" placeholder="First Name" value="<?php
     if(isset($_SESSION['reg_fname'])){ 
         echo $_SESSION['reg_fname']; // Write the variable session into the field
     }
     ?>" required>
    <br>
    <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>

     <!-- Last Name -->
    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
     if(isset($_SESSION['reg_lname'])){
         echo $_SESSION['reg_lname'];
     }
     ?>" required>
    <br>
    <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

     <!-- Email -->
    <input type="email" name="reg_email" placeholder="Email" value="<?php
     if(isset($_SESSION['reg_email'])){
         echo $_SESSION['reg_email'];
     }
     ?>" required >
    <br>
    <?php if(in_array("Email already used<br>", $error_array)) echo "Email already used<br>";
    if(in_array("Invalid form<br>", $error_array)) echo "Invalid form<br>"; ?>

    <!-- Email confirmation -->
    <input type="email" name="reg_email2" placeholder="Confirm email" required>
    <br>
    <?php if(in_array("Email do not match<br>", $error_array)) echo "Email do not match<br>"; ?>

    <!-- Password -->
    <input type="password" name="reg_password" placeholder="Password" required>
    <br>
    <?php if(in_array("Your password can only contain english characters or number<br>", $error_array)) echo "Your password can only contain english characters or number<br>"; 
    if(in_array("Your password must be between 8 and 30 characters<br>", $error_array)) echo "Your password must be between 8 and 30 characters<br>"; ?>

    <!-- Password confirmation -->
    <input type="password" name="reg_password2" placeholder="Confirm password" required>
    <br>
    <?php if(in_array("Your password must be between 8 and 30 characters<br>", $error_array)) echo "Your password must be between 8 and 30 characters<br>"; ?>

    <!-- Submit -->
    <input type="submit" name="register_button" value="Register">
    <br>
    <?php if(in_array("<span style='color: #14C800;'>You're all set! Goahead and login</span><br>", $error_array)) echo "<span style='color: #14C800;'>You're all set! Goahead and login</span><br>"; ?>

</form>
    
</body>
</html>