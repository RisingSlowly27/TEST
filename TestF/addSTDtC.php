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

    $topic = $_POST['topicID'];
    $toAdd = $_POST['STD'];
    foreach ($toAdd as $q) {
        $sql2="INSERT INTO `courses` (`Sl`, `topicID`, `userID`) 
            VALUES (NULL, '$topic', '$q')";
        $con->query($sql2);
    }
    // Close connection
    $con->close();
}
?>