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

    $testID = $_POST['testID'];
    $qMain = $_POST['qMain'];
    $qOptions = $_POST['qOptions'];
    $cAnswer = $_POST['cAnswer'];
    $qMarks = $_POST['qMarks'];

    // Insert new topic
    $sql = "INSERT INTO `questions` (`qID`, `testID`, `qMain`, `qOptions`, `cAnswer`, `qMarks`) VALUES (NULL, '$testID', '$qMain', '$qOptions', '$cAnswer', '$qMarks');";

    if ($con->query($sql) === TRUE) {
        $last_id = mysqli_insert_id($con);
        echo $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>