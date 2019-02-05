<?php
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

        if(empty($error_array)){
            $password = md5($password);  // Encrypt password before sending it to database

            // Generate username by concatenating first name and last name
            $username = strtolower($fname . "_" . $lname);
            $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

            $i = 0;
            // if username exists add number to it
            while(mysqli_num_rows($check_username_query) != 0){
                $i++; // Add 1 to i
                $username = $username . "_" . $i;
                $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
            }
        

            // Default profile picture
            $rand = rand(1, 2);
            $profile_pic = "assets/images/profile_pictures/".$rand.".png"; // TO TEST

            $query = mysqli_query($con, "INSERT INTO users VALUES ('NULL', '$fname', '$lname', '$username', '$em', '$password', '$sudate', '$profile_pic', '0', '0','no', ',' )");
        
            array_push($error_array, "<span style='color: #14C800;'>You're all set! Goahead and login</span><br>");
        
            //Clear session variables when it is signed up
            $_SESSION['reg_fname']="";
            $_SESSION['reg_lname']="";
            $_SESSION['reg_email']="";
        }
    }
?>