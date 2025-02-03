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

    $name = $_POST['test_name'];
    $Ttype = $_POST['test_type'];
    $des = $_POST['test_desc'];
    $TL = $_POST['time_limit'];
    $ub = $_POST['ub'];
    $parent_ID = $_POST['parent_id'];

    // Insert new topic
    $sql = "INSERT INTO `tests` (`test_id`, `test_name`, `test_type`, `test_desc`, `uploaded_by`, `time_limit`, `parent_id`) VALUES (NULL, '$name', '$Ttype', '$des', '$ub', '$TL', '$parent_ID');";

    if ($con->query($sql) === TRUE) {
        // Get the last inserted Topic_ID
        $last_id = mysqli_insert_id($con);
        $HTMLt = "<div class='testmetrics'>
                            <div class='testTopic tests' style='background-color:lightblue'>
                                <h2>$name</h2>
                                <p>
                                Type : $Ttype<br><br>
                                Uploaded By : $ub
                                </p>
                            </div>
                            <div class='testDetails'>
                                <p>$des</p>
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