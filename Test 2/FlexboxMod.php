<!DOCTYPE html>
<?php
    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
    $userid = $_SESSION['user_id'];
    $state = $_SESSION['state'];
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
                <span id="welUser"><?php echo $name; ?></span>
                </h2>
            </div>


            <div class="sidebar Student activerole" id="stbar">
                <h2 class="active" onclick="selectTab('ExploreTab', this)">EXPLORE</h2>
                <h2 onclick="selectTab('UpcomingTests', this)">UPCOMING TESTS</h2>
                <h2 onclick="selectTab('Results', this)">RESULTS</h2>
                <h2 onclick="selectTab('Discussions', this)">DISCUSSIONS</h2>
                <h2 onclick="selectTab('Downloads', this)">DOWNLOADS/BOOKMARK</h2>
                <h2 onclick="selectTab('UserInfo', this)">USER INFO &amp; STATISTICS</h2>
            </div>
            <div class="sidebar Teacher" id="techbar">
                <h2 class="active" onclick="selectTab('ExploreTabT', this)">EXPLORE</h2>
                <h2 onclick="selectTab('course', this)">YOUR COURSES</h2>
                <h2 onclick="selectTab('exams', this)">MANAGE EXAMS</h2>
                <h2 onclick="selectTab('discussions', this)">DISCUSSIONS</h2>
                <h2 onclick="selectTab('DownloadsT', this)">DOWNLOADS/BOOKMARK</h2>
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
                <!-- Content for Upcoming Tests Tab -->
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
                <!-- Content for Discussions Tab -->
            </div>
            <div id="Downloads" class="tab">
                <!-- Content for Downloads Tab -->
            </div>
            <div id="UserInfo" class="tab">
                <!-- Content for User Info & Statistics Tab -->
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
                        <button class='backB'>Back</button>
                        <h3 class='loc'>Home</h3>
                    </div>
                </div>
            </div>
            <div id="exams" class="tab">
                <div class="explore">
                    <h1>
                    <label for="searchT3">Manage Exams</label>
                    <input type="text" id="searchT3" class="search" name="toSearch" placeholder="Search For Exam" size="50px">
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
                                                <button class='$id CTestType'> Change Test Type </button><br>
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
            <div id="discussions" class="tab">
                <!-- Content for Bookmarks Tab -->hmmmmm
            </div>
            <div id="DownloadsT" class="tab">
                <!-- Content for Downloads Tab -->
            </div>
            <div id="UserInfoT" class="tab">
                <!-- Content for User Info & Statistics Tab -->
            </div>
        </div>
    </div>
    <div id="changeTD" class="changeTD">
        <h2 style="text-align:center"></h2>
        <div><label for="changeTopic">TEST : </label><input type="text" id="changeTopic"></div>
        <div><label for="changeDesc">DESC :  </label><input type="text" id="changeDesc"></div>
        <div>    <button onclick="document.getElementById('changeTD').style.display='none'">Cancel</button>       <button id="saveTDchange">Save Changes</button></div>
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
        document.getElementById('switchBtn').addEventListener('click',()=>document.getElementById('switch').style.display='flex');
        
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
                
                formData.append("topic", inputs[0].value);
                formData.append("desc", inputs[1].value);
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

        function selectTab(tabId, element) {
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

            if (tabId=='course') showCourses();
            else if (tabId=='ExploreTab' || tabId=='ExploreTabT') showTopics(0,'exp');
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

            if (Role=='Student') selectTab('ExploreTab',document.querySelector('.sidebar').querySelector('h2'));
            else selectTab('ExploreTabT',document.querySelectorAll('.sidebar')[1].querySelector('h2'));
        }

        let state=<?php echo $state;?>;
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
                else{
                    showTopics(eve.target.id,'exp');
                }
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
                    showTopics(parentE,'exp');
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

        init=0;
    </script>
    
</body></html>