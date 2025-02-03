<?php
    $parent =$_POST['number'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "testsdata";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `tests` WHERE `parent_id` = '$parent'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result)>0){
        $count=0;
        while (mysqli_num_rows($result) > $count) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $id = $row['test_id'];
            $name = $row['test_name'];
            $Ttype = $row['test_type'];
            $des = $row['test_desc'];
            $TL = $row['time_limit'];
            $ub = $row['uploaded_by'];
            $HTMLt = "<div class='testmetrics'>
                            <div class='testTopic tests' style='background-color:blue'>
                                <h2>$name</h2>
                                <p>
                                Type : $Ttype<br><br>
                                Uploaded By : $ub
                                </p>
                            </div>
                            <div class='testDetails'>
                                <p>$des</p>
                                Time Limit : $TL<br>
                                <button id='$id' class='moveToTest'> Start Test </button>
                            </div>
                        </div>";
            echo $HTMLt;
            $count++;
        }
    } 
    else echo "--.--";

    // Close the connection
    mysqli_close($con);
?>