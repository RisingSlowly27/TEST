<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $DB="testsdata";

    $con = mysqli_connect($server,$username,$password,$DB);

    if (!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    $id=$_POST['test_id'];
    $name=$_POST['test_name'];
    $desc=$_POST['test_desc'];

    $sql = "UPDATE `tests` SET `test_id` = '$id', `test_name` = '$name', `test_desc` = '$desc' WHERE `tests`.`test_id` = $id;";

    if ($con->query($sql) === TRUE) {
        echo "Changed Successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();
}
?>