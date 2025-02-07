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

        .horz{
            display: flex;
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
        <button id="AQ"> Add Question</button><button id="SC"> Save Changes</button>
    </div>
    <div>
    <button id="SE"> Save and Exit</button><button id="ES"> Exit without Saving</button>
    </div>

    <script>
        const testID=<?php echo $_POST['data'];?>;
        let count=0;
        console.log(testArea.lastChild);
        let QWER = document.querySelectorAll('.question'); 
        if (QWER.length!=0) count = QWER[QWER.length - 1].classList[0];
        let countAt=count; 
        count++;
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
            fetch('updateTest.php', { 
                method: 'POST',
                body: testData
            })
            .then((response)=>console.log(response.text()))
            .catch(error => console.error("Error:", error));
            let testArea=document.getElementById('testArea');
            let countnow=1;
            testArea.querySelectorAll('.question').forEach((e)=>{
                console.log(e);
                if (countnow>countAt){
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
                else{
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
                countnow++;
            });
            countAt=countnow-1;
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