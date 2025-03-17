<?php
session_start();
$UbName=$_SESSION['name'];
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

    $topic = $_POST['topic'];
    $desc = $_POST['desc'];
    $parent = $_POST['parent'];
    $ub = $_POST['ub'];
    $type=$_POST['type'];

    // Insert new topic
    $sql = "INSERT INTO `topics` (`Topic_ID`, `Topic_Name`, `Descc`, `type`, `Parent_ID`, `UploadedBy`) 
            VALUES (NULL, '$topic', '$desc', '$type', '$parent', '$ub')";

    if ($con->query($sql) === TRUE) {
        // Get the last inserted Topic_ID
        $last_id = mysqli_insert_id($con);
        $HTMLt1 = "<div class='testmetrics $type'>
                            <div class='testTopic'>
                                <h2>$topic</h2>
                                <p>
                                
                                ";
            $HTMLt2="";            
            if ($parent==0) $HTMLt2="Type : <span class='Ctype'>$type</span><br><br>";
            $HTMLt3="By : $UbName
                                </p>
                            </div>
                            <div class='testDetails'>
                                <p>$desc</p>
                                <button id='$last_id' class='moveToTopic'> ENTER </button>
                            </div>
                        </div>";
            $HTMLt=$HTMLt1.$HTMLt2.$HTMLt3;
            echo $HTMLt;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>