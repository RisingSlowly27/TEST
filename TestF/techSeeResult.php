<!DOCTYPE html>
<?php 
    session_start();
    $_SESSION['state']=1;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightgoldenrodyellow;
            text-align: center;
            margin: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: aqua;
        }

        td{
            background-color: #f2f2f2;
        }

        .stats{
            color: blue;
            text-decoration: underline;
        }

        .QBox{
            background-color: azure;
            border: 3px solid black;
            height: 1000px;
            width: auto;
            margin: 30px;
            text-align: center;
        }

        #backB{
            position: fixed;
            top: 80px;
            left: 60px;
            width: 120px;
            font-size: 20px;
        }

        .backB:hover{
            color:white;
            background-color: black;
        }

    </style>
</head>
<body>
    <h1>

    <?php
        $testID =$_POST['data'];
        $server = "localhost";
        $username = "root";
        $password = "";

        // Connect to the database
        $con = mysqli_connect($server, $username, $password);

        if (!$con) {
            die("Connection to the database failed: " . mysqli_connect_error());
        }

        $sql1 = "SELECT * FROM `testsdata`.`tests` WHERE `test_id` = '$testID'";
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $name=$row1['test_name'];
        echo $name;
    ?>

    </h1>

    <div id="Results" class="tab">
        <div class="explore">
            <h1>
            <label for="searchStuRes">Search Your Result : </label>
            <input type="text" id="searchStuRes" class="search" name="toSearch" placeholder="Enter Test" size="50px">
            </h1>
            <button id='backB' onclick="window.location.href='FlexboxMod.php'">Exit</button>
        </div>
        <div class="testBox StuResult">
            <table class="resultTable" border="1">
                <tr>
                <th>Result ID</th><th>User Name</th><th>Marks Obtained</th><th>Status</th><th>Time Taken</th><th>Detailed</th>
                </tr>
                <?php
                    $sql = "SELECT * FROM `testsdata`.`results` WHERE `testID` = '$testID'";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result)>0){
                        $count=0;
                        while (mysqli_num_rows($result) > $count) {
                            // Fetch the data
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['resultID'];
                            $userID=$row['userID'];
                            $marks = $row['uMarks'];
                            $timeTook = $row['uTimeT'];
                            $status = ($row['rMain']=='1') ? 'Passed' : 'Failed';
                            $staCol = ($row['rMain']=='1') ? 'green' : 'red';
                            $sqlIn="SELECT `name` FROM `userregister`.`register` WHERE `user_id` = '$userID'";
                            $resultIn = mysqli_query($con, $sqlIn);
                            $rowIn = $resultIn->fetch_assoc();
                            $name=$rowIn["name"];
                            $HTMLt = "<tr><td>$id</td><td>$name</td><td>$marks</td><td style='color:$staCol'>$status</td><td>$timeTook</td><td><button class='$id'>See Detailed</button></td></tr>";
                            echo $HTMLt;
                            $count++;
                        }
                    } 
                    else {
                        echo "<h3 No User has attempted this test till now</h3>";
                    }
                    $con->close();

                ?>
            </table>     
        </div>
    </div>
    <div class="stats">
        <h1>Advanced Statistics</h1>
        <div class="QBox">

        </div>
    </div>

</body>
</html>