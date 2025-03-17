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
            background-color: lightgreen;
            text-align: center;
            margin: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1{
            color: red;
            text-decoration: underline;
            text-decoration-color: black;
        }

        .horz{
            display: flex;
        }

        .horz2{
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
            border: 3px solid brown;
            background-color: lightgoldenrodyellow;
            padding:10px;
        }

        #subHead{
            white-space:pre;
        }

        .removeQ{
            background-color: blue;
            position: relative;
            width: 175px;
            left: 825px;
        }

        .removeQ:hover{
            background-color: aqua;
        }

        .noClick{
            pointer-events: none; 
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
        $result1 = mysqli_query($con, $sql1);
        $sqlmid = "SELECT * FROM `qbank` WHERE `testID` = '$testID'";
        $resultmid = mysqli_query($con, $sqlmid);
        $row1 = mysqli_fetch_assoc($result1);
        $name=$row1['test_name'];
        $PasMar=$row1['passMarks'];
        $TL=$row1['time_limit'];
        $timeCheck=explode(':',$TL);
        if ($timeCheck[2]=='00'){
            $timeCheck[2]='01';
            $TL=implode(':',$timeCheck);
        }
        echo $name;
    ?>

    </h2>
    <div id="subHead">
        <label><input type="checkbox" value="yes"></label><label for="timeLeftI">Time Limit</label> <input type="time" id="timeLeftI" name="timeLeftI" value="<?php echo $TL?>">                Total Marks : <span id="total"></span>                <label for='passMarks'>Pass Marks : </label><input type='text' name='passMarks' id='passMarks' value="<?php echo $PasMar?>">
    </div>
    <div class="QBox">
        <div id="testArea">
            <?php
                if (mysqli_num_rows($resultmid)>0){
                    $count=1;
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
                        <div class='$count question $qID'>
                            <div class='horz'>
                                <label for='Q$count'>Enter Question $count :</label>
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
                } 
                else {
                    echo "<h3 id='NoQ'>No Questions Added Till Now</h3>";
                }
                $con->close();
            ?>
        </div>
        <button id="AQ"> Add Question</button><button id="SC"> Save Changes</button><button id="QB"> Show Question Bank </button>
    </div>
    <div>
    <button id="SE"> Save and Exit</button><button id="ES"> Exit without Saving</button>
    </div>
    <div id="questionBank" class="QBox" style="display:none">
        <h1> QUESTION BANK</h1>
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
        $sql2 = "SELECT * FROM `questions`";
        $result2 = mysqli_query($con, $sql2);
        if (mysqli_num_rows($result2)>0){
            $count=1;
            while (mysqli_num_rows($result2)+1 > $count) {
                $row2 = mysqli_fetch_assoc($result2);
                $qMain=$row2['qMain'];
                $mOpt=explode('-|-',$row2['qOptions']);
                $cAnswer=explode('->|',$row2['cAnswer']);
                $checked=[];
                $j=0;
                foreach($mOpt as $choice){
                    if ($choice==$cAnswer[$j]){
                        $checked[]='checked';
                        $j++;
                    }
                    else $checked[]=' ';
                }
                array_pop($cAnswer);
                $qMarks=$row2['qMarks'];
                $HTMLt = "
                <div class='$count question $qID'>
                    <div class='horz2'>
                        <h4> $count) $qMain</h4>
                        <div>
                            <button class='AFQB'> Add This to Test </button><br><br>
                            Question Marks: <span class='marks'>$qMarks</span>
                        </div>
                    </div>
                    <div class='opt'>
                        <div>
                        <input type='checkbox' name='correct' value='$mOpt[0]' id='O1-$count' class='noClick' $checked[0]>
                        <label for='O1-$count'>$mOpt[0]</label>
                        </div>
                        <div>
                        <input type='checkbox' name='correct' value='$mOpt[1]' id='O2-$count' class='noClick' $checked[1]>
                        <label for='O2-$count'>$mOpt[1]</label>
                        </div>
                        <div>
                        <input type='checkbox' name='correct' value='$mOpt[2]' id='O3-$count' class='noClick' $checked[2]>
                        <label for='O3-$count'>$mOpt[2]</label>
                        </div>
                        <div>
                        <input type='checkbox' name='correct' value='$mOpt[3]' id='O4-$count' class='noClick' $checked[3]>
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

    <script>
        const testID=<?php echo $_POST['data'];?>;
        const userID=<?php echo $_SESSION['user_id'];?>;
        let count=0;
        let QWER = document.getElementById('testArea').querySelectorAll('.question'); 
        if (QWER.length!=0) count = QWER[QWER.length - 1].classList[0];
        count++;
        let removed=[];
        let QBS=true;
        document.addEventListener('click',(event)=>{
            if (event.target.id=='AQ'){
                console.log('Clicked');
                let testArea=document.getElementById('testArea');
                let newDiv = document.createElement('div');
                newDiv.classList.add(count, 'question');
                newDiv.innerHTML+=`
                <div class='horz'>
                    <label for="Q`+count+`">Enter Question `+count+`:</label>
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
            let sub =document.getElementById('subHead').querySelectorAll('input');
            testData.append("test_id", testID);
            testData.append("time_limit", sub[1].value);
            testData.append("passMarks", sub[2].value);
            testData.append("totalM", document.getElementById('total').innerText);
            removed.forEach((value, index) => {
                testData.append(`toRem[]`, value);  
            });
            fetch('updateTest.php', { 
                method: 'POST',
                body: testData
            })
            .then((response)=>console.log(response.text()))
            .catch(error => console.error("Error:", error));
            let testArea=document.getElementById('testArea');
            testArea.querySelectorAll('.question').forEach((e)=>{
                if (e.classList.length==2){
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
                    formData.append('testID',testID);
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
                    formData.append('testID',testID);
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
            if (event.target.id=='SE'){
                SaveChanges();
                window.location.href='FlexboxMod.php';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='ES'){
                window.location.href='FlexboxMod.php';
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.id=='QB'){
                if (QBS){
                    document.getElementById('questionBank').style.display='block';
                    event.target.innerText='Hide Question Bank';
                    QBS=false;
                }
                else{
                    document.getElementById('questionBank').style.display='none';
                    event.target.innerText='Show Question Bank';
                    QBS=true;
                }
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='AFQB'){
                document.getElementById('AQ').click();
                let AFQB = document.getElementById('testArea').querySelectorAll('.question'); 
                let ADDED = AFQB[AFQB.length - 1];
                let REF = event.target.parentElement.parentElement.parentElement.querySelectorAll('input');
                let ADDEDINP=ADDED.querySelectorAll('input');
                ADDEDINP[0].value=event.target.parentElement.parentElement.querySelector('h4').innerText;
                ADDEDINP[1].value=event.target.parentElement.querySelector('span').innerText;
                ADDEDINP[2].value=REF[0].value;
                ADDEDINP[4].value=REF[1].value;
                ADDEDINP[6].value=REF[2].value;
                ADDEDINP[8].value=REF[3].value;
                if (REF[0].checked) ADDEDINP[3].checked=true;
                if (REF[1].checked) ADDEDINP[5].checked=true;
                if (REF[2].checked) ADDEDINP[7].checked=true;
                if (REF[3].checked) ADDEDINP[9].checked=true;
            }
        });

        document.addEventListener('click',(event)=>{
            if (event.target.classList[0]=='removeQ'){
                const toRemove=event.target.parentElement;
                if (toRemove.classList.length==3) removed.push(toRemove.classList[2]);
                toRemove.style.display='none';
                toRemove.classList.remove('question');
            }
        });
    
        function changeTotal(){
            let QMarks=document.querySelectorAll('.QM');
            let total=0;
            if (QMarks.length!=0){
                QMarks.forEach((q)=>{
                    let val=parseInt(q.value);
                    if (isNaN(val)) val=0;
                    total+=val;
                });
            }
            document.getElementById('total').innerText=total;
        }

        setInterval(changeTotal,500);
    
    </script>

</body>
</html>