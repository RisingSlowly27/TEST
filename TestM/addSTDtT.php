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

    $test = $_POST['testID'];
    $toAdd = $_POST['STD'];
    $date= $_POST['scheduleD'];
    foreach ($toAdd as $q) {
        $sql2="INSERT INTO `testmap` (`Sl`, `testID`, `userID`) 
            VALUES (NULL, '$test', '$q')";
        $con->query($sql2);
    }
    $sql="UPDATE tests SET scheduled_on = '$date' WHERE test_id = $test";
    $con->query($sql);
    // Close connection
    $con->close();
}
?>