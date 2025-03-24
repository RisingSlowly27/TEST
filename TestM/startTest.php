<!DOCTYPE html>
<?php
    session_start();
    $userID = $_SESSION['user_id'];
    $_SESSION['state']=1;
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
?>
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('fonts/gilroy-light.otf') format('opentype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Gilroy';
            src: url('fonts/gilroy-extrabold.otf') format('opentype');
            font-weight: 800;
            font-style: normal;
        }

        body{
            background-color: #121516;
            text-align: center;
            margin: 0;
            padding: 0;
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            background-color: #ace894;
            /* background-color:#647AA3; */
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            height: 230px;
        }

        #instituteLogo {
            padding: 15px 15px 15px;
            max-width: 200px;
        }

        div.username {
            width: 100%;
            margin: 0;
            padding: 0;
            text-align: right;
            padding-right: 100px;
            top: 60%;
            transform: translateY(-50%);
            right: 0;
            height: 100%;
            line-height: 100px;
            margin-top: 30px;
        }

        div.username h2 {
            margin: 0;
            margin-top: 150px;
            font-family: "Poppins", sans-serif;
            font-weight: 900 bold;
            font-style: normal;
            font-size: 50px;
            color: #4a7856;
            /* color: #B5E2FA; */
            padding: top: 100px
        }

        #instituteLogo img {
            max-width: 300px;
            height: auto;
        }

        .QBox{
            background-color: #121516;
            height: auto;
            width: 1500px;
            margin: 30px;
        }

        .question{
            text-align: left;
            margin:25px;
            margin-left: 350px;
            font-size: 25px;
            border: 2px solid #333;
            border-left: 3px solid white;
            background-color: #121516;
            padding:10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        #testname {
            margin-top: 100px;
            font-family: "Poppins", sans-serif;
            font-weight: 900 bold;
            font-style: normal;
            font-size: 50px;
            color:#647AA3;
            padding-top: 100px;
            position: relative;
            top: 50px;
            text-align: center;
        }

        #subHead {
            padding-top: 50px;
            white-space:pre;        
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            color: #b5e2fa;
        }

        #elapsedTime::before {
            content: "⏱️ ";
            margin-right: 5px;
        }

        #timeLimit::before {
            content: "⏳ ";
            margin-right: 5px;
        }

        #elapsedTime, #timeLimit, #total, #pass {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: white;
            /* padding: 5px 10px; */
            border-radius: 4px;
            display: inline-block;
        }

       .horz {
            display: flex;
            justify-content: space-between;
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: white;
       }

       .opt {
            display: flex;
            flex-direction: column;
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: white;
            margin: 10px 0;
            padding: 8px 12px;
            border-radius: 4px;
       }

       button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            align-items: center;
            text-align: center;
       }

       #submit {
            background-color: #647AA3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            width: 200px;
            height: 50px;
            /* font-size: 20px; */
            transition: background-color 0.3s ease;
            margin: 0;
            cursor: pointer;
            margin-left: 350px;
            font-family: 'Gilroy', sans-serif;
            font-weight: 300;
            /* font-family: "Noto Serif", serif;serif;
            font-optical-sizing: auto;
            font-weight: bold;
            font-style: normal; */
            font-size: 30px;
       }

       #submit:hover {
            background-color: #B5E2FA;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
       }

       label {
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 900 bold;
            font-style: normal;
            cursor: pointer;
        }

       input[type="checkbox"] {
            width: 15px;
            height: 15px;
            accent-color: #b5e2fa;
            cursor: pointer;
        }

    </style>
</head>
<body>
        <div class="header-container">
            <div id="instituteLogo">
                <img src="./LOGO-Stamp.png" alt="Online Examination Logo" />
            </div>
            <div class="username">
                    <h2> 
                    <span id="name"><?php echo $name; ?></span>
                    </h2>
            </div>
        </div>
    <div>
    <h2 id="testname">

    <?php
        $testID =$_POST['data'];
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "testsdata";

        // Connect to the database
        $con = mysqli_connect($server, $username, $password, $database);

        if (!$con) {
            die("Connection to the database failed: " . mysqli_connect_error());
        }

        $sql1 = "SELECT * FROM `tests` WHERE `test_id` = '$testID'";
        $result1 = mysqli_query($con, $sql1);
        $sqlmid = "SELECT * FROM `qbank` WHERE `testID` = '$testID'";
        $resultmid = mysqli_query($con, $sqlmid);
        $row1 = mysqli_fetch_assoc($result1);
        $name=$row1['test_name'];
        $TL=$row1['time_limit'];
        $PM=$row1['passMarks'];
        echo $name;
    ?>

    </h2>
    </div>
    <div id="subHead">
                Elapsed Time : <span id="elapsedTime">00:00:00</span>                Remaining Time : <span id="timeLimit"><?php echo $TL;?></span>                Total Marks : <span id="total"></span>                Pass Marks : <?php echo $PM;?>
    </div>
    <div class="QBox">
        <div id="testArea">
            <?php
                if (mysqli_num_rows($resultmid)>0){
                    $count=1;
                    $cAnswerL=[];
                    $qMarksL=[];
                    while (mysqli_num_rows($resultmid)+1 > $count) {
                        // Fetch the data
                        $rowmid = mysqli_fetch_assoc($resultmid);
                        $qID = $rowmid['qID'];
                        $sql2 = "SELECT * FROM `questions` WHERE `qID` = '$qID'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $qMain=$row2['qMain'];
                        $mOpt=explode('-|-',$row2['qOptions']);
                        $cAnswer=explode('->|',$row2['cAnswer']);
                        array_pop($cAnswer);
                        $cAnswerL[]=$cAnswer;
                        $qMarks=$row2['qMarks'];
                        $qMarksL[]=$qMarks;
                        $HTMLt = "
                        <div class='$count question $qID'>
                            <div class='horz'>
                                <h4> $count) $qMain</h4>
                                <span>Question Marks: <span class='marks'>$qMarks</span></span>
                            </div>
                            <div class='opt'>
                                <div>
                                <input type='checkbox' name='correct' value='$mOpt[0]' id='O1-$count'>
                                <label for='O1-$count'>$mOpt[0]</label>
                                </div>
                                <div>
                                <input type='checkbox' name='correct' value='$mOpt[1]' id='O2-$count'>
                                <label for='O2-$count'>$mOpt[1]</label>
                                </div>
                                <div>
                                <input type='checkbox' name='correct' value='$mOpt[2]' id='O3-$count'>
                                <label for='O3-$count'>$mOpt[2]</label>
                                </div>
                                <div>
                                <input type='checkbox' name='correct' value='$mOpt[3]' id='O4-$count'>
                                <label for='O4-$count'>$mOpt[3]</label>
                                </div>
                            </div>
                        </div>
                        ";
                        echo $HTMLt;
                        $count++;
                    }
                } 
                else {
                    echo "<h3 id='NoQ'>No Questions Added Till Now</h3>";
                }
            ?>
        </div>
        <div class="button-container">
            <button id="submit"> Submit </button>
        </div>
    </div>

    <script>

        const userID=<?php echo $_SESSION['user_id']; ?>;
        const testID=<?php echo $testID; ?>;
        document.getElementById("submitT").addEventListener("click", function() {
            console.log("Submit button clicked");

            let curMarks = 0;
            let uAns = "";
            let questionElements = document.querySelectorAll(".question");

            questionElements.forEach((q, index) => {
                let isCorrect = true;
                let selectedAnswers = [];

                q.querySelectorAll('input[name="correct"]:checked').forEach((checked) => {
                    selectedAnswers.push(checked.value);
                });

                // Get the correct answer array from PHP
                let correctAnswers = <?php echo json_encode($cAnswerL); ?>;
                let correctForThisQuestion = correctAnswers[index] || [];

                // Check if selected answers match exactly with correct answers
                if (selectedAnswers.toString() !== correctForThisQuestion.toString()) {
                    isCorrect = false;
                }

                uAns += selectedAnswers.join("&|&") + "->|";

                // Update marks if correct
                if (isCorrect) {
                    let marksList = <?php echo json_encode($qMarksL); ?>;
                    curMarks += parseInt(marksList[index]) || 0;
                }
            });
            const uTimeT=document.getElementById('elapsedTime').innerText;
            const rMain = (curMarks>=<?php echo json_encode($PM); ?>) ? 1 : 0;
            let formData = new FormData();
            formData.append("testID", testID);
            formData.append("userID", userID);
            formData.append("uAns", uAns);
            formData.append("uMarks", curMarks);
            formData.append("uTimeT", uTimeT);
            formData.append("rMain", rMain);
            fetch('sendResult.php', { 
                method: 'POST',
                body: formData
            })
            .then((response)=>console.log(response.text()))
            .catch(error => console.error("Error:", error));
            window.location.href='FlexboxMod.php';
        });
    
        function changeTotal(){
            let QMarks=document.querySelectorAll('.marks');
            let total=0;
            if (QMarks.length!=0){
                QMarks.forEach((q)=>{
                    let val=parseInt(q.innerText);
                    total+=val;
                });
            }
            document.getElementById('total').innerText=total;
        }

        setInterval(changeTotal,500);

        function startTimer() {
            let timeLimitElement = document.getElementById('timeLimit');
            let elapsedTimeElement = document.getElementById('elapsedTime');

            let timeParts = timeLimitElement.innerText.split(":"); 
            let totalTime = parseInt(timeParts[0]) * 3600 + parseInt(timeParts[1]) * 60 + parseInt(timeParts[2]); // Convert to seconds
            let timeLeft = totalTime;
            let elapsedTime = 0;

            function updateTimer() {
                if (timeLeft > 0) {
                    timeLeft--;
                    elapsedTime++;

                    // Convert countdown time back to HH:MM:SS format
                    let hoursLeft = Math.floor(timeLeft / 3600).toString().padStart(2, '0');
                    let minutesLeft = Math.floor((timeLeft % 3600) / 60).toString().padStart(2, '0');
                    let secondsLeft = (timeLeft % 60).toString().padStart(2, '0');

                    timeLimitElement.innerText = `${hoursLeft}:${minutesLeft}:${secondsLeft}`;

                    // Convert elapsed time to HH:MM:SS format
                    let hoursElapsed = Math.floor(elapsedTime / 3600).toString().padStart(2, '0');
                    let minutesElapsed = Math.floor((elapsedTime % 3600) / 60).toString().padStart(2, '0');
                    let secondsElapsed = (elapsedTime % 60).toString().padStart(2, '0');

                    elapsedTimeElement.innerText = `${hoursElapsed}:${minutesElapsed}:${secondsElapsed}`;
                } else {
                    clearInterval(timerInterval);
                    alert("Time's up! Submitting the test...");
                    document.getElementById('submitT').click(); // Auto-submit test
                }
            }

            let timerInterval = setInterval(updateTimer, 1000); // Update every second
        }

        window.onload = startTimer;
        
        <?php $con->close();?>
    </script>

</body>
</html>