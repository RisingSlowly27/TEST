<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "userregister";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    $type=$_POST['type'];
    // Query the database
    $sql = "SELECT * FROM `register` WHERE `user_type` = '$type'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0){
        $count=0;
        echo "<table class='resultTable' border='1'><tr><th>Sl No</th><th>User ID</th><th>User Name</th><th>Email</th><th>Password</th></tr>";
        while (mysqli_num_rows($result) > $count){
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $id=$row['user_id'];
            $name=$row['name'];
            $email=$row['Email'];
            $pass=$row['Password'];
            $count++;
            echo "<tr><td>$count</td><td>$id</td><td>$name</td><td>$email</td><td>$pass</td></tr>";
        }
        echo "</table>";
    } 
    else {
        echo "<h1>No Files Found Here</h1>";
    }

    // Close the connection
    mysqli_close($con);
?>