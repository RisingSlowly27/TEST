<!DOCTYPE html>
<?php
    session_start();
    $uName = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
    $userid = $_SESSION['user_id'];
    $countL=0;
    $joinedCourses=[];
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Explore Tab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0; 
	        background-color: #e1f934;
            overflow-x: hidden;
        }

        .centerFix{
            background-color: whitesmoke;
            position: fixed;
            display: none;
            top: 50%;
            left: 45%;
            border: 5px solid black;
            z-index: 5;
            padding: 25px;
        }

        .carousel {
            display: flex;
            overflow: hidden;
            background-color: #007BFF;
            width: 100%;
            height: 258px;
            z-index: 9;
        }

        .carousel img {
            width: auto;
            height: auto;
            margin-right: 10px;
            margin-left: 10px;
        }

        .navbar {
            position: sticky;
            top: 0;
            width: 98%;
            background-color: #6b00ca;
            outline : 3px solid #007BFF;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index : 10;
        }

        .navbar h1 {
            font-size: 24px;
            margin: 0;
        }

        .navbar .links {
            display: flex;
            gap: 15px;
        }

        .navbar .links a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar .links a:hover {
            text-decoration: underline;
        }
        
        .Page{
            display: flex;
            height:auto;
        }

        .leftSide{
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 50px;  /* Ensure the sticky element starts at the top */ 
            z-index: 10; /* Ensure it stays above other elements */
            align-items: center;
            width: auto;
            height: fit-content;
        }

        .welcome {
            color: blue;
            text-decoration-color: #ddd;
            text-align: center;
        }

        .logo {
            position: relative;
            height: 250px;
            width: 250px;
            top: -45px;
        }

        .sidebar {
            height : auto;
            width: 255px;
            background-color: #2beb37;
            border: 5px solid blue;
            padding: 20px;
            margin : 10px;
            overflow-y: auto;
        }

        .sidebar h2{
            font-size: 20px; 
            margin-bottom: 15px;
            text-align: center;
        }

        .sidebar h2:hover {
            background-color: #ddd;
            border : 3px solid red;
            padding: 5px;
            border-radius: 5px;
        }

        .sidebar h2.active {
            background-color: yellow;
            border: 3px solid red;
            padding: 5px;
            border-radius: 5px;
        }

        .Teacher{
            display: none;
        }

        .ExploreTab{
            width: 100%;
        }

        .explore{
            background-color: #e1f934;
            border-bottom:5px solid rgb(99, 16, 99);
            position: sticky;
            top: 50px;
            margin: 0;
            padding: 33.5px;
            font-size: 25px;
            text-align: center;
            z-index: 4;
        }

        .search{
            font-size: 25px;
            padding: 3px;
        }

        .mtestBox{
            padding: 50px 150px 50px 150px;
            width: 1260px;
            background-color: #ecd982;
            border: 5px solid rgb(99, 16, 99);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            column-gap:250px;
            row-gap: 50px;
        }

        .testBox{
            padding: 50px 150px 50px 150px;
            width: 1260px;
            background-color: #ecd982;
            border: 5px solid rgb(99, 16, 99);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            column-gap:250px;
            row-gap: 50px;
        }

        .rtestBox{
            padding: 50px 150px 50px 150px;
            width: 1260px;
            background-color: lightgoldenrodyellow;
            border: 5px solid rgb(99, 16, 99);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            column-gap:250px;
            row-gap: 50px;
        }

        .qtestBox{
            padding: 50px 150px 50px 150px;
            width: 1260px;
            background-color: #ecd982;
            border: 5px solid rgb(99, 16, 99);
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }

        .horz{
            width: inherit;
            display: flex;
            justify-content: center;
            align-self: center;
            gap: 50px;
            margin: 10px;
        }

        .sticky{
            position: sticky;
            top: 265px;
        }

        .testmetrics{
            height: 300px;
            width: 300px;
            position: relative;
            z-index: 3;
        }

        .testTopic {
            position: absolute;
            height: 100%;
            width: 100%;
            font-size: large;
            background-color: red;
            border: 10px solid black;
            text-align: center;
            align-content: center;
            transition: transform 1.5s ease;
            overflow: visible;
            z-index: 2;
        }

        .testmetrics:hover .testTopic {
            transform: translateX(-50%);
            background-color: black;
            color: white;
            border-color: rgb(255, 0, 230);
        }

        .testmetrics:hover .testTopic h2{
            color: rgb(255, 0, 230);
        }

        .testDetails {
            position: absolute;
            top: 0;
            /* Initially hidden to the right */
            width: 100%;
            height: 100%;
            border: 10px solid black;
            background-color: yellow;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: transform 1.5s ease;
            z-index: 1;
        }

        .testmetrics:hover .testDetails {
            transform: translateX(50%); /* Slide in on hover */
        }

        #switch{
            position: absolute;
            left: 1530px;
            top: 50px;
            display: none;
            gap:0;
        }

        #switch button{
            width: 130px;
            font-size: 20px;
            background-color: white;
            border: .5px solid black;
            margin: 0;
        }

        #switch button.selected{
            background-color:brown;
            color: white;
        }

        .coursebtn{
            font-size: 20px;
            width: 400px;
            padding: 5px;
            margin: 10px 120px 10px 120px;
        }

        .cbutton{
            display: flex;
            justify-content: center;
            width: auto;
        }

        .form{
            background-color: lightgoldenrodyellow;
            height: auto;
            width: auto;
            padding: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: center;
            align-items: center;
        }

        #addTopic{
            border: 5px solid black;
            display: none;
        }

        #addTest{
            border: 5px solid black;
            display: none;
        }

        .SeeRes{
            background-color: #6b00ca;
            color: aquamarine;
        }

        .SeeRes:hover{
            background-color: black;
            color: #ddd;
        }

        #submitTopic{
            font-size: 16px;
            height: 40px;
            width: 180px;
        }

        .corTop{
            position: sticky;
            top: 180px;
            width: 1280px;
            height: auto;
            z-index: 4;
        }

        .backB:hover{
            color:white;
            background-color: black;
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

        #changeTD{
            position: fixed;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-self: center;
            top: 56%;
            left: 51%;
            background-color: aqua;
            border: 5px solid black;
            padding: 10px;
            z-index: 5;
        }

        #changeTD div{
            padding: 10px;
            white-space: pre;
        }

        .questionB{
            padding: 30px;
            background-color: aqua;
            border: 3px solid brown;
        }

        .removeQ{
            background-color: black;
            color:white;
            position: relative;
            width: 175px;
            left: 825px;
        }

        .removeQ:hover{
            background-color: white;
            color:black;
        }

        .chatLeft{
            width:30%;
        }

        #chatRight{
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 10px;
            width:68%;
        }

        .chatUser{
            width:100%;
        }

        .messageU{
            display: flex;
            justify-content: flex-end;
        }

        .messageU p{
            background-color: lawngreen;
            width: 50%;
            border: 2px solid black;
            border-radius: 3px;
            padding: 10px;
        }

        .messageT p{
            background-color: white;
            width: 50%;
            border: 2px solid black;
            border-radius: 3px;
            padding: 10px;
        }

        #sendMi{
            width:70%;
            padding: 7px;
        }

        #sendMb{
            width:20%;
            background-color: aqua;
            padding: 7px;
        }

        .activeChat{
            background-color: limegreen;
            color: white; 
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 67%;
            border: black solid;
        }

        .form-container label {
            font-weight: bold;
        }
        
        .form-container input, .form-container select, .form-container textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 68%;
            text-align: center;
        }
        .card h2 {
            margin-bottom: 10px;
        }
        .info {
            text-align: left;
            margin: 10px 0;
        }
        .info strong {
            color: #333;
        }

        #UserInfo img{
            width: 27%;
            height: 350px;
            margin-right: 10px;
            margin-left: 10px;
        }

        #editUser{
            position: relative;
            top: -9%;
            left: 31%;
            font-size: 19px;
            width: 17%;
            background-color: lightgrey;
        }

        #editUser:hover{
            background-color: #333;
            color:whitesmoke;
        }

        .Admin{
            width: 100%;
            margin:75px;
        }

        .AdminCon{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .AdminCon button{
            width: 50%;
            font-size: large;
            height: auto;
        }

    </style>
</head>
<body>
    <div class="carousel" aria-label="Image carousel" role="region">
        <img src="./img/I2.jpeg" alt="Image 1">
        <img src="./img/I1.jpeg" alt="Image 2">
        <img src="./img/I8.jpeg" alt="Image 3">
        <img src="./img/I7.jpeg" alt="Image 4">
        <img src="./img/I4.jpeg" alt="Image 5">
        <img src="./img/I11.jpeg" alt="Image 6">
        <!-- Duplicate the images for seamless looping -->
        <img src="./img/I2.jpeg" alt="Image 1">
        <img src="./img/I1.jpeg" alt="Image 2">
        <img src="./img/I8.jpeg" alt="Image 3">
        <img src="./img/I7.jpeg" alt="Image 4">
        <img src="./img/I4.jpeg" alt="Image 5">
        <img src="./img/I11.jpeg" alt="Image 6">    
    </div>
    <div class="navbar">
        <h1>Online Examination System - <span>Student</span> Mode</h1>
        <div class="links">
            <a href="file:///C:/Users/DON%20ALOYSIUS/Desktop/Mini-Project%202nd%20Year/ScrollingIMG.html#">Home</a>
            <a href="#" id="switchBtn">Switch</a>
            <a href="file:///C:/Users/DON%20ALOYSIUS/Desktop/Mini-Project%202nd%20Year/ScrollingIMG.html#">About</a>
            <a href="file:///C:/Users/DON%20ALOYSIUS/Desktop/Mini-Project%202nd%20Year/ScrollingIMG.html#">Contact</a>
        </div>
        <div id="switch">
            <button id="stdBtn" onclick="selectRole('Student',this)" class="selected">Student</button>
            <button id="tchBtn" onclick="selectRole('Teacher',this)">Teacher</button>
            <button id="admBtn" onclick="selectRole('Admin',this)">Admin</button>
        </div>
    </div>
    <div class="Page">
        <div class="leftSide">
            <div class="welcome">
                <h2>WELCOME<br> 
                <span id="welUser"><?php echo $uName; ?></span>
                </h2>
            </div>


            <div class="sidebar Student activerole" id="stbar">
                <h2 class="active" onclick="selectTab('ExploreTab', this)">EXPLORE</h2>
                <h2 onclick="selectTab('UpcomingTests', this)">UPCOMING TESTS</h2>
                <h2 onclick="selectTab('courseSTD', this)">YOUR COURSES</h2>
                <h2 onclick="selectTab('Results', this)">RESULTS</h2>
                <h2 onclick="selectTab('Discussions', this)">DISCUSSIONS</h2>
                <h2 onclick="selectTab('UserInfo', this)">USER INFO &amp; STATISTICS</h2>
            </div>
            <div class="sidebar Teacher" id="techbar">
                <h2 class="active" onclick="selectTab('ExploreTabT', this)">EXPLORE</h2>
                <h2 onclick="selectTab('course', this)">YOUR COURSES</h2>
                <h2 onclick="selectTab('exams', this)">MANAGE EXAMS</h2>
                <h2 onclick="selectTab('questionBank', this)">YOUR QUESTION BANK</h2>
                <h2 onclick="selectTab('discussions', this)">DISCUSSIONS</h2>
                <h2 onclick="selectTab('UserInfoT', this)">USER INFO &amp; STATISTICS</h2>
            </div>
            <img class="logo" src="./LOGO-stamp.png" alt="Image 1">
        </div>
        <div class="Student activerole">
            <div class="tab ExploreTab" id="ExploreTab">
                <div class="explore">
                    <h1>
                    <label for="search">Explore Tab</label>
                    <input type="text" id="search" class="search" name="toSearch" placeholder="Search For Tests" size="50px">
                    </h1>
                </div>

                <div class="testBox exp">     
                </div>
            </div>
            
            <div id="UpcomingTests" class="tab">
                <h1>UPCOMING TESTS</h1>
                <div class="testBox">
                <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";

                    // Connect to the database
                    $con = mysqli_connect($server, $username, $password);

                    if (!$con) {
                        die("Connection to the database failed: " . mysqli_connect_error());
                    }
                    $sql1="SELECT * FROM `testsdata`.`testmap` WHERE `userID` = '$userid'";
                    $result = mysqli_query($con, $sql1);
                    if (mysqli_num_rows($result)>0){
                        $count=0;
                        while (mysqli_num_rows($result) > $count) {
                            // Fetch the data
                            $rowT = mysqli_fetch_assoc($result);
                            $id=$rowT['testID'];
                            $sql2="SELECT * FROM `testsdata`.`tests` WHERE `test_id` = '$id'";
                            $result2 = mysqli_query($con, $sql2);
                            $row = mysqli_fetch_assoc($result2);
                            $name = $row['test_name'];
                            $Ttype = ($row['test_type']==0)?'MCQ':'Option 2';
                            $des = $row['test_desc'];
                            $TL = $row['time_limit'];
                            $UUBB = $row['uploaded_by'];
                            $sql11 = "SELECT * FROM `userregister`.`register` WHERE user_id = '$UUBB'";
                            $result11 = mysqli_query($con, $sql11);
                            $row11 = mysqli_fetch_assoc($result11);
                            $ub=$row11['name'];
                            $PM = $row['passMarks'];
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
                                            Time Limit : $TL<br><br>
                                            Pass Marks : $PM<br><br>
                                            <button class='$id startTest'> Start Test</button><br>
                                        </div>
                                    </div>";
                            echo $HTMLt;
                            $count++;
                        }
                    }
                    else echo "<h2>You don't have any upcoming tests now</h2>";
                    ?>
                </div>
            </div>

            <div id="courseSTD" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchCourseSTD">YOUR COURSES</label>
                    <input type="text" id="searchCourseSTD" class="search" name="toSearch" placeholder="Search For the Course" size="50px">
                    </h1>
                </div>
                <div class="testBox courseSTD">
                    <div class="corTop">
                        <button class='backB'>Back</button>
                        <h3 class='loc'>Home</h3>
                    </div>
                </div>
            </div>

            <div id="Results" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchStuRes">Search Your Result : </label>
                    <input type="text" id="searchStuRes" class="search" name="toSearch" placeholder="Enter Test" size="50px">
                    </h1>
                </div>
                <div class="rtestBox StuResult">
                    <table class="resultTable" border="1">
                        <tr>
                        <th>Result ID</th><th>Test Name</th><th>Marks Obtained</th><th>Status</th><th>Time Taken</th><th>Detailed</th>
                        </tr>
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
                    
                            $sql = "SELECT * FROM `results` WHERE `userID` = '$userid'";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result)>0){
                                $count=0;
                                while (mysqli_num_rows($result) > $count) {
                                    // Fetch the data
                                    $row = mysqli_fetch_assoc($result);
                                    $id = $row['resultID'];
                                    $testID=$row['testID'];
                                    $marks = $row['uMarks'];
                                    $timeTook = $row['uTimeT'];
                                    $status = ($row['rMain']=='1') ? 'Passed' : 'Failed';
                                    $staCol = ($row['rMain']=='1') ? 'green' : 'red';
                                    $sqlIn="SELECT `test_name` FROM `tests` WHERE `test_id` = '$testID'";
                                    $resultIn = mysqli_query($con, $sqlIn);
                                    $rowIn = $resultIn->fetch_assoc();
                                    $test_name=$rowIn["test_name"];
                                    $HTMLt = "<tr><td>$id</td><td>$test_name</td><td>$marks</td><td style='color:$staCol'>$status</td><td>$timeTook</td><td><button class='$id'>See Detailed</button></td></tr>";
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
            <div id="Discussions" class="tab">
                <div class="testBox" style="justify-content: unset; column-gap: unset; row-gap: unset; padding:unset;">
                    <div class="chatLeft">
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
                    
                            $sql = "SELECT * FROM `newcon` WHERE `user1` = '$userid' OR `user2` = '$userid'";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result)>0){
                                $count=0;
                                while (mysqli_num_rows($result) > $count) {
                                    // Fetch the data
                                    $row = mysqli_fetch_assoc($result);
                                    $usercon = ($row['user1']==$userid)?$row['user2']:$row['user1'];
                                    $sqlcon = "SELECT * FROM `register` WHERE `user_id` = '$usercon'";
                                    $resultcon = mysqli_query($con, $sqlcon);
                                    $rowcon = mysqli_fetch_assoc($resultcon);
                                    $userconNm = $rowcon['name'];
                                    $HTMLt = "<button class='chatUser chat$usercon'><h1>$userconNm</h1></button><br>";
                                    echo $HTMLt;
                                    $count++;
                                }
                            } 
                            else {
                                echo "<h3>You do not have any messages</h3>";
                            }
                            $con->close();
                            echo "<button class='chatUser chatNew'><h1>Start New Conv</h1></button>";
                        ?>
                    </div>
                    <div id="chatRight">

                    </div>
                </div>
            </div>
            <div id="UserInfo" class="tab">
                <div class="explore">
                    <h1>
                        User Info & Statistics
                    </h1>
                </div>
                <div class="testBox" style="flex-direction: row;">
                    <div class="testBox" style="flex-direction: row;background: white;padding: 20px;border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);column-gap: 0;">
                        <img src="./img/userDPs/defaultDP.jpg" alt="Image 1"> 
                        <div class="card">
                            <h2>Student Details</h2>
                            <div class="info"><strong>User ID:</strong> <span id="userID"><?php echo $userid;?> </span></div>
                            <div class="info"><strong>UserName:</strong> <span id="userNm"></span><?php echo $uName;?></div>
                            <div class="info"><strong>Full Name:</strong> <span id="Fname" style="font-style: italic;">Not Entered</span></div>
                            <div class="info"><strong>Age:</strong> <span id="uAge" style="font-style: italic;">Not Entered</span></div>
                            <div class="info"><strong>Email:</strong><?php echo $_SESSION['email'];?></div>
                            <div class="info"><strong>Course:</strong> <span id="uCourse" style="font-style: italic;">Not Entered</span></div>
                            <div class="info"><strong>Gender:</strong> <span id="gender" style="font-style: italic;">Not Entered</span></div>
                            <div class="info"><strong>Contact Details:</strong> <span id="contact" style="font-style: italic;">Not Entered</span></div>
                            <button id="editUser">Edit/Enter Info</button>
                        </div>
                        <div class="form-container" style="display:none">
                            <h2>Student Information Form</h2>
                            <form id="studentForm">
                                <label for="name">Full Name:</label>
                                <input type="text" id="name" name="name" required>
                                
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" required>
                                
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                                
                                <label for="courseNm">Course:</label>
                                <input type="text" id="courseNm" name="courseNm" required>
                                
                                <div style="display:flex">Gender:<input type="radio" name="gender" id="genderM" value="1" required><label for="genderM">Male</label><input type="radio" name="gender" id="genderF" value="0"><label for="genderF">Female</label>
                                </div>
                                <label for="contactDet">Contact Details:</label>
                                <textarea id="contactDet" name="address" rows="3"></textarea>
                                
                                <button id="submitEditUser">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Teacher">
            <div class="tab ExploreTab" id="ExploreTabT">
                <div class="explore">
                    <h1>
                    <label for="searchT1">Explore Tab</label>
                    <input type="text" id="searchT1" class="search" name="toSearch" placeholder="Search For Tests" size="50px">
                    </h1>
                </div>

                <div class="testBox exp">
                </div>
            </div>
            
            <div id="course" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchT2">Your Courses</label>
                    <input type="text" id="searchT2" class="search" name="toSearch" placeholder="Search For The Course" size="50px">
                    </h1>
                </div>

                <div class="testBox userCourse" id="userCourse">
                    <div class="corTop">
                        <div class="TopTop">
                            <div class="cbutton">
                                <button class="coursebtn" id="addTopicBtn">Add Topic</button>
                                <button class="coursebtn" id="addTestBtn">Add Test</button>
                            </div>
                            <form class="form" id="addTopic">
                                <label for="TN">NAME :</label>
                                <input type="text" id="TN" class="search" name="TN"><br>
                                <label for="Des">DESCRIPTION :</label>
                                <input type="text" id="Des" class="search" name="Des"><br>
                                <div>
                                    TYPE :
                                <label>
                                    <input type="radio" name="cTy" value="option1"> Public
                                </label>
                                <label>
                                    <input type="radio" name="cTy" value="option2"> Private
                                </label>
                                </div>
                                <button type="button" id="submitTopic">CREATE</button>
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
                        <button class='backB'>Back</button>
                        <h3 class='loc'>Home</h3>
                    </div>
                </div>
            </div>
            <div id="exams" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchTest3">Manage Exams</label>
                    <input type="text" id="searchTest3" class="search" name="toSearch" placeholder="Search For Exam" size="50px">
                    </h1>
                </div>
                <div class="mtestBox">
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

                    // Query the database
                    $sql = "SELECT * FROM `tests` WHERE `uploaded_by` = '$userid'";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result)>0){
                        $count=0;
                        while (mysqli_num_rows($result) > $count) {
                            // Fetch the data
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['test_id'];
                            $name = $row['test_name'];
                            $Ttype = ($row['test_type']==0)?'MCQ':'Option 2';
                            $des = $row['test_desc'];
                            $TL = $row['time_limit'];
                            $ub = $row['uploaded_by'];
                            $PasM = $row['passMarks'];
                            $totalM = $row['totalM'];
                            $HTMLt = "<div class='testmetrics' id='TM$id'>
                                            <div class='testTopic tests' style='background-color:blue'>
                                                <h2>$name</h2>
                                                <p>
                                                Type : $Ttype<br><br>
                                                Total Marks : $totalM<br><br>
                                                Pass Marks : $PasM 
                                                </p>
                                            </div>
                                            <div class='testDetails'>
                                                <p>$des</p>
                                                Time Limit : $TL<br><br>
                                                <button class='$id CTD'> Change Topic & Desc </button><br>
                                                <button class='$id addQTest'> Edit Test</button><br>
                                                <button class='$id scheduleTest'> Schedule Test </button><br>
                                                <button class='$id SeeRes'> Check Results </button>
                                            </div>
                                        </div>";
                            echo $HTMLt;
                            $count++;
                        }
                    } 
                    else {
                        echo "<h1>You have not made any test Files yet<br>Go To Your Courses to make a Test File</h1>";
                    }
                
                    // Close the connection
                    mysqli_close($con);
                ?>
                </div>
            </div>
            <div id="questionBank" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchT3">Search For Questions</label>
                    <input type="text" id="searchT3" class="search" name="toSearch" placeholder="Enter Question" size="50px">
                    </h1>
                </div>
                <div class="qtestBox" id="testArea">   
                    <div class="horz sticky"><button id="AQ"> Add Question</button><button id="SC"> Save Changes</button></div>                     
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
                        $sql2 = "SELECT * FROM `questions` WHERE `uploadedBy` = '$userid'";
                        $result2 = mysqli_query($con, $sql2);
                        if (mysqli_num_rows($result2)>0){
                            $count=1;
                            while (mysqli_num_rows($result2)+1 > $count) {
                                // Fetch the data
                                $row2 = mysqli_fetch_assoc($result2);
                                $qID = $row2['qID'];
                                $qMain=$row2['qMain'];
                                $mOpt=explode('-|-',$row2['qOptions']);
                                $cAnswer=explode('->|',$row2['cAnswer']);
                                array_pop($cAnswer);
                                $qMarks=$row2['qMarks'];
                                $i=0;
                                $j = 0;
                                $totalC = count($cAnswer);
                                $checked = [];
                                while($j<$totalC){
                                    if ($mOpt[$i]==$cAnswer[$j]){
                                        $checked[]='checked';
                                        $j++;
                                    }
                                    else $checked[]=' ';
                                    $i++;
                                }
                                while ($i<4){
                                    $checked[]=' ';
                                    $i++;
                                }
        
                                $HTMLt = "
                                <div class='$count questionB $qID'>
                                    <div class='horz'>
                                        <label for='Q$count' style='width: max-content'>Enter Question $count :</label>
                                        <input type='text' name='EnQu' id='Q$count' value='$qMain' style='width:600px'>
                                        <label for='QM$count' style='white-space: pre'>      Question Marks:</label>
                                        <input type='text' name='QuMa' id='QM$count' value='$qMarks' class='QM'>
                                    </div>
                                    <div class='opt'>
                                        <div>
                                        <label for='O1-$count'>Enter Option 1:</label>
                                        <input type='text' name='O1' id='O1-$count' value='$mOpt[0]'>
                                        <input type='checkbox' name='correct' value='2' $checked[0]>
                                        </div>
                                        <div>
                                        <label for='O2-$count'>Enter Option 2:</label>
                                        <input type='text' name='O2' id='O2-$count' value='$mOpt[1]'>
                                        <input type='checkbox' name='correct' value='3' $checked[1]>
                                        </div>
                                        <div>
                                        <label for='O3-$count'>Enter Option 3:</label>
                                        <input type='text' name='O3' id='O3-$count' value='$mOpt[2]'>
                                        <input type='checkbox' name='correct' value='4' $checked[2]>
                                        </div>
                                        <div>
                                        <label for='O4-$count'>Enter Option 4:</label>
                                        <input type='text' name='O4' id='O4-$count' value='$mOpt[3]'>
                                        <input type='checkbox' name='correct' value='5' $checked[3]>
                                        </div>
                                    </div>
                                    <button class='removeQ'> REMOVE </button>
                                </div>
                                ";
                                echo $HTMLt;
                                $count++;
                            }
                            $countL=$count;
                        } 
                        else {
                            echo "<h3 id='NoQ'>No Questions Added Till Now</h3>";
                        }
                        $con->close();
                    ?>
                </div>
            <div id="discussions" class="tab">
                <!-- Content for Bookmarks Tab -->
            </div>
            <div id="UserInfoT" class="tab">
                <!-- Content for User Info & Statistics Tab -->
            </div>
        </div>
    </div>
    <div class="Admin" style="display:none">
        <div class="AdminCon">
            <button id="admStu" class="admUser"> Show Students</button>
            <button id="admTea" class="admUser"> Show Teachers</button>
            <button id="admCou"> Show Courses</button>
            <button id="admRep"> Reports Recieved</button>
            <div id="admArea"></div>
        </div>
    </div>
    <div id="changeTD" class="changeTD">
        <h2 style="text-align:center"></h2>
        <div><label for="changeTopic">TEST : </label><input type="text" id="changeTopic"></div>
        <div><label for="changeDesc">DESC :  </label><input type="text" id="changeDesc"></div>
        <div>    <button onclick="document.getElementById('changeTD').style.display='none'">Cancel</button>       <button id="saveTDchange">Save Changes</button></div>
    </div>
    <div class="centerFix addSTDb" id="centerFix1">
        <h3>In Course :<span id='courseSTDn'></span></h3>
        <div>
            <div><label for="changeSTDn">NO OF STUDENTS TO ADD : </label><input type="text" id="changeSTDn"><button id="addnSTD">ADD</button></div>
        </div>
        <button id='addSTDp' style="display:none"> Enroll </button>
    </div>

    <div class="centerFix" id="viewSTD"></div>

    <div class="centerFix testSTD" id="centerFix3">
        <h3>In Test <span id='testSTDn'></span>:</h3>
        <div><label for="TESTdate">Schedule Date : </label><input type="text" id="TESTdate"></div>
        <div>
            <div><label for="changeTESTn">NO OF STUDENTS TO SCHEDULE : </label><input type="text" id="changeTESTn"><button id="addnTEST">ADD</button></div>
        </div>
        <div id="addAreaTEST"></div>
        <button id='addTESTp' style="display:none"> SCHEDULE </button>
    </div>

    <div class='centerFix' id="newChat" style="display:none">
        <h3>New Conversation</h3>
        <div><label for="toID">To ID : </label><input type="text" id="toID"></div><br>
        <div><label for="chatM">Message : </label><input type="text" id="chatM"></div><br>
        <button id="newConM">Send Message</button>
    </div>

    <script>
        let parentE=0;
        let parentC=0;
        let gParentE=new Array();
        let gParentC=new Array();
        let LocE=new Array();
        let LocC=new Array();
        const user=<?php echo $_SESSION['user_id']; ?>;
        LocC.push('Home'); 
        gParentC.push('0');
        let count=0;
        let removed=[];
        document.addEventListener('click', (event) => {
            if (event.target && event.target.id === 'switchBtn') {
                document.getElementById('switch').style.display='flex';
            }
            else if (event.target.parentElement.id != 'switch'){
                document.getElementById('switch').style.display='none';
            }
        });

        let addTop = true;
        let addTes = true;

        function showAddTopic(){
            let TopB = document.getElementById('addTopicBtn');
            if (addTop){
                document.getElementById('addTopic').style.display = 'flex';
                TopB.style.color = 'white';
                TopB.style['background-color'] = 'black';
                addTop = false;
            }
            else{
                document.getElementById('addTopic').style.display = 'none';
                TopB.style.color = 'black';
                TopB.style['background-color'] = 'white';
                addTop = true;
            }
        }

        function showAddTest(){
            let TopB = document.getElementById('addTestBtn');
            if (addTes){
                document.getElementById('addTest').style.display = 'flex';
                TopB.style.color = 'white';
                TopB.style['background-color'] = 'black';
                addTes = false;
            }
            else{
                document.getElementById('addTest').style.display = 'none';
                TopB.style.color = 'black';
                TopB.style['background-color'] = 'white';
                addTes = true;
            }
        }

        document.addEventListener('click', (event) => {
            if (event.target && event.target.id === 'addTopicBtn') {
                showAddTopic();
            }
        });

        document.addEventListener('click', (event) => {
            if (event.target && event.target.id === 'addTestBtn') {
                showAddTest();
            }
        });

        function showCourses(){
            let search = <?php echo $_SESSION['user_id']; ?>;
            console.log("I was here "+search);
            let formData = new FormData();
            formData.append("userid",search);
            fetch('showCourses.php', { // Call PHP script
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Convert response to text
            .then(data => {
                document.getElementById('userCourse').innerHTML=data;
            })
            .catch(error => {
                console.error("Fetch Error:", error);
                alert("Failed to connect to the server. Please try again later.");
            });
        }

        function showSTDcourse(){
            let search = <?php echo $_SESSION['user_id']; ?>;
            let formData = new FormData();
            formData.append("userid",search);
            fetch('showSTDcourse.php', { // Call PHP script
                method: 'POST',
                body: formData
            })
            .then(response => response.text()) // Convert response to text
            .then(data => {
                document.querySelector('.courseSTD').innerHTML=data;
            })
            .catch(error => {
                console.error("Fetch Error:", error);
                alert("Failed to connect to the server. Please try again later.");
            });
        }
        
        function showTopics(real,clss){
            console.log(parentE);
            let formData = new FormData();
            formData.append("number",real);
            fetch('showTopics.php', { // Call PHP script
                method: 'POST',
                body: formData
            })
            .then(response => response.text())  
            .then(data => {
                let c=1;
                document.querySelectorAll('.testBox').forEach((role)=>{
                    if (role.classList.contains(clss)){ 
                        role.innerHTML=data;
                        if (real==0 && clss=='userCourse') showCourses();
                        if (real==0 && clss=='courseSTD') showSTDcourse(); 
                        let prevL=role.querySelector('h3')??'__.__';
                        if (real==0) role.querySelector('.backB').style.display='none';
                        if (clss=='userCourse'){
                            role.querySelector('.TopTop').innerHTML+=`<div class="cbutton">
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
                            </form>`;
                            parentC=role.querySelector('.corTop').classList[1];
                            gParentC.push(parentC);
                            if (prevL!='__.__') LocC.push(role.querySelector('h3').innerText);
                            console.log(LocC);
                            let str1 = new String();
                            for (let i = 0; i < LocC.length-1; i++) {
                                str1+=LocC[i];
                                str1+='->';
                            }
                            str1+=LocC[LocC.length-1];
                            role.querySelector('h3').innerText=str1;
                        }
                        else if (real==0 && clss=='courseSTD'){

                        }
                        else{
                            if (c==1){
                            parentE=role.querySelector('.corTop').classList[1];
                            gParentE.push(parentE);
                            if (real==0) LocE=[];
                            if (prevL!='__.__') LocE.push(role.querySelector('h3').innerText);
                            console.log(LocE);
                            c++;
                            }
                            let str = new String();
                            for (let i = 0; i < LocE.length-1; i++) {
                                str+=LocE[i];
                                str+='->';
                            }
                            str+=LocE[LocE.length-1];
                            role.querySelector('h3').innerText=str;
                            document.querySelectorAll('.Private').forEach(element => {
                                element.style.display = 'none';
                            });
                            let joinedCourses = <?php echo json_encode($joinedCourses); ?>;
                            if (joinedCourses.length > 0) {
                                joinedCourses.forEach(courseJC => {
                                    let element = document.getElementById(courseJC);
                                    if (element) {
                                        element.parentElement.parentElement.style.display = 'none';
                                    }
                                });
                            }
                        }

                        fetch('showTests.php', { // Call PHP script
                            method: 'POST',
                            body: formData
                        }).then(response => response.text())  
                        .then(data2 =>{
                            if (data2!='--.--'){
                                role.querySelectorAll('.NoF').forEach((hm)=>hm.style.display='none');
                                role.innerHTML+=data2;
                            }
                        }).catch(error => console.error("Fetch Error:", error)); 
                    }
                })
            })
            .catch(error => {
                console.error("Fetch Error:", error);
                alert("Failed to connect to the server. Please try again later.");
            });        
        }
        
        document.addEventListener('click', (event) => {
            if (event.target && event.target.id === 'submitTopic') {
                console.log("Submit Clicked");
                let noTopic = event.target.parentElement.parentElement.parentElement.parentElement.querySelector('h1')??'__.__';
                if (noTopic!='__.__') noTopic.style.display='none';
                let inputs = document.querySelectorAll('#addTopic input');
                let formData = new FormData();
                let typeST=0;
                formData.append("topic", inputs[0].value);
                formData.append("desc", inputs[1].value);
                if (inputs.length>2){
                    let selectedO=(inputs[2].checked)?inputs[2]:inputs[3];
                    typeST=10+selectedO.value;
                }
                formData.append("type", typeST);
                formData.append("parent", parentC);
                formData.append("ub", "<?php echo $_SESSION['user_id']; ?>"); // Ensuring PHP outputs a string

                fetch('addTopic.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data =>document.getElementById('userCourse').innerHTML+=data)
                .catch(error => console.error("Error:", error));
                showAddTopic();
            }
        });

        document.addEventListener('click', (event) => {
            if (event.target && event.target.id === 'submitTest') {
                console.log("Submit Clicked");
                let noTopic = event.target.parentElement.parentElement.parentElement.parentElement.querySelector('h1')??'__.__';
                if (noTopic!='__.__') noTopic.style.display='none';
                const name = document.getElementById('TN1').value;
                const TestOptions = document.getElementById('TestOptions').value;
                const Des1 = document.getElementById('Des1').value;
                const TimeL = document.getElementById('TimeL').value;
                let formData = new FormData();
                formData.append("test_name",name);
                formData.append("test_type",TestOptions);
                formData.append("test_desc",Des1);
                formData.append("time_limit", TimeL);
                formData.append("ub","<?php echo $_SESSION['user_id']; ?>");
                formData.append("parent_id",parentC);
                fetch('addTest.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data =>document.getElementById('userCourse').innerHTML+=data)
                .catch(error => console.error("Error:", error));
                showAddTest();
            }
        });

        let modS=0;
        let searchId='search';
        
        function searchinG(mod){
            if (mod==0){
                searchId='search';
                let search=document.getElementById('search').value.toLowerCase();
                document.getElementById('ExploreTab').querySelectorAll('.testmetrics').forEach((box)=>{
                    if (box.style.display!='none') box.classList.add('original');
                    else if (box.classList[1]=='original' || box.classList[2]=='original') box.style.display='block';
                    let titleR=box.querySelector('h2').innerText.split(' ');
                    let toBlock=true;
                    titleR.forEach((word)=>{
                        if (word.toLowerCase().startsWith(search)) toBlock=false;
                    });
                    if (toBlock) box.style.display='none';
                });
            }
            else if (mod==1){
                searchId='searchCourseSTD';
                let search=document.getElementById('searchCourseSTD').value.toLowerCase();
                document.getElementById('courseSTD').querySelectorAll('.testmetrics').forEach((box)=>{
                    if (box.style.display!='none') box.classList.add('original');
                    else if (box.classList[1]=='original' || box.classList[2]=='original') box.style.display='block';
                    let titleR=box.querySelector('h2').innerText.split(' ');
                    let toBlock=true;
                    titleR.forEach((word)=>{
                        if (word.toLowerCase().startsWith(search)) toBlock=false;
                    });
                    if (toBlock) box.style.display='none';
                });
            }
            else if (mod==10){
                searchId='searchT1';
                let search=document.getElementById('searchT1').value.toLowerCase();
                document.getElementById('ExploreTabT').querySelectorAll('.testmetrics').forEach((box)=>{
                    if (box.style.display!='none') box.classList.add('original');
                    else if (box.classList[1]=='original' || box.classList[2]=='original') box.style.display='block';
                    let titleR=box.querySelector('h2').innerText.split(' ');
                    let toBlock=true;
                    titleR.forEach((word)=>{
                        if (word.toLowerCase().startsWith(search)) toBlock=false;
                    });
                    if (toBlock) box.style.display='none';
                });
            }
            else if (mod==11){
                searchId='searchT2';
                let search=document.getElementById('searchT2').value.toLowerCase();
                document.getElementById('userCourse').querySelectorAll('.testmetrics').forEach((box)=>{
                    if (box.style.display!='none') box.classList.add('original');
                    else if (box.classList[1]=='original' || box.classList[2]=='original') box.style.display='block';
                    let titleR=box.querySelector('h2').innerText.split(' ');
                    let toBlock=true;
                    titleR.forEach((word)=>{
                        if (word.toLowerCase().startsWith(search)) toBlock=false;
                    });
                    if (toBlock) box.style.display='none';
                });
            }
            else if (mod==12){
                searchId='searchTest3';
                let search=document.getElementById('searchTest3').value.toLowerCase();
                document.getElementById('exams').querySelectorAll('.testmetrics').forEach((box)=>{
                    if (box.style.display!='none') box.classList.add('original');
                    else if (box.classList[1]=='original' || box.classList[2]=='original') box.style.display='block';
                    let titleR=box.querySelector('h2').innerText.split(' ');
                    let toBlock=true;
                    titleR.forEach((word)=>{
                        if (word.toLowerCase().startsWith(search)) toBlock=false;
                    });
                    if (toBlock) box.style.display='none';
                });
            }
        }

        let searchinggg=setInterval(searchinG,1000,modS);

        function selectTab(tabId, element) {
            clearInterval(searchinggg);
            // Hide all tabs
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => tab.style.display = 'none');

            // Show the selected tab
            document.getElementById(tabId).style.display = 'block';

            // Remove active class from all sidebar items
            const sidebarItems = document.querySelectorAll('.sidebar h2');
            sidebarItems.forEach(item => item.classList.remove('active'));

            // Add active class to the clicked item
            element.classList.add('active');

            if (tabId=='course'){
                showCourses();
                modS=11;
            }
            else if (tabId=='ExploreTab'){
                showTopics(0,'exp');
                modS=0;
            }
            else if (tabId=='ExploreTabT'){
                showTopics(0,'exp');
                modS=10;
            }
            else if (tabId=='exams') modS=12;
            else if (tabId=='questionBank'){
                let QWER = document.querySelectorAll('.questionB'); 
                if (QWER.length!=0) count = QWER[QWER.length - 1].classList[0];
                let countAt=count; 
                count++;
            }
            else if (tabId=='courseSTD'){
                showSTDcourse();
                modS=1;
            }
            else if (tabId=='discussions' || tabId=='UserInfoT'){
                selectRole('Student',document.getElementById('switch').querySelectorAll('button')[0]);
            }
            searchinggg=setInterval(searchinG,1000,modS);
        }
        function selectRole(Role, element) {
            document.querySelector('.navbar').querySelector('span').innerText=Role;
            // Hide all roles
            const roles = document.querySelectorAll('.activerole');
            roles.forEach(el => {
                el.style.display = 'none';
                console.log(el);
                el.classList.remove('activerole');
            });
            // Show the selected role elements
            const toShow = document.querySelectorAll('.' + Role);
            toShow.forEach(el => {
                el.style.display = 'block';
                el.classList.add('activerole');
            });

            // Update button selection
            document.querySelectorAll('#switch button').forEach(item => item.classList.remove('selected'));
            element.classList.add('selected');

            if (Role=='Student'){
                selectTab('ExploreTab',document.querySelector('.sidebar').querySelector('h2'));
            }
            else if (Role=='Teacher'){
                selectTab('ExploreTabT',document.querySelectorAll('.sidebar')[1].querySelector('h2'));
            }
        }
        let state=<?php echo $_SESSION['state'];?>;
        if (state==0){
            selectRole('Student',document.getElementById('switch').querySelectorAll('button')[0]);
            selectTab('ExploreTab',document.getElementById('stbar').querySelectorAll('h2')[0]);
        }
        if (state==1){
            selectRole('Teacher',document.getElementById('switch').querySelectorAll('button')[1]);
            selectTab('exams',document.getElementById('techbar').querySelectorAll('h2')[2]);
        }

        document.addEventListener('click', (eve) => {
            if (eve.target.classList.contains('moveToTopic')) {
                if (eve.target.closest('#userCourse')!== null){
                    showTopics(eve.target.id,'userCourse');
                }
                else if (eve.target.closest('#courseSTD')!== null){
                    showTopics(eve.target.id,'courseSTD');
                }
                else{
                    showTopics(eve.target.id,'exp');
                }
                document.getElementById(searchId).value='';
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList.contains('backB')) {
                console.log("back");
                console.log(gParentC);
                if (eve.target.closest('#userCourse')!== null){
                    gParentC.pop();
                    parentC=gParentC.pop();
                    LocC.pop();
                    LocC.pop();
                    showTopics(parentC,'userCourse');
                    console.log(gParentC);
                }
                else{
                    gParentE.pop();
                    parentE=gParentE.pop();
                    LocE.pop();
                    LocE.pop();
                    showTopics(parentE,eve.target.parentElement.parentElement.classList[1]);
                }
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList[1]=='addQTest'){
                let myVariable = eve.target.classList[0];
                let form = document.createElement("form");
                form.method = "POST";
                form.action = "addQTest.php";
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "data";
                input.value = myVariable;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList[1]=='startTest'){
                let myVariable = eve.target.classList[0];
                let form = document.createElement("form");
                form.method = "POST";
                form.action = "startTest.php";
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "data";
                input.value = myVariable;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList[1]=='SeeRes'){
                let myVariable = eve.target.classList[0];
                let form = document.createElement("form");
                form.method = "POST";
                form.action = "techSeeResult.php";
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = "data";
                input.value = myVariable;
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList.contains('CTD')){
                let changeTD=document.getElementById('changeTD');
                changeTD.style.display='flex';
                let TID=eve.target.classList[0];
                let Tname=eve.target.parentElement.parentElement.querySelector('h2').innerText;
                changeTD.querySelector('h2').innerText=Tname;
                changeTD.classList.add(TID);
                changeTD.querySelectorAll('input')[0].value=Tname;
                changeTD.querySelectorAll('input')[1].value=eve.target.parentElement.querySelector('p').innerText;
            }
            else if (!eve.target.closest('.changeTD')) document.getElementById('changeTD').style.display='none';
        });
        let onTestID;
        let onTestNm;
        let nTc=0;
        let nT;
        document.addEventListener('click', (eve) => {
            if (eve.target.classList[1]=='scheduleTest'){
                let testing = document.querySelectorAll('.centerFix')[2];
                testing.style.display = 'block';
                onTestID=eve.target.classList[0];
                onTestNm=event.target.parentElement.parentElement.querySelector('h2').innerText;
                document.getElementById('testSTDn').innerHTML=onTestNm;
            }
            else if (!event.target.closest('.testSTD')) document.getElementById('centerFix3').style.display='none';
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='addnTEST'){
                let addAreaTEST=document.getElementById('addAreaTEST');
                nTc=addAreaTEST.querySelectorAll('div').length;
                nT=event.target.parentElement.querySelector('input').value;
                for(let i=0;i<nT;i++){
                    nTc++;
                    addAreaTEST.innerHTML+="<div><label for='changeT"+nTc+"'>Enter Student No "+nTc+" User ID : </label><input type='text' id='changeT"+nTc+"' class='STDtADD'></div>";
                }
                document.getElementById('addTESTp').style.display='block';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='addTESTp'){
                let STDData = new FormData();
                STDData.append('testID',onTestID);
                STDData.append('scheduleD',event.target.parentElement.querySelector('input').value);
                addAreaTEST.querySelectorAll('input').forEach((ele) => {
                    STDData.append(`STD[]`, ele.value);  
                });
                fetch('addSTDtT.php', { 
                    method: 'POST',
                    body: STDData
                })
                .then((response)=>console.log(response.text()))
                .catch(error => console.error("Error:", error));
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.id=='saveTDchange'){
                let changeTD=document.getElementById('changeTD');
                let formData = new FormData();
                let Tname=changeTD.querySelectorAll('input')[0].value;
                let Descr=changeTD.querySelectorAll('input')[1].value;
                formData.append("test_id",changeTD.classList[1]);
                formData.append("test_name",Tname);
                formData.append("test_desc",Descr);
                let tarTest = document.getElementById('TM'+changeTD.classList[1]);
                tarTest.querySelector('h2').innerText=Tname;
                tarTest.querySelectorAll('p')[1].innerText=Descr;
                fetch('CTD.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => alert("Saved Changes Succesfully"))
                .catch(error => console.error("Error:", error));
                changeTD.style.display='none';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='AQ'){
                console.log('Clicked');
                let testArea=document.getElementById('testArea');
                let newDiv = document.createElement('div');
                newDiv.classList.add(count, 'questionB');
                newDiv.innerHTML+=`
                <div class='horz'>
                    <label for="Q`+count+`" style="width: max-content">Enter Question `+count+`:</label>
                    <input type="text" name="EnQu" id="Q`+count+`" style="width:600px">
                    <label for="QM`+count+`" style="white-space: pre">      Question Marks:</label>
                    <input type="text" name="QuMa" id="QM`+count+`" class="QM">
                </div>
                <div class="opt">
                    <div>
                    <label for="O1-`+count+`">Enter Option 1:</label>
                    <input type="text" name="O1" id="O1-`+count+`">
                    <input type="checkbox" name="correct" value="2">
                    </div>
                    <div>
                    <label for="O2-`+count+`">Enter Option 2:</label>
                    <input type="text" name="O2" id="O2-`+count+`">
                    <input type="checkbox" name="correct" value="3">
                    </div>
                    <div>
                    <label for="O3-`+count+`">Enter Option 3:</label>
                    <input type="text" name="O3" id="O3-`+count+`">
                    <input type="checkbox" name="correct" value="4">
                    </div>
                    <div>
                    <label for="O4-`+count+`">Enter Option 4:</label>
                    <input type="text" name="O4" id="O4-`+count+`">
                    <input type="checkbox" name="correct" value="5">
                    </div>
                </div>
                <button class='removeQ'> REMOVE </button>
            `;
            testArea.appendChild(newDiv);
            count++;
            }
        });

        function SaveChanges(){
            let testData = new FormData();
            removed.forEach((value, index) => {
                testData.append(`toRem[]`, value);  
            });
            fetch('updateTest.php', { 
                method: 'POST',
                body: testData
            })
            .then((response)=>console.log(response.text()))
            .catch(error => console.error("Error:", error));
            testArea.querySelectorAll('.questionB').forEach((e)=>{
                console.log(e);
                if (e.classList.length==2){
                    console.log('Adding');
                    let ans=e.querySelectorAll('input[type="text"]');
                    let formData = new FormData();
                    formData.append("qMain", ans[0].value);
                    formData.append("qMarks", ans[1].value);
                    formData.append("qOptions", ans[2].value+'-|-'+ans[3].value+'-|-'+ans[4].value+'-|-'+ans[5].value);
                    let str = new String();
                    e.querySelectorAll('input[name="correct"]:checked').forEach((checked)=>{
                        str+=ans[checked.value].value+'->|';
                    });
                    formData.append('cAnswer',str);
                    formData.append('testID','0');
                    fetch('addQuestion.php', { 
                        method: 'POST',
                        body: formData
                    })
                    .then((response)=>response.text())
                    .then(data=>{
                        e.classList.add(data);
                    })
                    .catch(error => console.error("Error:", error)); 
                }
                else if (e.classList.length==3){
                    console.log('Editing');
                    let ans=e.querySelectorAll('input[type="text"]');
                    let formData = new FormData();
                    formData.append("qMain", ans[0].value);
                    formData.append("qMarks", ans[1].value);
                    formData.append("qOptions", ans[2].value+'-|-'+ans[3].value+'-|-'+ans[4].value+'-|-'+ans[5].value);
                    let str = new String();
                    e.querySelectorAll('input[name="correct"]:checked').forEach((checked)=>{
                        str+=ans[checked.value].value+'->|';
                    });
                    formData.append('cAnswer',str);
                    formData.append('testID','0');
                    formData.append('qID',e.classList[2]);
                    fetch('editQuestion.php', { 
                        method: 'POST',
                        body: formData
                    })
                    .then((response)=>console.log(response.text()))
                    .catch(error => console.error("Error:", error));
                }
            });
        }

        document.addEventListener('click',(event)=>{
            if (event.target.id=='SC'){
                SaveChanges();
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='removeQ'){
                const toRemove=event.target.parentElement;
                if (toRemove.classList.length==3) removed.push(toRemove.classList[2]);
                toRemove.style.display='none';
                toRemove.classList.remove('questionB');
            }
        });

        let addArea=document.querySelector('.centerFix').querySelector('div');
        let onCourseID;
        let onCourseNm;
        let nSTDc=0;
        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='addSTD'){
                document.querySelectorAll('.centerFix')[0].style.display='block';
                onCourseID=event.target.parentElement.parentElement.querySelector('.moveToTopic').id;
                onCourseNm=event.target.parentElement.querySelector('h2').innerText;
                document.getElementById('courseSTDn').innerHTML=onCourseNm;
            }
            else if (!event.target.closest('.addSTDb')) document.getElementById('centerFix1').style.display='none';
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='addnSTD'){
                nSTDc=addArea.querySelectorAll('div').length-1;
                let nSTD=addArea.querySelector('input').value;
                for(let i=0;i<nSTD;i++){
                    nSTDc++;
                    addArea.innerHTML+="<div><label for='changeSTD"+nSTDc+"'>Enter Student No "+nSTDc+" User ID : </label><input type='text' id='changeSTD"+nSTDc+"' class='STDtADD'></div>";
                }
                document.getElementById('addSTDp').style.display='block';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='addSTDp'){
                let STDData = new FormData();
                STDData.append('topicID',onCourseID);
                addArea.querySelectorAll('.STDtADD').forEach((ele) => {
                    STDData.append(`STD[]`, ele.value);  
                });
                fetch('addSTDtC.php', { 
                    method: 'POST',
                    body: STDData
                })
                .then((response)=>alert('Students Added Successfully'))
                .catch(error => console.error("Error:", error));
                document.getElementById('centerFix1').style.display='none';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='showSTD'){
                let STDData = new FormData();
                let toShowID = event.target.parentElement.parentElement.querySelector('.moveToTopic').id;
                STDData.append('topicID',toShowID);
                fetch('showSTD.php', { 
                    method: 'POST',
                    body: STDData
                })
                .then(response => response.text())  
                .then(data => {
                    document.getElementById('viewSTD').innerHTML = data;  
                })
                .catch(error => console.error("Error:", error));
                document.getElementById('viewSTD').style.display='block';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='viewSTDb'){
                document.getElementById('viewSTD').style.display='none';
            }
        });

        document.addEventListener('click', (eve) => {
            if (eve.target.classList.contains('joinCourse')) {
                let topicData = new FormData();
                topicData.append('topicID',eve.target.parentElement.querySelector('button').id);
                topicData.append(`STD[]`, user);  
                fetch('addSTDtC.php', { 
                    method: 'POST',
                    body: topicData
                })
                .then((response)=>console.log(response.text()))
                .catch(error => console.error("Error:", error));
                location.reload();
            }
        });

        let chatId='0';

        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='chatUser'){
                console.log("clicked");
                if (event.target.classList[1]=='chatNew'){
                    console.log('newChat');
                    document.getElementById('newChat').style.display='block';
                }
                else{
                    let chatArea=document.getElementById('chatRight');
                    if (chatId!='0') document.querySelector('.chat'+chatId).classList.remove('activeChat');
                    event.target.classList.add('activeChat');
                    chatId=event.target.classList[1].substring(4);
                    let formData = new FormData();
                    formData.append('target',chatId);
                    formData.append('userID',user);
                    console.log('Promise Sent');
                    fetch('chatUser.php', { 
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())  
                    .then(data => {
                        console.log('Recieved!');
                        chatArea.innerHTML = data;  
                    })
                    .catch(error => console.error("Error:", error));
                }
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='sendMb'){
                let chatArea=document.getElementById('chatRight').lastElementChild;
                let formData = new FormData();
                formData.append('target',chatId);
                formData.append('userID',user);
                formData.append('message',event.target.parentElement.querySelector('input').value);
                formData.append('newCon','0');
                console.log('Promise Sent');
                fetch('sendMessage.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())  
                .then(data => {
                    chatArea.outerHTML = data+"<div><input type='text' id='sendMi'><button id='sendMb'>Send Message</button></div>";  
                })
                .catch(error => console.error("Error:", error));
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='newConM'){
                if (chatId!='0') document.querySelector('.chat'+chatId).classList.remove('activeChat');
                let inputs=event.target.parentElement.querySelectorAll('input');
                let formData = new FormData();
                formData.append('target',inputs[0].value);
                formData.append('userID',user);
                formData.append('message',inputs[1].value);
                formData.append('newCon','1');
                console.log('Promise Sent');
                fetch('sendMessage.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())  
                .then(data => {
                    if (data=='<>') alert('Invalid User Id');
                    else{
                        chatId=inputs[0].value;
                        let chatParts = data.split('-|-|-');
                        document.getElementById('chatRight').innerHTML = chatParts[1]+"<div><input type='text' id='sendMi'><button id='sendMb'>Send Message</button></div>";
                        let buttons = document.querySelector('.chatLeft').querySelectorAll("button");
                        buttons[buttons.length - 1].outerHTML=chatParts[0]+"<button class='chatUser chatNew'><h1>Start New Conv</h1></button>";
                    }
                })
                .catch(error => console.error("Error:", error));
                document.getElementById('newChat').style.display='none';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='editUser'){
                document.querySelector('.card').style.display='none';
                document.querySelector('.form-container').style.display='block';
            }
        });

        function updateUserInfo(){
            let updateArea=document.querySelector('.card');
            let formData = new FormData();
            formData.append('userID', user);  
            fetch('updateInfo.php', { 
                method: 'POST',
                body: formData
            })
            .then((response)=>response.text())
            .then((data)=>{
                if (data!='<>'){
                    let values = data.split('-|-|-');
                    document.getElementById('Fname').innerText=values[0];
                    document.getElementById('uAge').innerText=values[1];
                    document.getElementById('uCourse').innerText=values[2];
                    document.getElementById('gender').innerText=values[3];
                    document.getElementById('contact').innerText=values[4];
                }
            })
            .catch(error => console.error("Error:", error));
        }

        updateUserInfo();

        document.addEventListener('click',(event)=>{
            if (event.target.id=='submitEditUser'){
                let inputs=document.getElementById('studentForm').querySelectorAll('input');
                let formData = new FormData();
                formData.append('userID',user);
                formData.append('fName',inputs[0].value);
                formData.append('age',inputs[1].value);
                formData.append('courseNm',inputs[3].value);
                formData.append('gender',document.querySelector('input[name="gender"]:checked').value);
                formData.append('contactDet',document.getElementById('contactDet').value);
                fetch('updateDB.php', { 
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())  
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.error("Error:", error));
                updateUserInfo();
            }
        });
        
        const admArea=document.getElementById('admArea');
        
        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='admUser'){
                let formData = new FormData();
                if (event.target.id=='admStu') formData.append('type','0');
                else formData.append('type','1');
                fetch('adminUser.php', { 
                    method: 'POST',
                    body: formData
                }) // Replace with your PHP file path
                .then(response => response.text())
                .then(data => {
                    admArea.innerHTML=data;
                })
                .catch(error => console.error("Error fetching data:", error));
            }
            else if (event.target.id=='admCou'){
                fetch('adminCourses.php') // Replace with your PHP file path
                .then(response => response.text())
                .then(data => {
                    admArea.innerHTML=data;
                })
                .catch(error => console.error("Error fetching data:", error));
            }
            else if (event.target.id=='admRep'){
                admArea.innerHTML="<h2> No Reports Recieved </h2>";
            }
        });

        init=0;
    </script>
    
</body></html>