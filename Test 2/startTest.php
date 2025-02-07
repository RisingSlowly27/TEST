<!DOCTYPE html>
<?php
    session_start();
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
    $userID = $_SESSION['user_id'];
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

        .horz{
            display: flex;
            justify-content: space-between;
        }

        .QBox{
            background-color: azure;
            border: 3px solid black;
            height: auto;
            width: 1500px;
            margin: 30px;
        }

        .opt{
            display: flex;
            flex-direction: column;
        }

        .question{
            text-align: left;
            margin:25px;
            font-size: 25px;
        }

        #subHead{
            white-space:pre;
        }
    </style>
</head>
<body>
    <h2>

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
        $sql2 = "SELECT * FROM `questions` WHERE `testID` = '$testID'";
        $result1 = mysqli_query($con, $sql1);
        $result2 = mysqli_query($con, $sql2);
        $row1 = mysqli_fetch_assoc($result1);
        $name=$row1['test_name'];
        $TL=$row1['time_limit'];
        $PM=$row1['passMarks'];
        echo $name;
    ?>

    </h2>
    <div id="subHead">
                Elapsed Time : <span id="elapsedTime">00:00:00</span>                Remaining Time : <span id="timeLimit"><?php echo $TL;?></span>                Total Marks : <span id="total"></span>                Pass Marks : <?php echo $PM;?>
    </div>
    <div class="QBox">
        <div id="testArea">
            <?php
                if (mysqli_num_rows($result2)>0){
                    $count=1;
                    $cAnswerL=[];
                    $qMarksL=[];
                    while (mysqli_num_rows($result2)+1 > $count) {
                        // Fetch the data
                        $row2 = mysqli_fetch_assoc($result2);
                        $qID = $row2['qID'];
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
        <button id="submitT"> Submit Test</button>
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