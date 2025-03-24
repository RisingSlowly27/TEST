<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "testsdata";

// Establish connection
$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}

if (isset($_POST['test_id'])) {
    $id = $_POST['test_id'];
    $TL = $_POST['time_limit'];
    $PM = $_POST['passMarks'];
    $totalM = $_POST['totalM'];
    $toRem = $_POST['toRem']??[];
    // Insert new topic
    $sql = "UPDATE `tests` SET `time_limit` = '$TL', `passMarks` = '$PM', `totalM` = '$totalM' WHERE `tests`.`test_id` = $id;";

    if ($con->query($sql) === TRUE) {
        echo "Succesfully Updated Test !";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    foreach ($toRem as $q) {
        $sql2="DELETE FROM questions WHERE `questions`.`qID` = '$q'";
        $sql3="DELETE FROM qbank WHERE `qbank`.`qID` = $q AND `qbank`.`testID`='$id'";
        $con->query($sql2);
        $con->query($sql3);
    }
}
else{
    $toRem = $_POST['toRem'];
    foreach ($toRem as $q) {
        $sql2="DELETE FROM questions WHERE `questions`.`qID` = '$q'";
        $con->query($sql2);
    }
}
$con->close();
?>