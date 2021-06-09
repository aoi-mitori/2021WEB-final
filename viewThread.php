<?php
session_start();
include("pdoInc.php");

$ar=array("seven","one","two","three","four","seven","eleven" ,"seven");


$sth2 = $dbh->prepare('SELECT point from my_thread where id = ?');
$sth2->execute(array($_GET['id']));
$row2 = $sth2->fetch(PDO::FETCH_ASSOC);
if ($row2['point'] > 0) {
    if (!isset($_SESSION['account'])) {
        echo "權限不足，請先登入:(";
        die('<meta http-equiv=REFRESH CONTENT=3;url=./hw5.php>');
    } else {
        $sth = $dbh->prepare('SELECT point from user where account = ?');
        $sth->execute(array($_SESSION['account']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row['point'] < $row2['point']) {
            echo "權限不足:(";
            die('<meta http-equiv=REFRESH CONTENT=3;url=./hw5.php>');
        }
    }
}



if (isset($_GET['del'])) {
    $sth1 = $dbh->prepare('SELECT account FROM my_thread WHERE id = ?');
    $sth1->execute(array((int)$_GET['del']));

    if ($sth1->rowCount() == 1) {
        $row = $sth1->fetch(PDO::FETCH_ASSOC);
        if ($_SESSION['is_admin'] == 1 || $_SESSION['account'] == $row['account']) {
            $sth = $dbh->prepare('DELETE FROM my_thread WHERE id = ?');
            $sth->execute(array((int)$_GET['del']));
            echo '<meta http-equiv=REFRESH CONTENT=0;url=' . basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '>';
        }
    }
}

if (isset($_GET['update']) && isset($_POST['edit_msg'])) {
    $sth1 = $dbh->prepare('SELECT account FROM my_thread WHERE id = ?');
    $sth1->execute(array((int)$_GET['update']));

    if ($sth1->rowCount() == 1) {
        $row = $sth1->fetch(PDO::FETCH_ASSOC);
        if ($_SESSION['account'] == $row['account']) {
            $sth = $dbh->prepare('UPDATE my_thread SET content = ? WHERE id = ?');
            $sth->execute(array($_POST['edit_msg'], (int)$_GET['update']));
            echo '<meta http-equiv=REFRESH CONTENT=0;url=' . basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '>';
        }
    }
}

$resultStr = "";
function showMsg($row, $numFloor, $sthDice)
{
    $title = htmlspecialchars($row['title']);
    $nn = htmlspecialchars($row['nickname']);
    $msg = htmlspecialchars($row['content']);
    $msg = str_replace("\n", "<br>", $msg);
    $account = htmlspecialchars($row['account']);
    if ($numFloor == 0) {
        echo '<a href="#ending">跳至最新留言</a><br>';
        echo '<a id="starting"></a>';//定位標籤
        echo '<font class="text">討論串標題：</font><a class="title-link" href="viewBoard.php?id=' . $row['board_id'] . '">' . $title . '</a><br><br>';
    }
    echo "<font class=\"text\">#" . ($numFloor + 1) . "</font>";
    if ($account == $_SESSION['account']) { //edit
        echo '&nbsp&nbsp&nbsp<a href="' .
            basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&update=' . $row['id'] .
            '"><i class="fas fa-pencil-alt" style="color:#005CAF; cursor: hand;" ></i></a>';
    }

    if (isset($_SESSION['account']) && $_SESSION['account'] != null && $_SESSION['is_admin'] == 1 && $numFloor != 0) { //delete
        echo '&nbsp&nbsp&nbsp<a href="' .
            basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&del=' . $row['id'] .
            '"><i class="fas fa-trash-alt" style="color:#005CAF; cursor: hand;" ></i></a>';
    } else if ($account == $_SESSION['account']) {
        echo '&nbsp&nbsp&nbsp<a href="' .
            basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&del=' . $row['id'] .
            '"><i class="fas fa-trash-alt" style="color:#005CAF; cursor: hand;" ></i></a>';
    }

    //dice//
    $regex = "/\([\d\w\-]+\)/";
    preg_match_all($regex, $msg, $matches);
    // //echo $dbh."123";
    // echo "123";
    //$sth = $dbh->query('SELECT * from my_dice');
    //$sthMSG = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? AND type = 1");
    // echo $sthMSG;
    //$sthMSG->execute(array($row['id']));
    // echo $row['id'];
    
    foreach ($matches[0] as $word) {
        //type 1 == (oj) : AC / WA / RE
        if($word == "(oj)"){
            $rowMSG = $sthDice->fetch(PDO::FETCH_ASSOC);
            $src = "<img src='./ankaDice/oj".$rowMSG['number'].".png'>";
            $msg = preg_replace("/\(oj\)/", $src, $msg, 1);
        }else if($word == "(queen-rainbow)"){
            $rowMSG = $sthDice->fetch(PDO::FETCH_ASSOC);
            $src = "<img src='./ankaDice/test".$rowMSG['number'].".png'>";
            $msg = preg_replace("/\(queen-rainbow\)/", $src, $msg, 1);
        }
    }





    echo '<table class="msg" rules="all" cellpadding="5" ><tr>';
    echo "<td><font color=\"#113285\">留言人:</font> " . $nn . "</td>";
    echo "<td><font color=\"#113285\">時間:</font> " . $row['time'] . "</td>";
    echo "<tr><td colspan=\"2\"><font color=\"#113285\">留言內容:</font><br>" . $msg;

    if (isset($_GET['update']) && $row['id'] === $_GET['update']) { //edit
        echo "<br><br>";
        echo "<form action=\"viewThread.php?id=" . (int)$_GET['id'] . "&update=" . $row['id'] . "\" method=\"post\">
            <font color=\"#113285\">修改內容：<br></font><textarea name=\"edit_msg\"></textarea>
                <input class=\"submit2\" type=\"submit\"><br>
            </form>";
    }
    echo "</td></tr></table><br>";
}

if (isset($_GET['id']) && isset($_POST['content'])) { //發表回應
    if (!isset($_SESSION['account'])) {
        $resultStr = "請先登入！";
    } else {
        if ($_POST['content'] != '') {
            $sth = $dbh->prepare('SELECT id FROM my_thread WHERE id = ? and board_id <> 0');
            $sth->execute(array((int)$_GET['id']));
            if ($sth->rowCount() > 0) {
                $sth2 = $dbh->prepare(
                    'INSERT INTO my_thread (nickname, content, root_thread_id, account) VALUES (?, ?, ?, ?)'
                );
                $sth2->execute(array(
                    $_SESSION['nickname'],
                    $_POST['content'],
                    (int)$_GET['id'],
                    $_SESSION['account']
                ));

                
                //dice
                $lastId = $dbh->lastInsertId();
                $string_content = $_POST['content'];
                $regex = "/\([\d\w\-]+\)/";
                preg_match_all($regex, $string_content, $matches);
                foreach ($matches[0] as $word) {
                    //type 1 == (oj) : AC / WA / RE
                    if($word == "(oj)"){
                        $rand_num = rand(0,2);
                        $dbh->exec(
                            "INSERT INTO my_dice (type, thread_id, number) VALUES (1, '$lastId', '$rand_num')"
                        );
                    }else if($word == "(queen-rainbow)"){
                        $rand_num = rand(0,5);
                        $dbh->exec(
                            "INSERT INTO my_dice (type, thread_id, number) VALUES (2, '$lastId', '$rand_num')"
                        );
                    }
                }


                echo '<meta http-equiv=REFRESH CONTENT=0;url=viewThread.php?id=' . (int)$_GET['id'] . '>';
            }
        } else {
            $resultStr = "請輸入內容！";
        }
    }
}
?>

<html>

<head>
    <!--link rel=stylesheet type="text/css" href="hw4.css"-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

    <style>
        body {
            margin: 0 0 1em 0;
        }

        .container {
            font-size: 30px;
            background-color: #005CAF;
            margin-top: 0;
            height: 60px;
        }

        .up-table {
            padding-top: 13px;
            margin-right: 30px;
            width: 100%;
        }

        .up-table td {
            font-size: 20px;
        }

        .left-table td {
            padding-left: 25px;
        }

        .right-table td {
            padding-right: 25px;
        }

        .up-link {
            color: white;
            text-decoration: none;
        }

        .link {
            color: #113285;
            font-size: 23px;
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }

        .body-table {
            margin-top: 20px;
            margin-left: 40px;
        }

        .body-table td {
            padding-top: 10px;
        }

        #name {
            padding-right: 10px;
        }

        .login {
            color: #f5e8a2;
        }

        .text {
            color: #113285;
            font-size: 20px;
        }

        .container3 {
            margin-top: 35px;
        }

        font {
            font-family: Microsoft JhengHei;
        }

        a {
            font-family: Microsoft JhengHei;
        }

        .submit {
            position: relative;
            left: 85px;
        }

        .result {
            color: red;
            position: relative;
            right: 40px;
        }

        .result1 {
            color: red;
            font-size: 23px;
        }

        .container4 {
            margin-top: 30px;
            margin-left: 30px;
        }

        .zi_hr_01 {
            border-width: 0;
            height: 30px;
            background-image: url("./line2.png");
            background-repeat: repeat-x;
        }

        .hr_02 {
            border-width: 0;
            border-bottom: 1px #5f5f5f dashed;
        }

        .title-link {
            color: #6F3381;
            font-size: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .title-link:hover {
            text-decoration: underline;
        }

        .tex {
            font-size: 14px;
        }

        .submit1 {
            position: relative;
            top: 6px;
            left: 197px;
            margin-bottom: 10px;
        }

        .submit2 {
            position: relative;
            left: 10px;
        }

        .container5 {
            margin-top: 30px;
            margin-left: 35px;
            margin-right: 30px;
        }

        .msg {
            border: 2px solid;
            border-color: #113285;
        }

        .text2 {
            color: #113285;
            font-size: 16px;
        }

        .upp-link {
            color: #f5e8a2;
            text-decoration: none;
        }
    </style>
    <style>
        textarea {
            vertical-align: top
        }
    </style>

</head>

<body bgcolor="#d4ebfa">
    <div class="container">
        <table class="up-table" border=0>
            <tr>
                <td>
                    <div align="left">
                        <table class="left-table" border=0>
                            <tr>
                                <?php
                                echo "<td><a class=\"up-link\" href=\"./hw5.php\">返回看板列表</a></td>";
                                if (isset($_SESSION['account']) && $_SESSION['account'] != null) {

                                    echo "<td class=\"login\"  ><a class=\"upp-link\" href=\"./admin.php\" id=\"name\"><font>Hi, " . $_SESSION['account'] . " (" . htmlspecialchars($_SESSION['nickname']) . ")</font></a></td>";
                                    echo "<td style=\"color:#f7efc1; \"><i class=\"far fa-smile\"></i>";
                                    $sth = $dbh->prepare('SELECT point from user where account = ?');
                                    $sth->execute(array($_SESSION['account']));
                                    $row = $sth->fetch(PDO::FETCH_ASSOC);
                                    echo "&nbsp&nbsp&nbsp" . $row['point'] . "</td>";
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div align="right">
                        <table class="right-table" border=0>
                            <tr>
                                <?php
                                if (isset($_SESSION['account']) && $_SESSION['account'] != null) { //如果登入
                                    echo "<td><a class=\"up-link\" href=\"./edit_profile.php\">修改資料</a></td>";
                                    echo "<td><a class=\"up-link\" href=\"./logout.php\">登出</a></td>";
                                } else {
                                    echo "<td><a class=\"up-link\" href=\"./register.php\">註冊</a></td> <td><a class=\"up-link\" href=\"./login.php\">登入</a></td>";
                                }
                                ?>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <?php

    if (isset($_GET['id'])) {
        $sth = $dbh->prepare('
            SELECT * from my_thread
            WHERE (id = ? and board_id <> 0)
            OR (root_thread_id = ?)
            ORDER BY id
        ');
        $sth->execute(array((int)$_GET['id'], (int)$_GET['id']));
        if ($sth->rowCount() > 0) {

    ?>
            <div class="container4" style="text-align:left;">
                <?php echo "<font class=\"result1\">" . $resultStr . "</font>"; ?><br>
                <form action="viewThread.php?id=<?php echo (int)$_GET['id']; ?>" method="post">
                    <font class="text">發表回應：</font><br>
                    <font class="text">內容：</font><textarea name="content"></textarea><br>
                    <input class="submit1" type="submit"><br>
                </form>
            </div>
            <hr class="zi_hr_01" id="hr_01">
            <div class="container5">
                <form action="viewThread.php?id=<?php echo (int)$_GET['id']; ?>" method="post">
                    <select name="filter">
                        <option value="0">顯示全部</option>
                        <option value="1">只顯示樓主</option>
                        <option value="2">只顯示樓主與中骰者</option>
                    </select>
                    <input type="submit">
                </form>
        <?php

            $numFloor = 0;
            if (isset($_POST['filter'])) {
                if ($_POST['filter'] == 0) {
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                        $sthDice->execute(array($row['id']));
                        showMsg($row, $numFloor++, $sthDice);
                    }
                    echo "<a id='ending'></a>";//定位標籤
                    echo '<a href="#starting">跳至第一則留言</a>';
                } else if ($_POST['filter'] == 1) {
                    $sthOwner = $dbh->prepare('SELECT account from my_thread where id = ?');
                    $sthOwner->execute(array((int)$_GET['id']));
                    $sthOwnerResult = $sthOwner->fetch();
                    // $thisOwner = $sthOwnerResult[0];
                    $ownerThreads = $dbh->prepare('SELECT * from my_thread where id = ? OR (root_thread_id = ? AND account = ?)');
                    $ownerThreads->execute(array((int)$_GET['id'], (int)$_GET['id'], strval($sthOwnerResult[0])));
                    while ($row = $ownerThreads->fetch(PDO::FETCH_ASSOC)) {
                        $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                        $sthDice->execute(array($row['id']));
                        showMsg($row, $numFloor++, $sthDice);
                    }
                    echo "<a id='ending'></a>";
                    echo '<a href="#starting">跳至第一則留言</a>';
                    // $row = $sth->fetch(PDO::FETCH_ASSOC);

                } else if ($_POST['filter'] == 2) {
                    $newDiceType = array();
                    $newDiceNum = array();

                    $sthOwner = $dbh->prepare('SELECT account from my_thread where id = ?');
                    $sthOwner->execute(array((int)$_GET['id']));
                    $sthOwnerResult = $sthOwner->fetch();
                    
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        if( count($newDiceNum)==0 && count($newDiceType)==0 && $row['account']==strval($sthOwnerResult[0]) ){ //已經骰完且此樓是樓主
                            $sthNewDice = $dbh->prepare('SELECT * from my_dice WHERE thread_id = ?');
                            $sthNewDice->execute(array((int)$row['id']));
                            while( $rowDice = $sthNewDice->fetch(PDO::FETCH_ASSOC) ){ //有骰子，add to array
                                $newDiceType[] = $rowDice['type'];
                                $newDiceNum[] = $rowDice['number'];
                            }
                            // for( $ii=0; $ii <sizeof($newDiceNum); $ii++){//
                            //     echo "NUM".$ii." ".$newDiceNum[$ii]."<br>";
                            //     echo "TYPE".$ii." ".$newDiceType[$ii]."<br>";
                            // }//
                            $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                            $sthDice->execute(array($row['id']));
                            
                            showMsg($row, $numFloor++, $sthDice);

                        } else if( count($newDiceNum)!=0 && count($newDiceType)!=0 ){
                            $flag = FALSE;
                            $sthNewDice = $dbh->prepare('SELECT * from my_dice WHERE thread_id = ?');
                            $sthNewDice->execute(array((int)$row['id']));
                            while( $rowDice = $sthNewDice->fetch(PDO::FETCH_ASSOC) ){ //有骰子
                                for($i=0;$i<sizeof($newDiceNum);$i++){
                                    if( $rowDice['type']==$newDiceType[$i] && $rowDice['number']==$newDiceNum[$i]){//骰中
                                        $flag = TRUE;
                                        array_splice($newDiceNum,$i,1);
                                        array_splice($newDiceType,$i,1); //remove from array
                                        break;
                                    }
                                }
                            }
                            if($flag == TRUE || $row['account']==strval($sthOwnerResult[0])){ //有骰中或是樓主
                                // for( $ii=0; $ii <sizeof($newDiceNum); $ii++){//
                                //     echo "NUM".$ii." ".$newDiceNum[$ii]."<br>";
                                //     echo "TYPE".$ii." ".$newDiceType[$ii]."<br>";
                                // }//
                                $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                $sthDice->execute(array($row['id']));
                                
                                showMsg($row, $numFloor++, $sthDice);
                            }
                        }
                    }
                    echo "<a id='ending'></a>";
                    echo '<a href="#starting">跳至第一則留言</a>';
                } else{
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                        $sthDice->execute(array($row['id']));
                        showMsg($row, $numFloor++, $sthDice);
                    }
                    echo "<a id='ending'></a>";
                    echo '<a href="#starting">跳至第一則留言</a>';
                }
            } else {
                //echo "haha";
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    //echo "haha1";
                    $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                    $sthDice->execute(array($row['id']));
                    showMsg($row, $numFloor++, $sthDice);
                }
                echo "<a id='ending'></a>";
                echo '<a href="#starting">跳至第一則留言</a>';
            }
        } else {
            echo '討論串不存在';
        }
    } else {
        echo '未指定討論串';
    }
        ?>
            </div>

</body>

</html>