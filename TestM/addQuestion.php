<?php
session_start();
$userID=$_SESSION['user_id'];
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

    $testID = $_POST['testID'];
    $qMain = $_POST['qMain'];
    $qOptions = $_POST['qOptions'];
    $cAnswer = $_POST['cAnswer'];
    $qMarks = $_POST['qMarks'];
    // Insert new topic
    $sql = "INSERT INTO `questions` (`qID`, `qMain`, `qOptions`, `cAnswer`, `qMarks`,`uploadedBy`) VALUES (NULL, '$qMain', '$qOptions', '$cAnswer', '$qMarks','$userID');";

    if ($con->query($sql) === TRUE) {
        $last_id = mysqli_insert_id($con);
        echo $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    if ($testID!=0){
        $sql1 = "INSERT INTO `qbank` (`qID`, `testID`) VALUES ('$last_id','$testID');";
        $con->query($sql1);
    }
    // Close connection
    $con->close();
}
?>