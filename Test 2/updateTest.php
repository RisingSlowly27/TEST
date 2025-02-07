<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "testsdata";

    // Establish connection
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    $id = $_POST['test_id'];
    $TL = $_POST['time_limit'];
    $PM = $_POST['passMarks'];
    $totalM = $_POST['totalM'];
    // Insert new topic
    $sql = "UPDATE `tests` SET `time_limit` = '$TL', `passMarks` = '$PM', `totalM` = '$totalM' WHERE `tests`.`test_id` = $id;";

    if ($con->query($sql) === TRUE) {
        echo "Succesfully Updated Test !";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>