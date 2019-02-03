<?php 
    // Connect the database social with php (from phpmyadmin)
    $con = mysqli_connect("localhost", "root", "", "social");

    if(mysqli_connect_errno()){ // Just test if the connection is done
        echo "Failed to connect" .mysqli_connect_errno();
    }

    $query = mysqli_query($con, "INSERT INTO test VALUES('', 'Victor')"); // Query to insert a value Vicot (the id is autoinc hence '')
?>

<html>
<head>
    <title>Document</title>
</head>
<body>
    Hello
</body>
</html>