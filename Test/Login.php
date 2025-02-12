<?php
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "userregister";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    // Retrieve user input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database
    $sql = "SELECT * FROM `register` WHERE `Email` = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['Password'];
        $name=$row['name'];
        $id=$row['user_id'];

        // Check if the password matches
        if ($password === $storedPassword) { // No hashing, simple comparison
            // Redirect to another page
            $_SESSION['name'] = $name;
            $_SESSION['user_id'] = $id;
            $_SESSION['state']=0;
            echo "Success";
            exit();
        } 
        else {
            echo "Incorrect password.";
        }
    } 
    else {
        echo "Email not Found";
    }

    // Close the connection
    mysqli_close($con);
?>