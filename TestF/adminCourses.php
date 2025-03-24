<?php
    $server = "localhost";
    $username = "root";
    $password = "";


    // Connect to the database
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM testsdata.`topics` WHERE Parent_ID = '0'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0){
        $count=0;
        echo "<table class='resultTable' border='1'><tr><th>Sl No</th><th>Course ID</th><th>Course Name</th><th>Course Type</th><th>Uploaded By</th></tr>";
        while (mysqli_num_rows($result) > $count){
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $id=$row['Topic_ID'];
            $name=$row['Topic_Name'];
            $type=($row['type']=='0')?'Public':'Private';
            $UploadedBy=$row['UploadedBy'];
            $sql1 = "SELECT * FROM `userregister`.`register` WHERE user_id = '$UploadedBy'";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $ub=$row1['name'];
            $count++;
            echo "<tr><td>$count</td><td>$id</td><td>$name</td><td>$type</td><td>$ub</td></tr>";
        }
        echo "</table>";
    } 
    else {
        echo "<h1>No Files Found Here</h1>";
    }

    // Close the connection
    mysqli_close($con);
?>