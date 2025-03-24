<!DOCTYPE html>
<?php 
    session_start();
    $_SESSION['state']=1;
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
    $qID = $rowmid['qID']
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

        #instituteLogo img {
            max-width: 300px;
            height: auto;
        }

        div.username {
            display: flex; 
            justify-content: flex-end; 
            align-items: center; 
            padding-right: 100px;
            height: 100%;
        }

        div.username h2 {
            margin: 0; 
            font-family: "Lato", sans-serif;
            font-weight: 500 bold;
            font-style: normal;
            font-size: 50px;
            color: #4a7856;
            padding-top: 0; 
        }

        h2{
            margin-top: 100px;
            font-size: 50px;
            color:#647AA3;
            padding-top: 100px;
            position: relative;
            top: 50px;
            text-align: center;
        }

        .winky-sans-h2 {
            font-family: "Winky Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        #subHead{
            display: flex;
            align-items: center;
            padding-top: 70px;
            white-space:pre;        
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            color: #b5e2fa;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        #timeLeftI {
            width: 150px; 
            height: 50px; 
            padding: 5px; 
            font-size: 16px;
            text-align: center; 
            border: 2px solid #ccc; 
            border-radius: 5px; 
            background-color: #f8f8f8; 
            color: #333; 
        }

        #timeLeftI:focus {
            outline: none; 
            border-color: #647AA3; 
            box-shadow: 0 0 5px rgba(100, 122, 163, 0.5); 
        }

        #total {
            display: inline-block;
            font-size: 16px;
            color: #b5e2fa;
        }

        #passMarks {
            width: 150px; 
            height: 40px; 
            font-size: 16px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            color: #333;
        }

        #passMarks:focus {
            outline: none;
            border-color: #647AA3;
            box-shadow: 0 0 5px rgba(100, 122, 163, 0.5);
        }

        .horz{
            display: flex;
            justify-content: space-between;
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: white;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .horz2{
            display: flex;
            justify-content: space-between;
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 200;
            font-style: normal;
            color: white;
        }

        .horz input[type="text"] {
            width: 60%; 
            height: 40px;
            padding: 8px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        .horz .QM {
            width: 80px; 
            padding: 8px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .QBox{
            background-color: #121516;
            height: auto;
            width: 1500px;
            margin: 100px;
            margin-bottom: 0;
        }

        .opt{
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

        .opt div {
            display: flex;
            align-items: center;
            margin-bottom: 10px; 
        }

        .opt input[type="text"] {
            width: 300px; /* Adjust width of option textboxes */
            padding: 8px;
            font-size: 14px;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
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
            position: relative;
        }

        .noClick{
            pointer-events: none; 
        }

       label {
            font-family: "Raleway", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500 bold;
            font-style: normal;
            cursor: pointer;
            font-size: 20px;
        }

       input[type="checkbox"] {
            width: 20px;
            height: 20px;
            accent-color: #b5e2fa;
            cursor: pointer;
            margin-left: 5px;
        }

       input[type="text"], input[type="number"] {
            padding: 10px; 
            margin: 8px 0; 
            box-sizing: border-box; 
            border: 2px solid #ccc; 
            border-radius: 4px;
            background-color: #f8f8f8; 
            font-size: 16px; 
            color: #333;
            margin-left: 20px;
        }

        input[type="text"]:focus, input[type="number"]:focus {
            outline: none; 
            border-color: #647AA3; 
            box-shadow: 0 0 5px rgba(100, 122, 163, 0.5); 
        }


        input[type="text"]:disabled, input[type="number"]:disabled {
            background-color: #e0e0e0; 
            color: #999; 
        }


        input.question-marks {
            width: 30px; 
            text-align: center; 
        }

        .QM {
            width: 40px !important; 
            height: 40px !important;
            max-width: 40px !important;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            border: 2px solid #ccc;
            border-radius: 5px;
            background-color: #f8f8f8;
            color: #333;
            flex-shrink: 0; 
            box-sizing: border-box; 
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .QM:focus {
            outline: none; 
            border-color: #647AA3; 
            box-shadow: 0 0 5px rgba(100, 122, 163, 0.5); 
        }


        button-container {
            display: flex;
            justify-content: center;
            align-items: right;
            text-align: center;
       }

       .button-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin: 15px auto; 
            flex-wrap: wrap;
            width: 100%;
            margin-left: 100px;
        }

        .question-container { 
            position: relative; 
            padding-top: 20px; 
            margin-bottom: 40px; 
        }
            
        .removeQ {
            position: absolute;
            right: 20px;
            top: 80%; 
            transform: translateY(-50%); 
            margin: 0;
        }
       
        .removeQ, #AQ, #QB, #SC, #SE, #ES, .AFQB {
            background-color: #647AA3;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: bold;
            width: 150px;
            height: 50px;
            transition: background-color 0.3s ease;
            margin: 0;
            cursor: pointer;
            font-family: 'Gilroy', sans-serif;
            font-weight: 300;
            font-size: 15px;
       }

       .removeQ:hover, #AQ:hover, #QB:hover, #SC:hover, #SE:hover, #ES:hover, .AFQB:whover {
            background-color: #B5E2FA;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
       }

       #questionBank {
            margin-left: 40px;
            position: relative;
       }

       #qBank {
            position: relative; 
            margin-bottom: 100px; 
            transform: translateY(-50%);
            margin-left: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: auto;
       }

       #qBank h2 {
            position: relative;
            text-align: center;
       }

        .divider {
            position: absolute;
            width: 100%;
            left: 0;
            height: 2px;
            background-color: #888;
        }

        #NoQ {
            display: flex;
            align-items: center;
            justify-content: center; 
            white-space: pre;        
            font-family: "Inter", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            color: #b5e2fa;
            text-align: center;
            margin-left: 200px;
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
   <!-- Checkbox -->
   <label>
      <input type="checkbox" value="yes" style="margin-left: 500px;">
   </label>
   
   <!-- Time Limit -->
   <label for="timeLeftI" style="margin-left: 5px;">Time Limit:</label>
   <input type="time" id="timeLeftI" name="timeLeftI" value="<?php echo $TL ?>" style="margin-left: 5px;">

   <!-- Total Marks -->
   <label style="margin-left: 30px;">Total Marks:</label>
   <span id="total" style="margin-left: 5px;">15</span>

   <!-- Pass Marks -->
   <label for="passMarks" style="margin-left: 30px;">Pass Marks:</label>
   <input type="text" name="passMarks" id="passMarks" value="<?php echo $PasMar ?>" style="margin-left: 5px;">
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
                    echo "<div class='center-container'>
                            <h3 id='NoQ'>No Questions Added Till Now</h3>
                        </div>";
                }

                $con->close();
            ?>
        </div>
        <div class="button-group">
            <button id="AQ"> Add Question</button>
            <button id="SC"> Save Changes</button>
            <button id="QB"> Show Question Bank </button>
    </div>
    <div class="button-group">
            <button id="SE"> Save and Exit</button>
            <button id="ES"> Exit w/o Saving</button>
    </div>
    <div class="divider"></div>
    <div id="questionBank" class="QBox" style="display:none">
        <h2 id="qBank"> QUESTION BANK</h2>
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