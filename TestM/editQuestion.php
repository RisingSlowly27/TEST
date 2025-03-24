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

    $qID=$_POST['qID'];
    $qMain = $_POST['qMain'];
    $qOptions = $_POST['qOptions'];
    $cAnswer = $_POST['cAnswer'];
    $qMarks = $_POST['qMarks'];

    // Insert new topic
    $sql = "UPDATE `questions` SET `qMain` = '$qMain', `qOptions` = '$qOptions', `cAnswer` = '$cAnswer', `qMarks` = '$qMarks' WHERE `questions`.`qID` = '$qID';";
    if ($con->query($sql) === TRUE) {
        echo 'Successfully Changed!';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>