<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "testsdata";

// Connect to the database
$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection to the database failed: " . mysqli_connect_error());
}
$userid =$_POST['userid'];
$sql1="SELECT * FROM `courses` WHERE `userID` = '$userid'";
$result = mysqli_query($con, $sql1);
if (mysqli_num_rows($result)>0){
    $count=0;
    while (mysqli_num_rows($result) > $count) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);
        $topicID = $row['topicID'];
        $sql2="SELECT * FROM `topics` WHERE `Topic_ID` = '$topicID'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);                                      
        $name=$row2['Topic_Name'];
        $desc=$row2['Descc'];
        $id=$row2['Topic_ID'];
        $type=($row2['type']==0)?'Public':'Private';
        $ub=$row2['UploadedBy'];
        $sql3 = "SELECT `name` FROM `userregister`.`register` WHERE `user_id` = '$ub'";
        $resultNm = mysqli_query($con, $sql3);
        $rowNm = mysqli_fetch_assoc($resultNm);
        $UbName = $rowNm['name'];
        $HTMLt = "<div class='testmetrics $type'>
                        <div class='testTopic'>
                            <h2>$name</h2>
                            <p>
                            
                            Type : <span class='Ctype'>$type</span><br><br>
                            By : $UbName
                            </p>
                        </div>
                        <div class='testDetails'>
                            <p>$desc</p>
                            <button id='$topicID' class='moveToTopic'> ENTER </button>
                        </div>
                    </div>";
        echo $HTMLt;
        $count++;
    }
}
else echo "You have not Joined any Courses till now";
?>