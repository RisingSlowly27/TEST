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

    $sql = "SELECT * FROM `chats` WHERE (`fromID` = '$target' OR `fromID` = '$userID') AND (`toID` = '$target' OR `toID` = '$userID')";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result)>0){
        $count=0;
        while (mysqli_num_rows($result) > $count) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $fromUser = ($row['fromID']==$userID)?true:false;
            $chat=$row['message'];
            $HTMLt="";
            if ($fromUser) $HTMLt.="<div class='messageU'><p>";
            else $HTMLt.="<div class='messageT'><p>";
            $HTMLt.="$chat</p></div>";
            echo $HTMLt;
            $count++;
        }
    }
    echo "<div><input type='text' id='sendMi'></input><button id='sendMb'>Send Message</button></div>";
    $con->close();
?>