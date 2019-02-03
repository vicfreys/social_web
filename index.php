<?php 
    // Connect the database with php
    $con = mysqli_connect("localhost", "root", "", "social");

    if(mysqli_connect_errno()){
        echo "Failed to connect" .mysqli_connect_errno();
    }

    $query = mysqli_query($con, "INSERT INTO test VALUES('', 'Victor')");
?>

<html>
<head>
    <title>Document</title>
</head>
<body>
    Hello
</body>
</html>