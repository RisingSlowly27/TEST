<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if (!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    $userID=$_POST['userID'];
    $fname = $_POST['fName'];
    $age = $_POST['age'];
    $course = $_POST['courseNm'];
    $gender = $_POST['gender'];
    $contact = $_POST['contactDet'];

    $sql = "INSERT INTO `userregister`.`userinfo` (`userID`, `fullName`, `age`, `course`, `gender`, `contact`) VALUES ('$userID', '$fname', '$age', '$course', '$gender', '$contact')";

    if ($con->query($sql) === TRUE) {
        echo "Entered Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>