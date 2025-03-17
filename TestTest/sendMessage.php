<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "userregister";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    $target=$_POST['target'];
    $userID=$_POST['userID'];
    $message=$_POST['message'];
    $newCon=$_POST['newCon'];
    if ($newCon=='1'){
        $sqlnew = "INSERT INTO `newcon` (`Sl`, `user1`, `user2`) VALUES (NULL, '$userID', '$target');";
        $resultnew = mysqli_query($con, $sqlnew);
    }

    $sql = "INSERT INTO `chats` (`Sl`, `message`, `fromID`, `toID`) VALUES (NULL, '$message', '$userID', '$target');";
    $result = mysqli_query($con, $sql);

    echo "<div class='messageU'><p>$message</p></div>";
    $con->close();
?>