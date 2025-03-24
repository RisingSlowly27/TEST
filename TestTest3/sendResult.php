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

    $testID=$_POST["testID"];
    $userID=$_POST["userID"];
    $uAns=$_POST["uAns"];
    $uMarks=$_POST["uMarks"];
    $uTimeT=$_POST["uTimeT"];
    $rMain=$_POST["rMain"];

    // Insert new topic
    $sql = "INSERT INTO `results` (`resultID`, `testID`, `userID`, `uAns`, `uMarks`, `uTimeT`, `rMain`) VALUES (NULL, '$testID', '$userID', '$uAns', '$uMarks', '$uTimeT', '$rMain');";

    if ($con->query($sql) === TRUE) {
        echo 'Successfully Added';
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>