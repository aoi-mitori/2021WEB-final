<?php
session_start();
include("pdoInc.php");
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
            border: 1px solid #0D3B66;
            /* border-color: #113285; */
            background-color: #F9F6F0;
        }

        .text2 {
            color: #113285;
            font-size: 16px;
        }

        .upp-link {
            color: #f5e8a2;
            text-decoration: none;
        }

        #header {
            background-color: #0D3B66;
            position: fixed;
            width: 100%;
            height: 16%;
            left: 0px;
            top: 0px;
            z-index: 1000;
        }

        .text {
            position: absolute;
            font-size: 2.3vmin;
            line-height: 2.25vmin;
            color: #000000;
        }

        .photo {
            position: absolute;
            width: 40%;
            height: 40%;
        }

        .image-cropper {
            width: 12vmin;
            height: 12vmin;
            position: absolute;
            overflow: hidden;
            background: #FFFFFF;
            border-radius: 50%;
        }

        .image {
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;
        }

        /* ------ */
        .app {
            display: flex;
            /* width: 70vw; */
            height: 75vh;
            margin: 10px;
            margin-top: 30px;
            /* background-color: red; */
        }

        .app>.left-column {
            /* display: flex; */
            width: 75%;
            height: 100%;
            /* background-color: blue; */
        }

        .app>.left-column>.top-block {
            display: flex;
            flex-direction: row;
            width: 100%;
            height: 10%;
            align-items: center;
            justify-content: center;

            /* background-color: red; */
        }

        .app>.left-column>.top-block>.topic-title {
            font-family: 'Noto Sans TC', sans-serif;
            /* display: flex; */
            width: 30%;
            height: 100%;
            margin-bottom: 20px;
            /* background-color: red; */
        }

        .app>.left-column>.top-block>.filter-block {
            display: flex;
            flex-direction: row;
            width: 70%;
            height: 100%;
            align-items: center;
            justify-content: flex-end;
            /* background-color: red; */
        }

        .app>.left-column>.top-block>.filter-block>.filter-result {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            /* display: flex; */
            /* flex-direction: row; */

            /* width: 100%; */
            /* height: auto; */
            margin-right: 20px;
            /* background-color: yellow; */
        }

        .app>.left-column>.top-block>.filter-block>.filter-result p {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;

            /* background-color: yellow; */
        }

        .app>.left-column>.top-block>.filter-block>.filter-select {

            margin-top: 10px;
            /* margin-right: 0 auto; */
            /* background-color: green; */

        }

        .app>.left-column>.top-block>.filter-block>.filter-select form {

            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            height: auto;
            /* margin-right: 0 auto; */
            /* background-color: green; */

        }

        .app>.left-column>.top-block>.filter-block>.filter-select form select {
            margin-right: 10px;
            width: 70%;
            height: 40%;
            /* display: flex; */
            /* width: 100%;
            height: auto;
            margin: 0 auto;
            background-color: green; */
            /* float: right; */
        }

        .app>.left-column>.top-block>.filter-block>.filter-select form input {
            /* margin-right: 40px; */
            /* display: flex; */
            /* width: 100%;
            height: auto;
            margin: 0 auto;
            background-color: green; */
            /* float: right; */
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;
            /* margin-top: 20px; */
            width: 20%;
            color: #F9F6F0;
            background-color: black;
        }

        .app>.left-column>.main-block {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 70%;
            background-color: #E1E1E1;
            overflow-y: auto;
            padding-top: 20px;
            padding-left: 20px;
        }

        .app>.left-column>.main-block>.msg {
            display: flex;
            flex-direction: row;
            width: 90%;
            height: auto;
            position: relative;
            padding-bottom: 35px;
        }

        .app>.left-column>.main-block>.msg>.thread-content {
            /* display: flex;
            flex-direction: row;
            width: 90%;
            height: auto;
            position: relative; */
            word-break: break-all;
            padding-left: 20px;
            padding-right: 40px;
        }

        .app>.left-column>.main-block>.msg>a>.del-btn {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .app>.left-column>.main-block>.msg>.left-box {
            /* display: flex;
            flex-direction: row;
            width: 100%;
            height: 70%; */

        }

        .app>.left-column>.main-block>.msg>.left-box>.owner-name {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            color: #000;
            position: absolute;
            left: 20px;
            top: 100px;

        }

        .app>.left-column>.main-block>.msg>.left-box>.photo1 {
            width: 12vmin;
            height: 12vmin;

        }

        .app>.left-column>.main-block>.msg>.left-box>.photo1>.image-cropper {
            /* display: flex;
            flex-direction: row;
            width: 100%;
            height: 70%; */

        }

        .app>.left-column>.main-block>.msg>.left-box>.photo1>.image-cropper>.sticker {
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;

        }

        .app>.left-column>.main-block>.thread-block {
            /* display: flex; */
            width: 80%;
            height: auto;
            background-color: red;
            margin: 10px;
        }

        .app>.left-column>.bot-block {
            /* display: flex; */
            width: 100%;
            height: 20%;
            /* background-color: yellow; */
        }

        .app>.left-column>.bot-block>form {
            display: flex;
            padding-top: 20px;
            padding-left: 20px;
            /* background-color: yellow; */
        }

        .app>.left-column>.bot-block>form>.thread-box {
            /* display: flex; */
            width: 90%;
            height: 60px;
            /* background-color: yellow; */
        }

        .app>.left-column>.bot-block>form>.submitBtn {
            /* display: flex; */
            margin: auto 0;
            margin-left: 30px;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;
            /* margin-top: 20px; */
            width: 10%;
            height: 30px;
            color: #F9F6F0;
            background-color: black;
            /* background-color: yellow; */
        }

        .app>.right-column {
            display: flex;
            width: 25%;
            height: 100%;
            /* background-color: red; */
        }

        .app>.right-column>.rule {
            background-color: #FFFFFF;
            border: 1px solid #000;
            /* display: flex; */
            width: 75%;
            margin: 0 auto;
            /* height: 100%; */
            /* background-color: red; */
        }
    </style>
    <style>
        textarea {
            vertical-align: top
        }
    </style>

</head>

<body bgcolor="#F9F6F0">
    <header id="header">
        <a href="index.php"><img src="./photos/images/logo.png" style="position:relative; width: 20%;left: 2.5%;top: 15%;" /></a>

        <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { ?>
            <a href="admin.php"><img src="./photos/images/admin.png" style="position:relative; width: 8%;left:37%;top: 17%;" /></a>
        <?php } ?>

        <?php if (isset($_SESSION['account']) && $_SESSION['account'] != null) { ?>
            <div class="text" style="color:#FFFFFF;top:25%;left:68%;">
                <?php echo $_SESSION['nickname'] ?>
            </div>
            <div class="text" style="color:#FFFFFF;top:55%;left:68%;">
                積分:<?php $sth = $dbh->prepare('SELECT point from user where account = ?');
                    $sth->execute(array($_SESSION['account']));
                    $row = $sth->fetch(PDO::FETCH_ASSOC);
                    echo "&nbsp&nbsp&nbsp" . $row['point'] . "</td>"; ?>
            </div>
            <div class="photo" style="top:13%;left:75%;">
                <div class="image-cropper"><img src="<?php if (isset($_SESSION['account'])) {
                                                            $sth = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                                            $sth->execute(array($_SESSION['account']));
                                                            $row = $sth->fetch(PDO::FETCH_ASSOC);
                                                            if ($row['path'] != '') {
                                                                echo $row['path'];
                                                            }
                                                        } ?>" class="image" />
                </div>
            </div>
            <div>
                <a href="edit_profile.php"><img src="./photos/images/edit.png" style="position:absolute;width:8%;left:83%;
top:15%;" /></a>
                <a href="logout.php"><img src="./photos/images/logout.png" style="position:absolute;width:8%;left:83%;
top:55%;" /></a>
            </div>
        <?php } else { ?>
            <a href="register.php"><img src="./photos/images/register.png" style="position:absolute;width:8%;left:83%;
top:15%;" /></a>
            <a href="login.php"><img src="./photos/images/login.png" style="position:absolute;width:8%;left:83%;
top:55%;" /></a>

        <?php } ?>

    </header>
    <br><br><br><br><br><br>

    <?php
    //----顯示留言----//
    $resultStr = "";
    function showMsg($row, $numFloor, $sthDice, $owner, $imgPath)
    {
        $title = htmlspecialchars($row['title']);
        $nn = htmlspecialchars($row['nickname']);
        $msg = htmlspecialchars($row['content']);
        $msg = str_replace("\n", "<br>", $msg);
        $account = htmlspecialchars($row['account']);
        if ($numFloor == 0) {
            // echo '<a href="#ending">跳至最新留言</a><br>'; //跳至頁面最底的連結
            echo '<a id="starting"></a>'; //定位標籤
            // echo '<div class="board-id">' . $title . '</div>';
        }
        // echo "<font class=\"text\">#" . ($numFloor + 1) . "</font>"; //顯示樓數

        // if (isset($_SESSION['account']) && $_SESSION['account'] != null && ($_SESSION['is_admin'] == 1 || $owner == $_SESSION['account'])) { //管理員與樓主顯示刪除留言按鈕
        //     if ($numFloor != 0) {
        //         echo '&nbsp&nbsp&nbsp<a href="' .
        //             basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&del=' . $row['id'] .
        //             '"><img class="del-btn" src="./img/Delete.png"></a>';
        //     }
        // }

        //-------dice-------//
        $regex = "/\([\d\w\-]+\)/";
        preg_match_all($regex, $msg, $matches);

        foreach ($matches[0] as $word) { //type 1 == (oj) : Online Judge骰 -> AC/RE/WA
            if ($word == "(oj)") {
                $rowMSG = $sthDice->fetch(PDO::FETCH_ASSOC);
                $src = "<img src='./ankaDice/oj" . $rowMSG['number'] . ".png'>";
                $msg = preg_replace("/\(oj\)/", $src, $msg, 1);
            } else if ($word == "(queen-rainbow)") { //type 2 == (queen-rainbow) : 七彩女王骰
                $rowMSG = $sthDice->fetch(PDO::FETCH_ASSOC);
                $src = "<img src='./ankaDice/queen" . $rowMSG['number'] . ".png'>";
                $msg = preg_replace("/\(queen-rainbow\)/", $src, $msg, 1);
            } else if ($word == "(dice-six)") { //type3 == (dice-six) ：六面骰
                $rowMSG = $sthDice->fetch(PDO::FETCH_ASSOC);
                $src = "<img src='./ankaDice/dice" . $rowMSG['number'] . ".png'>";
                $msg = preg_replace("/\(dice-six\)/", $src, $msg, 1);
            }
        }
        echo '<div class="msg">';

        if (isset($_SESSION['account']) && $_SESSION['account'] != null && ($_SESSION['is_admin'] == 1 || $_SESSION['account'] == $row['account'])) { //管理員顯示刪除留言按鈕
            if ($numFloor != 0) {
                echo '<a href="' . basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&del=' . $row['id'] .
                    '"><img class="del-btn" src="./img/Delete.png"></a>';
            }
        }


        echo '<div class="left-box">';
        echo '<div class="photo1">
        <div class="image-cropper"><img src="' . $imgPath . '" class="sticker"></div></div>';
        echo '<div class="owner-name">' . $nn . '</div></div>' . '<p class="thread-content">' . $msg . '</p>' . '</div>';

        // echo '<table class="msg" rules="all" cellpadding="5" ><tr>';
        // echo "<td><font color=\"#113285\">留言人:</font> " . $nn . "</td>";
        // echo "<td><font color=\"#113285\">時間:</font> " . $row['time'] . "</td>";
        // echo "<tr><td colspan=\"2\"><font color=\"#113285\">留言內容:</font><br>" . $msg;

        //----編輯留言----//
        // if (isset($_GET['update']) && $row['id'] === $_GET['update']) { //edit
        //     echo "<br><br>";
        //     echo "<form action=\"viewThread.php?id=" . (int)$_GET['id'] . "&update=" . $row['id'] . "\" method=\"post\">
        //         <font color=\"#113285\">修改內容：<br></font><textarea name=\"edit_msg\"></textarea>
        //             <input class=\"submit2\" type=\"submit\"><br>
        //         </form>";
        // }
        echo "</td></tr></table><br>";
    }

    //----發表回應（留言）----//
    // if (isset($_GET['id']) && isset($_POST['content'])) {
    //     if (!isset($_SESSION['account'])) {
    //         $resultStr = "請先登入！";
    //     } else {
    //         if ($_POST['content'] != '') {
    //             $sth = $dbh->prepare('SELECT id FROM my_thread WHERE id = ? and board_id <> 0');
    //             $sth->execute(array((int)$_GET['id']));
    //             if ($sth->rowCount() > 0) {
    //                 $sth2 = $dbh->prepare(
    //                     'INSERT INTO my_thread (nickname, content, root_thread_id, account) VALUES (?, ?, ?, ?)'
    //                 );
    //                 $sth2->execute(array(
    //                     $_SESSION['nickname'],
    //                     $_POST['content'],
    //                     (int)$_GET['id'],
    //                     $_SESSION['account']
    //                 ));


    //                 //----dice----//
    //                 $lastId = $dbh->lastInsertId();
    //                 $string_content = $_POST['content'];
    //                 $regex = "/\([\d\w\-]+\)/";
    //                 preg_match_all($regex, $string_content, $matches);
    //                 foreach ($matches[0] as $word) {
    //                     if ($word == "(oj)") { //type 1 == (oj) : Online Judge骰 -> AC/RE/WA
    //                         $rand_num = rand(0, 2);
    //                         $dbh->exec(
    //                             "INSERT INTO my_dice (type, thread_id, number) VALUES (1, '$lastId', '$rand_num')"
    //                         );
    //                     } else if ($word == "(queen-rainbow)") { //type 2 == (queen-rainbow) : 七彩女王骰
    //                         $rand_num = rand(0, 5);
    //                         $dbh->exec(
    //                             "INSERT INTO my_dice (type, thread_id, number) VALUES (2, '$lastId', '$rand_num')"
    //                         );
    //                     } else if ($word == "(dice-six)") { //type3 == (dice-six) ：六面骰
    //                         $rand_num = rand(0, 5);
    //                         $dbh->exec(
    //                             "INSERT INTO my_dice (type, thread_id, number) VALUES (3, '$lastId', '$rand_num')"
    //                         );
    //                     }
    //                 }

    //                 echo '<meta http-equiv=REFRESH CONTENT=0;url=viewThread.php?id=' . (int)$_GET['id'] . '>';
    //             }
    //         } else {
    //             $resultStr = "請輸入內容！";
    //         }
    //     }
    // }
    ?>



    <div class="app">
        <div class="left-column">
            <div class="top-block">
                <div class="topic-title">
                    <?php
                    $sthTt = $dbh->prepare("SELECT title from my_thread WHERE id = ?");
                    $sthTt->execute(array($_GET['id']));
                    $sthTtResult = $sthTt->fetch();
                    echo '<h3>' . strval($sthTtResult[0]) . '</h3>';
                    ?>

                </div>
                <div class="filter-block">
                    <div class="filter-result">
                        <p id="threadFilterStr"></p>
                    </div>
                    <div class="filter-select">
                        <form action="viewThread.php?id=<?php echo (int)$_GET['id']; ?>" method="post">
                            <select name="filter">
                                <option value="0">顯示全部</option>
                                <option value="1">只顯示樓主</option>
                                <option value="2">只顯示樓主與安價者</option>
                            </select>
                            <input type="submit" value="篩選">
                        </form>

                    </div>

                </div>
            </div>
            <div class="main-block">

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

                        $numFloor = 0;
                        $sthOwner = $dbh->prepare('SELECT account from my_thread where id = ?');
                        $sthOwner->execute(array((int)$_GET['id']));
                        $sthOwnerResult = $sthOwner->fetch();

                        if (isset($_POST['filter'])) {
                            if ($_POST['filter'] == 0) { //顯示全部
                                echo "<script>document.getElementById('threadFilterStr').innerHTML='顯示全部，共" . $sth->rowCount() . "則留言'</script>";
                                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                    $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                    $sthDice->execute(array($row['id']));

                                    $imgPath = '';
                                    $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                    $sthImg1->execute(array($row['account']));
                                    $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                    if ($rowImg1['path'] != '') {
                                        $imgPath = $rowImg1['path'];
                                    }


                                    showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                                }
                                echo "<a id='ending'></a>"; //定位標籤
                                echo '<a href="#starting"><img src="./img/ToTop.png" class="shortcutBtn"></a>'; //跳至第一則留言的連結

                            } else if ($_POST['filter'] == 1) { //只顯示樓主
                                $ownerThreads = $dbh->prepare('SELECT * from my_thread where id = ? OR (root_thread_id = ? AND account = ?)');
                                $ownerThreads->execute(array((int)$_GET['id'], (int)$_GET['id'], strval($sthOwnerResult[0])));
                                echo "<script>document.getElementById('threadFilterStr').innerHTML='只顯示樓主，共" . $ownerThreads->rowCount() . "則留言'</script>";
                                while ($row = $ownerThreads->fetch(PDO::FETCH_ASSOC)) {
                                    $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                    $sthDice->execute(array($row['id']));

                                    $imgPath = '';
                                    $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                    $sthImg1->execute(array($row['account']));
                                    $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                    if ($rowImg1['path'] != '') {
                                        $imgPath = $rowImg1['path'];
                                    }


                                    showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                                }
                                echo "<a id='ending'></a>"; //定位標籤
                                echo '<a href="#starting"><img src="./img/ToTop.png" class="shortcutBtn"></a>'; //跳至第一則留言的連結

                            } else if ($_POST['filter'] == 2) { //只顯示樓主與安價者

                                //紀錄樓主的骰子
                                $newDiceType = array();
                                $newDiceNum = array();
                                $threadNumber = 0; //紀錄留言數量
                                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                    if (count($newDiceNum) == 0 && count($newDiceType) == 0 && $row['account'] == strval($sthOwnerResult[0])) { //已經骰完且此樓是樓主
                                        $sthNewDice = $dbh->prepare('SELECT * from my_dice WHERE thread_id = ?');
                                        $sthNewDice->execute(array((int)$row['id']));
                                        while ($rowDice = $sthNewDice->fetch(PDO::FETCH_ASSOC)) { //有骰子，add to array
                                            $newDiceType[] = $rowDice['type'];
                                            $newDiceNum[] = $rowDice['number'];
                                        }

                                        //找出留言中的骰子
                                        $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                        $sthDice->execute(array($row['id']));

                                        $imgPath = '';
                                        $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                        $sthImg1->execute(array($row['account']));
                                        $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                        if ($rowImg1['path'] != '') {
                                            $imgPath = $rowImg1['path'];
                                        }

                                        showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                                        $threadNumber++;
                                    } else if (count($newDiceNum) != 0 && count($newDiceType) != 0) { //還未全部中骰
                                        $flag = FALSE;
                                        $sthNewDice = $dbh->prepare('SELECT * from my_dice WHERE thread_id = ?');
                                        $sthNewDice->execute(array((int)$row['id']));
                                        while ($rowDice = $sthNewDice->fetch(PDO::FETCH_ASSOC)) { //有骰子
                                            for ($i = 0; $i < sizeof($newDiceNum); $i++) {
                                                if ($rowDice['type'] == $newDiceType[$i] && $rowDice['number'] == $newDiceNum[$i]) { //骰中
                                                    $flag = TRUE;
                                                    array_splice($newDiceNum, $i, 1);
                                                    array_splice($newDiceType, $i, 1); //remove from array
                                                    break;
                                                }
                                            }
                                        }
                                        if ($flag == TRUE || $row['account'] == strval($sthOwnerResult[0])) { //有骰中或是樓主，則顯示留言
                                            $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                            $sthDice->execute(array($row['id']));

                                            $imgPath = '';
                                            $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                            $sthImg1->execute(array($row['account']));
                                            $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                            if ($rowImg1['path'] != '') {
                                                $imgPath = $rowImg1['path'];
                                            }

                                            showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                                            $threadNumber++;
                                        }
                                    }
                                }
                                echo "<script>document.getElementById('threadFilterStr').innerHTML='只顯示樓主與安價者，共" . $threadNumber . "則留言'</script>";
                                echo "<a id='ending'></a>"; //定位標籤
                                echo '<a href="#starting"><img src="./img/ToTop.png" class="shortcutBtn"></a>'; //跳至第一則留言的連結

                            } else { //顯示全部留言
                                echo "<script>document.getElementById('threadFilterStr').innerHTML='顯示全部，共" . $sth->rowCount() . "則留言'</script>";
                                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                    $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                    $sthDice->execute(array($row['id']));

                                    $imgPath = '';
                                    $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                    $sthImg1->execute(array($row['account']));
                                    $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                    if ($rowImg1['path'] != '') {
                                        $imgPath = $rowImg1['path'];
                                    }

                                    showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                                }
                                echo "<a id='ending'></a>"; //定位標籤
                                echo '<a href="#starting"><img src="./img/ToTop.png" class="shortcutBtn"></a>'; //跳至第一則留言的連結
                            }
                        } else { //顯示全部留言
                            echo "<script>document.getElementById('threadFilterStr').innerHTML='顯示全部，共" . $sth->rowCount() . "則留言'</script>";
                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                                $sthDice->execute(array($row['id']));

                                $imgPath = '';
                                $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                                $sthImg1->execute(array($row['account']));
                                $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                                if ($rowImg1['path'] != '') {
                                    $imgPath = $rowImg1['path'];
                                }

                                showMsg($row, $numFloor++, $sthDice, strval($sthOwnerResult[0]), $imgPath);
                            }
                            echo "<a id='ending'></a>"; //定位標籤
                            echo '<a href="#starting"><img src="./img/ToTop.png" class="shortcutBtn"></a>'; //跳至第一則留言的連結
                        }
                    } else {
                        echo '討論串不存在';
                    }
                } else {
                    echo '未指定討論串';
                }
                ?>


                <div class="shortcutBtn">

                </div>
            </div>
            <div class="bot-block">
                <?php
                $resultStr = "";
                if (isset($_GET['id']) && isset($_POST['content'])) {
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


                                //----dice----//
                                $lastId = $dbh->lastInsertId();
                                $string_content = $_POST['content'];
                                $regex = "/\([\d\w\-]+\)/";
                                preg_match_all($regex, $string_content, $matches);
                                foreach ($matches[0] as $word) {
                                    if ($word == "(oj)") { //type 1 == (oj) : Online Judge骰 -> AC/RE/WA
                                        $rand_num = rand(0, 2);
                                        $dbh->exec(
                                            "INSERT INTO my_dice (type, thread_id, number) VALUES (1, '$lastId', '$rand_num')"
                                        );
                                    } else if ($word == "(queen-rainbow)") { //type 2 == (queen-rainbow) : 七彩女王骰
                                        $rand_num = rand(0, 5);
                                        $dbh->exec(
                                            "INSERT INTO my_dice (type, thread_id, number) VALUES (2, '$lastId', '$rand_num')"
                                        );
                                    } else if ($word == "(dice-six)") { //type3 == (dice-six) ：六面骰
                                        $rand_num = rand(0, 5);
                                        $dbh->exec(
                                            "INSERT INTO my_dice (type, thread_id, number) VALUES (3, '$lastId', '$rand_num')"
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
                <form action="viewThread.php?id=<?php echo (int)$_GET['id']; ?>" method="post">
                    <textarea name="content" class="thread-box" placeholder="留言內容"></textarea>
                    <input class="submitBtn" type="submit" value="送出">

                </form>
            </div>
        </div>
        <div class="right-column">
            <div class="rule">
                安價規則：
                樓主會問一個問題，並丟出骰子<br>
                參與者留言回覆樓主的問題並丟出骰子，樓主會取骰出同骰的留言作為答案<br><br>
                如何丟骰子：在留言中輸入骰子語法並送出<br><br>
                可用骰子語法：<br>
                <img src="./ankaDice/dice-six.gif" alt="this slowpoke moves" /> (dice-six)：丟一顆六面骰子 <br>
                <img src="./ankaDice/queen.gif" alt="this slowpoke moves" /> (queen-rainbow)：看看英國女王的繽紛穿搭<br>
                <img src="./ankaDice/oj.gif" alt="this slowpoke moves" /> (oj)：你今天AC了嗎?<br>
            </div>
        </div>
    </div>





</body>

</html>