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
    $userID=$_POST['userID'];

    // Query the database
    $sql = "SELECT * FROM `userinfo` WHERE `userID` = '$userID'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row){
        $fName=$row['fullName'];
        $age=$row['age'];
        $course=$row['course'];
        $gender=($row['gender']==0)?'Female':'Male';
        $contact=$row['contact'];
        echo $fName.'-|-|-'.$age.'-|-|-'.$course.'-|-|-'.$gender.'-|-|-'.$contact;
    } 
    else {
        echo "<>";
    }

    // Close the connection
    mysqli_close($con);
?>