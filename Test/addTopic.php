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

    $topic = $_POST['topic'];
    $desc = $_POST['desc'];
    $parent = $_POST['parent'];
    $ub = $_POST['ub'];

    // Insert new topic
    $sql = "INSERT INTO `topics` (`Topic_ID`, `Topic_Name`, `Descc`, `Parent_ID`, `UploadedBy`) 
            VALUES (NULL, '$topic', '$desc', '$parent', '$ub')";

    if ($con->query($sql) === TRUE) {
        // Get the last inserted Topic_ID
        $last_id = mysqli_insert_id($con);
        $HTMLt = "<div class='testmetrics'>
                            <div class='testTopic'>
                                <h2>$topic</h2>
                                <p>
                                Topic :<br><br>
                                Type :<br><br>
                                Uploaded By :
                                </p>
                            </div>
                            <div class='testDetails'>
                                <p>$desc</p>
                                <button id='$last_id' class='moveToTopic'> ENTER </button>
                            </div>
                        </div>";
            echo $HTMLt;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>