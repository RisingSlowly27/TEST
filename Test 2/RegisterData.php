<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if (!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $sql = "INSERT INTO `userregister`.`register` (`user_id`, `Email`, `Password`, `name`, `user_type`) 
            VALUES (NULL, '$email', '$password', '$name', '$user_type')";

    if ($con->query($sql) === TRUE) {
        echo "Registration Successful";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>