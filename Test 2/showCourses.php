<?php
    session_start();
    $parent =$_POST['userid'];

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "testsdata";

    // Connect to the database
    $con = mysqli_connect($server, $username, $password, $database);

    if (!$con) {
        die("Connection to the database failed: " . mysqli_connect_error());
    }

    // Query the database
    $sql = "SELECT * FROM `topics` WHERE `UploadedBy` = '$parent'";
    $result = mysqli_query($con, $sql);
    
    $top = '<div class="corTop '.$parent.'">
            <h3 class="loc">Home</h3>
            <div class="TopTop">
            <div class="cbutton">
                <button class="coursebtn" id="addTopicBtn">Add Topic</button>
                <button class="coursebtn" id="addTestBtn">Add Test</button>
            </div>
            <form class="form" id="addTopic">
                <label for="TN">TOPIC NAME :</label>
                <input type="text" id="TN" class="search" name="TN"><br>
                <label for="Des">DESCRIPTION :</label>
                <input type="text" id="Des" class="search" name="Des"><br>
                <button type="button" id="submitTopic">Add Topic</button>
            </form>
            <form class="form" id="addTest">
                <div>
                <label for="TN1">TEST NAME :</label>
                <input type="text" id="TN1" class="search" name="TN"><br>
                </div>
                <div>
                <label for="TestOptions">Test Type:</label>
                <select id="TestOptions" name="options">
                    <option value="0">MCQ</option>
                    <option value="1">Type 2</option>
                    <option value="2">Type 3</option>
                </select><br>
                </div>
                <div>
                <label for="Des1">DESCRIPTION :</label>
                <input type="text" id="Des1" class="search" name="Des"><br>
                </div>
                <div>
                <label for="TimeL">Time Limit in Minutes</label>
                <input type="text" id="TimeL" class="search" name="Des"><br>
                </div>
                <button type="button" id="submitTest">Add Test</button>
            </form>
            </div>
        </div>';
        echo $top;

    if (mysqli_num_rows($result)>0){
        $count=0;
        while (mysqli_num_rows($result) > $count) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $name=$row['Topic_Name'];
            $desc=$row['Descc'];
            $id=$row['Topic_ID'];
            $PI=$row['Parent_ID'];
            if ($PI==0){
                $HTMLt = "<div class='testmetrics'>
                                <div class='testTopic'>
                                    <h2>$name</h2>
                                    <p>
                                    Topic :<br><br>
                                    Type :<br><br>
                                    Uploaded By :
                                    </p>
                                </div>
                                <div class='testDetails'>
                                    <p>$desc</p>
                                    <button id='$id' class='moveToTopic'> ENTER </button>
                                </div>
                            </div>";
                echo $HTMLt;
            }
            $count++;
        }
    } 
    else {
        echo "<h1>No Files Found Here</h1>";
    }

    // Close the connection
    mysqli_close($con);
?>