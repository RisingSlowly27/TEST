<?php
$server = "localhost";
$username = "root";
$password = "";

// Establish connection
$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}
$id=$_POST['topicID'];
$sql1="SELECT * FROM `testsdata`.`courses` WHERE `topicID` = '$id'";
$result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result)>0){
    $count=0;
    $HTMLt1="<table class='resultTable' border='1'>
                <tr>
                <th>USER ID</th><th>User Name</th> 
                </tr>";
    echo $HTMLt1;
    while (mysqli_num_rows($result) > $count) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);
        $UID = $row['userID'];
        $sql2="SELECT * FROM `userregister`.`register` WHERE `user_id` = '$UID'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $name=$row2['name'];
        $HTMLt2 = "<tr>
                <td>$UID</td><td>$name</td> 
                </tr>";
        echo $HTMLt2;
        $count++;
    }
    echo "</table>";
}
else echo "No Students";

echo "<button class='backB' id='viewSTDb' style='display:block'>Back</button>";

// Close the connection
mysqli_close($con);
?>