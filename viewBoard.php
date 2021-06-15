<?php
session_start();
include("pdoInc.php");
?>

<html>

<head>
    <title>安安安價板</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <style>
        textarea {
            vertical-align: top
        }
    </style>
    <style>
        body {
            margin: 0 0 0 0;
        }

        .container {
            font-size: 30px;
            background-color: #0d3b66;
            height: 100px;
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

        h3 {
            font-family: 'Noto Sans TC', sans-serif;
        }

        font {
            font-family: 'Noto Sans TC', sans-serif;
        }

        a {
            font-family: 'Noto Sans TC', sans-serif;
        }

        .submit {
            position: relative;
            left: 85px;
        }

        .submit1 {
            position: relative;
            top: 6px;
            left: 197px;
            margin-bottom: 10px;
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
            margin-top: 20px;
            margin-left: 35px;
        }

        .container5 {
            margin-top: 30px;
            margin-left: 35px;
            margin-right: 30px;
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

        .text-big {
            font-size: 27px;
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

        /* ----- */
        .app {
            display: flex;
            width: 100%;
            height: 90%;
            /* background-color: red; */
        }

        .app>.left-col {
            display: flex;
            flex-direction: column;
            width: 25%;
            height: 100%;
            /* text-align: center; */
            /* background-color: red; */
            overflow-y: auto;
        }

        .app>.left-col h3 {
            text-align: center;
            /* margin: 0 auto; */
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 5px;

        }

        .app>.left-col>.board-list {

            /* background-color: red; */
        }

        .app>.left-col>.board-list>.board-table {
            /* margin-top: 20px;
            margin-left: 40px; */
            /* border: black solid 1px; */
            /* padding-top: 10px;
            padding-bottom: 10px; */
            align-items: center;
            justify-content: center;
            border-spacing: 20px 10px;
            margin: 0 auto;
        }

        .app>.left-col>.board-list>.board-table tr td {
            font-family: 'Noto Sans TC', sans-serif;
            /* border: black solid 1px; */
            /* padding-left: 50px; */
            /* padding-right: 50px; */
            /* padding-top: 30px; */
            /* padding-bottom: 30px; */

            text-align: center;
        }

        .app>.left-col>.board-list>.board-table tr .board-td {}

        .app>.left-col>.board-list>.board-table tr td .board-title {
            display: flex;
            width: 220px;
            height: 50px;
            font-size: 20px;
            align-items: center;
            justify-content: center;
            /* background-color: #0D3B66; */
            /* border: 1px solid black; */
            border-radius: 10px;
            background: #0D3B66;
            color: #F9F6F0;
        }

        .app>.left-col>.board-list>.board-table tr td .board-title a {
            font-size: 20px;
            text-decoration: none;
            color: #F9F6F0;
        }

        .app>.left-col>.horizontal-section {
            width: 80%;
            height: 3px;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 10px;
            border: #9CA2AB 3px solid;
            border-radius: 10px;
            background: #9CA2AB;
        }

        .app>.left-col>.post-block {
            /* display: flex; */
            /* background-color: blue; */
            /* flex-wrap: wrap; */
            /* align-items: flex-start; */
            /* justify-content: center; */
        }

        .app>.left-col>.post-block>.warning {
            font-family: 'Noto Sans TC', sans-serif;
            text-align: center;
            color: red;
            /* display: flex; */
            /* background-color: blue; */
            /* flex-wrap: wrap; */
            /* align-items: flex-start; */
            /* justify-content: center; */
        }

        .app>.left-col>.post-block form {
            display: flex;
            /* background-color: blue; */
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: center;

        }

        .app>.left-col>.post-block form p {
            display: inline;
            font-family: 'Noto Sans TC', sans-serif;
            width: 30%;
            margin: auto 0;
            /* background-color: blue; */
            margin-left: 10px;

        }

        .app>.left-col>.post-block form input {
            width: 80%;
            /* background-color: blue; */
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
        }

        .app>.left-col>.post-block form textarea {
            width: 80%;
            height: 150px;
            margin-left: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            /* background-color: blue; */

        }

        .app>.left-col>.post-block form select {
            width: 50%;
            margin-top: 10px;
            margin-bottom: 10px;
            /* background-color: blue; */

        }

        .app>.left-col>.post-block>form>.submitBtn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;
            margin-top: 20px;
            width: 20%;
            color: #F9F6F0;
            background-color: black;

        }

        .app>.right-col {
            display: flexbox;
            flex-direction: column;
            /* align-items: center; */
            /* justify-content: center; */
            width: 75%;
            height: 100%;
            background-color: #E1E1E1;
            overflow-y: scroll;
        }

        .app>.right-col>.topic-block {
            display: flexbox;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            width: 90%;
            height: 200px;
            border: solid #0D3B66 1px;
            background-color: #F9F6F0;
            position: relative;
        }



        .app>.right-col>.topic-block>.info-block {
            display: flex;
            align-items: flex-start;
            /* margin: 0 auto; */
            /* margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px; */
            /* margin-bottom: 10px; */
            /* margin-bottom: 20px; */
            padding: 10px 10px;
            width: 100%;
            height: 75%;

        }

        .app>.right-col>.topic-block>.info-block>.photo1 {
            /* display: flex;
            align-items: flex-start; */
            /* margin: 0 auto; */
            /* margin-top: 10px;
            margin-left: 10px;
            margin-right: 10px; */
            /* margin-bottom: 10px; */
            /* margin-bottom: 20px; */
            /* padding: 10px 10px;
            width: 100%;
            height: 75%; */
            width: 12vmin;
            height: 12vmin;
            /* position: absolute; */
        }

        .app>.right-col>.topic-block>.info-block>.photo1>.image-cropper>.sticker {
            /* display: block; */
            /* margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px; */
            /* margin-right: 20px; */
            /* max-width: 130px;
            height: 130px; */
            /* height: 130px; */
            /* clip-path: circle(100px at center); */
            display: inline;
            margin: 0 auto;
            height: 100%;
            width: auto;
        }

        .app>.right-col>.topic-block>.info-block>.content-info {
            /* display: inline; */
            width: 80%;
            height: auto;
            padding-left: 20px;
            /* position: relative; */
            /* margin: 0 auto; */

        }

        .app>.right-col>.topic-block>.info-block>.content-info a {
            display: inline;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 20px;
            width: 50%;
            height: auto;
            /* margin: 0 auto; */

        }

        .app>.right-col>.topic-block>.info-block>.content-info h5 {
            display: inline;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 16px;
            width: 50%;
            height: auto;
            /* margin: 0 auto; */
            margin-left: 20px;
        }

        .app>.right-col>.topic-block>.info-block>.content-info p {
            width: 100%;
            height: auto;
            overflow: hidden;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            /* display: inline-block; */
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 4;
            text-overflow: ellipsis;
            /* white-space: nowrap; */
        }

        .app>.right-col>.topic-block>.info-block>.content-info>a>.deleteBtn {
            width: 20px;
            height: 20px;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .app>.right-col>.topic-block>.nickname {
            /* font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px; */
            /* display: inline; */
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 14px;
            color: #000;
            position: absolute;
            left: 30px;
            bottom: 40px;
            /* margin: 0; */
            /* margin-left: 20px; */
            /* background-color: black; */
            /* float: left; */
        }

        .app>.right-col>.topic-block>a>.seeMoreBtn {
            /* font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px; */
            /* margin-right: 40px; */
            /* width: 100px; */
            /* height: 30px; */
            /* background-color: black; */
            bottom: 10px;
            right: 10px;
            position: absolute;
        }
    </style>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
</head>

<body bgcolor="#F9F6F0">

    <?php
    //-----刪除貼文-----//
    if (isset($_GET['del'])) {
        $sthDel = $dbh->prepare('SELECT account FROM my_thread WHERE id = ?');
        $sthDel->execute(array((int)$_GET['del']));
        $row = $sthDel->fetch(PDO::FETCH_ASSOC);
        if ($_SESSION['is_admin'] == 1 || $_SESSION['account'] == $row['account']) { //管理員or貼文擁有者有權刪除貼文

            $sth3 = $dbh->prepare('SELECT id FROM my_thread WHERE root_thread_id = ?'); //搜尋貼文下的留言id
            $sth3->execute(array((int)$_GET['del']));
            while ($row3 = $sth3->fetch(PDO::FETCH_ASSOC)) {
                $sthDelDice = $dbh->prepare('DELETE FROM my_dice WHERE thread_id = ?'); //依留言id刪除骰子
                $sthDelDice->execute(array((int)$row3['id']));
            }
            $sth = $dbh->prepare('DELETE FROM my_thread WHERE id = ? or root_thread_id = ?'); //刪除貼文與其留言
            $sth->execute(array((int)$_GET['del'], (int)$_GET['del']));

            $sthDelDice = $dbh->prepare('DELETE FROM my_dice WHERE thread_id = ?'); //刪除貼文的骰子
            $sthDelDice->execute(array((int)$_GET['del']));
            echo '<meta http-equiv=REFRESH CONTENT=0;url=' . basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '>';
        }
    }
    ?>



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



    if (isset($_GET['id'])) {
        $sthBoard = $dbh->prepare('SELECT id, name FROM my_board WHERE id = ?');
        $sthBoard->execute(array((int)$_GET['id']));
        if ($sthBoard->rowCount() == 1) {
            $row = $sthBoard->fetch(PDO::FETCH_ASSOC);
    ?>

            <div class="app">
                <div class="left-col">
                    <h3>看板列表</h3>
                    <div class="board-list">
                        <table class="board-table">
                            <?php
                            $sth = $dbh->query('SELECT * from my_board ORDER BY id');
                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //顯示看板

                                echo '<tr><td class="board-td"> <div class="board-title"><a class="link" href="viewBoard.php?id=' . $row['id'] . '">' . $row['name'] . '</a></div></td>';
                            }
                            ?>

                        </table>
                    </div>
                    <div class="horizontal-section"></div>
                    <h3>發布文章</h3>
                    <div class="post-block">
                        <?php
                        $resultStr = " ";
                        if (isset($_GET['id'])  && isset($_POST['title']) && isset($_POST['content'])) {

                            $sthBoard = $dbh->prepare('SELECT id, name FROM my_board WHERE id = ?');
                            if (!isset($_SESSION['account'])) { //未登入不可撰寫新貼文
                                $resultStr = "請先登入！";
                            } else {
                                if ($_POST['title'] != '' && $_POST['content'] != '' && isset($_POST['min_point']) && gettype($_POST['min_point']) == 'array') {
                                    if ($_POST['min_point'][0] >= 0 && $_POST['min_point'][0] <= 30 && $_POST['min_point'][0] % 5 == 0) { //如果使用者設定的積分是0,5,10,15,...30
                                        //----取得使用者的積分----//
                                        $sthUserPoint = $dbh->prepare('SELECT point from user where account = ?');
                                        $sthUserPoint->execute(array($_SESSION['account']));
                                        $rowUserPoint = $sthUserPoint->fetch(PDO::FETCH_ASSOC);
                                        $userPoint = $rowUserPoint['point'];

                                        if ($_POST['min_point'][0] <= $userPoint) { //如果使用者設定的文章積分<=自己的積分
                                            $sthBoard->execute(array((int)$_GET['id']));
                                            if ($sthBoard->rowCount() == 1) {

                                                $sth = $dbh->prepare( //新增至資料表
                                                    'INSERT INTO my_thread (board_id, nickname, title, content, account, point) VALUES (?, ?, ?, ?, ?, ?)'
                                                );
                                                $sth->execute(array(
                                                    (int)$_GET['id'],
                                                    $_SESSION['nickname'],
                                                    $_POST['title'],
                                                    $_POST['content'],
                                                    $_SESSION['account'],
                                                    $_POST['min_point'][0]
                                                ));

                                                $lastId = $dbh->lastInsertId(); //取得最新加入的貼文的id
                                                //------------ dice -------------//
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

                                                //------------ 發文新增點數 -------------//
                                                $point = $rowUserPoint['point'] + 5;
                                                $sth2 = $dbh->prepare('UPDATE user SET point = ? WHERE account = ?');
                                                $sth2->execute(array($point, $_SESSION['account']));
                                                echo '<meta http-equiv=REFRESH CONTENT=0;url=viewBoard.php?id=' . (int)$_GET['id'] . '>';
                                            }
                                        } else {
                                            $resultStr = "文章積分不可高於自身的積分！";
                                        }
                                    }
                                } else if ($_POST['title'] == '' && $_POST['content'] != '') {
                                    $resultStr = "請輸入標題！";
                                } else if ($_POST['title'] != '' && $_POST['content'] == NULL) {
                                    $resultStr = "請輸入內容！";
                                } else {
                                    $resultStr = "請輸入標題及內容！";
                                }
                            }
                        }


                        echo '<p class="warning">' . $resultStr . '</p>';
                        ?>

                        <form action="viewBoard.php?id=<?php echo (int)$_GET['id']; ?>" method="post">
                            <input name="title" placeholder="文章標題">
                            <textarea name="content" placeholder="文章內容"></textarea>
                            <p>閱讀權限：</p><select name="min_point[]">
                                <option value="0" selected>0</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                            </select>

                            <input class="submitBtn" type="submit" value="送出">
                        </form>
                    </div>
                </div>

                <div class="right-col">


            <?php
            //----顯示貼文----//
            $sthTd = $dbh->prepare('SELECT * from my_thread WHERE board_id = ? ORDER BY id');
            $sthTd->execute(array((int)$_GET['id']));

            while ($row = $sthTd->fetch(PDO::FETCH_ASSOC)) {

                // echo
                // '<div class="topic-block">' .
                //     '<div class="info-block">' .
                //     '<img src="大頭貼位址" alt="" class="sticker">
                //     <div class="content-info">';

                echo
                '<div class="topic-block">' .
                    '<div class="info-block">' .
                    '<div class="photo1">
                    <div class="image-cropper">
                    <img src="';
                // if (isset($_SESSION['account'])) {
                $sthImg1 = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                $sthImg1->execute(array($row['account']));
                $rowImg1 = $sthImg1->fetch(PDO::FETCH_ASSOC);
                if ($rowImg1['path'] != '') {
                    echo $rowImg1['path'];
                }
                // }
                echo '" class="sticker" />
                </div></div>
                ' . '<div class="content-info">';






                // <!-- 文章標題 -->

                echo '<a class="title-link" href="viewThread.php?id=' . $row['id'] . '">' . htmlspecialchars($row['title']) . '</a>';



                // <!-- 積分 -->

                $sthPoint = $dbh->prepare('SELECT point from my_thread where id = ?');
                $sthPoint->execute(array((int)$row['id']));
                $row1 = $sthPoint->fetch(PDO::FETCH_ASSOC);
                echo "<h5>積分限制：</h5>" . $row1['point'];


                //-------dice-------//
                $regex = "/\([\d\w\-]+\)/";
                $msg = htmlspecialchars($row['content']);
                preg_match_all($regex, $msg, $matches);

                $sthDice = $dbh->prepare("SELECT * from my_dice WHERE thread_id = ? ORDER BY id");
                $sthDice->execute(array($row['id']));

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
                $msg = str_replace("\n", "<br>", $msg);
                // <!-- 內容 -->
                echo '<p>' . $msg . '</p>';


                if (isset($_SESSION['account']) && $_SESSION['account'] != null) { //顯示刪除貼文按鈕
                    if ($_SESSION['is_admin'] == 1 || $row['account'] == $_SESSION['account']) {
                        echo '<a href="' .
                            basename($_SERVER['PHP_SELF']) . '?id=' . (int)$_GET['id'] . '&del=' . $row['id'] .
                            '">
                            <img src="./img/Delete.png" alt="" class="deleteBtn">
                            </a>';
                    }
                }

                echo '</div>' .
                    '</div>';

                //暱稱
                echo '<h5 class="nickname">' . htmlspecialchars($row['nickname']) . '</h5>';
                echo
                '
                <a href="viewThread.php?id=' . $row['id'] . '">' . '<img class="seeMoreBtn" src="./img/seemore.png" alt="">' . '</a>
                
            </div>';
            }
        } else {
            echo '看板不存在';
        }
    } else {
        echo '未指定看板';
    }

            ?>



                </div>


            </div>


            </div>



            </div>



</body>

</html>