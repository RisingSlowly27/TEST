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

    // Query the database
    $nmn='Home';
    $sql1 = "SELECT * FROM `topics` WHERE `Parent_ID` = '$parent'";
    $result = mysqli_query($con, $sql1);
    if ($parent!='0'){
        $sql2 = "SELECT `Topic_Name` FROM `topics` WHERE `Topic_ID` = '$parent'";
        $resultn = mysqli_query($con, $sql2);
        $rown = mysqli_fetch_assoc($resultn);
        $nmn = $rown['Topic_Name'];
    }
    echo "<div class='corTop $parent'><div class='TopTop'></div><button class='backB'>Back</button><h3 class='loc'>$nmn</h3></div>";
    if (mysqli_num_rows($result)>0){
        $count=0;
        while (mysqli_num_rows($result) > $count) {
            // Fetch the data
            $row = mysqli_fetch_assoc($result);
            $name=$row['Topic_Name'];
            $desc=$row['Descc'];
            $id=$row['Topic_ID'];
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
            $count++;
        }
    } 
    else {
        echo "<h1 class='NoF'>No Files Found Here</h1>";
    }

    // Close the connection
    mysqli_close($con);
?>