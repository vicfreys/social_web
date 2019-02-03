<?php 

    session_start(); // Use to store the field if a problem occured

    // Connection variable to the database social with php (from phpmyadmin)
    $con = mysqli_connect("localhost", "root", "", "social");

    if(mysqli_connect_errno()){ // Just test if the connection is done
        echo "Failed to connect" .mysqli_connect_errno();
    }

    // Declaring variables to prevent errors
    $fname = ""; // First Name
    $lname = ""; // Last Name
    $em = ""; // Email
    $em2 = ""; // Email 2
    $password = ""; // Password
    $password2 = ""; // Password 2
    $sudate = ""; // Sign up date
    $error_array = array(); // Holds error messages

    if(isset($_POST['register_button'])){ // if the register button is pressed

        // Registration form values

        //First name
        $fname = strip_tags($_POST['reg_fname']); // strip_tags remove html tags, it is a security
        $fname = str_replace(' ', '', $fname); // Remove the spaces
        $fname = ucfirst(strtolower($fname)); // Lower all the case then Capitalize the first one
        $_SESSION['reg_fname'] = $fname; // Store first name into session variables

        //Last name
        $lname = strip_tags($_POST['reg_lname']); // strip_tags remove html tags, it is a security
        $lname = str_replace(' ', '', $lname); // Remove the spaces
        $lname = ucfirst(strtolower($lname)); // Lower all the case then Capitalize the first one
        $_SESSION['reg_lname'] = $lname;

        //Email
        $em = strip_tags($_POST['reg_email']); // strip_tags remove html tags, it is a security
        $em = str_replace(' ', '', $em); // Remove the spaces
        $_SESSION['reg_email'] = $em;

        //Email
        $em2 = strip_tags($_POST['reg_email2']); // strip_tags remove html tags, it is a security
        $em2 = str_replace(' ', '', $em2); // Remove the spaces
        
        //Password
        $password = strip_tags($_POST['reg_password']); // strip_tags remove html tags, it is a security
        
        //Password
        $password2 = strip_tags($_POST['reg_password2']); // strip_tags remove html tags, it is a security

        $sudate = date("Y-m-d"); // Current date

        if($em == $em2){
            // Check if email is in valid form
            if(filter_var($em, FILTER_VALIDATE_EMAIL)){
                $em = filter_var($em, FILTER_VALIDATE_EMAIL);

                // Check if email already exist
                $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");

                // Count the numbers of rows returned
                $num_rows = mysqli_num_rows($e_check);

                if($num_rows > 0){
                    array_push($error_array, "Email already used<br>");
                }
            }
            else {
                array_push($error_array,"Invalid form<br>");
            }
        }
        else {
            array_push($error_array,"Email do not match<br>");
        }

        if(strlen($fname) > 25 || strlen($fname) < 2){
            array_push($error_array,"Your first name must be between 2 and 25 characters<br>");
        }
        if(strlen($lname) > 25 || strlen($lname) < 2){
            array_push($error_array,"Your last name must be between 2 and 25 characters<br>");
        }
        if($password != $password2){
            array_push($error_array,"Password do not match<br>");
        }
        else {
            if(preg_match('/[^A-Za-z0-9]/', $password)){
                array_push($error_array,"Your password can only contain english characters or number<br>");
            }
        }

        if(strlen($password) > 30 || strlen($password) < 8){
            array_push($error_array,"Your password must be between 8 and 30 characters<br>");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Socialeed</title>
</head>
<body>

<form action="register.php" method="POST">

    <!-- First Name -->
    <input type="text" name="reg_fname" placeholder="First Name" value=<?php
     if(isset($_SESSION['reg_fname'])){ 
         echo $_SESSION['reg_fname']; // Write the variable session into the field
     }
     ?> 
     required>
    <br>
    <?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>

     <!-- Last Name -->
    <input type="text" name="reg_lname" placeholder="Last Name" value=<?php
     if(isset($_SESSION['reg_lname'])){
         echo $_SESSION['reg_lname'];
     }
     ?> required>
    <br>
    <?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>

     <!-- Email -->
    <input type="email" name="reg_email" placeholder="Email" value=<?php
     if(isset($_SESSION['reg_email'])){
         echo $_SESSION['reg_email'];
     }
     ?> required >
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

    <input type="submit" name="register_button" value="Register">
</form>
    
</body>
</html>