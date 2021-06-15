<?php
session_start();
include("pdoInc.php");

if ($_SESSION['is_admin'] != 1) { //not admin
    die('<meta http-equiv=REFRESH CONTENT=0;url=./index.php>');
}

$resultStr11 = '';


if (isset($_POST['add_account']) && $_SESSION['is_admin'] == 1) {
    if ($_POST['add_account'] != NULL) {
        $sth = $dbh->prepare('SELECT account FROM user WHERE account = ? ');
        $sth->execute(array($_POST['add_account']));
        if ($sth->rowCount() != 0) { //ok account exsit
            $sth1 = $dbh->prepare('UPDATE user SET is_admin = 1 WHERE account = ? ');
            $sth1->execute(array($_POST['add_account']));
            echo '<meta http-equiv=REFRESH CONTENT=0;url=' . basename($_SERVER['PHP_SELF']) . '>';
        } else {
            $resultStr11 = "查無此帳號";
        }
    } else {
        $resultStr11 = "請輸入帳號";
    }
}

$resultStr4 = '';
if (isset($_POST['del_account']) && $_SESSION['is_admin'] == 1) {
    if ($_POST['del_account'] == $_SESSION['account']) {
        $resultStr4 = "無法自我免職";
    } else if ($_POST['del_account'] != NULL) {
        $sth = $dbh->prepare('SELECT account FROM user WHERE account = ? ');
        $sth->execute(array($_POST['del_account']));
        if ($sth->rowCount() != 0) { //ok account exsit
            $sth1 = $dbh->prepare('UPDATE user SET is_admin = 0 WHERE account = ? ');
            $sth1->execute(array($_POST['del_account']));
            echo '<meta http-equiv=REFRESH CONTENT=0;url=' . basename($_SERVER['PHP_SELF']) . '>';
        } else {
            $resultStr4 = "查無此帳號";
        }
    } else {
        $resultStr4 = "請輸入帳號";
    }
}
?>

<?php
// session_start();
// include("pdoInc.php");

// if ($_SESSION['is_admin'] != 1) { //not admin
//     die('<meta http-equiv=REFRESH CONTENT=0;url=./index.php>');
// }
$resultStr = '';
$resultStr1 = '';
$resultStr2 = '';

if (isset($_POST['name']) && $_SESSION['is_admin'] == 1) {
    if ($_POST['name'] != NULL) {
        $sth = $dbh->prepare('SELECT name FROM my_board WHERE name = ? ');
        $sth->execute(array($_POST['name']));
        if ($sth->rowCount() != 0) { //看板已存在
            $resultStr = "此看板已經存在";
        } else {
            $sth = $dbh->prepare('INSERT INTO my_board (name, description  ) VALUES (?, ?)');
            $sth->execute(array($_POST['name'], $_POST['description']));
            $resultStr1 = "看板新增成功";
        }
    } else {
        $resultStr2 = "看板名稱請勿空白";
    }
}
?>

<html>

<head>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
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
            margin-top: 30px;
            margin-left: 30px;
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

        .container6 {
            margin-top: 30px;
            text-align: left;
            padding-left: 200px;
        }

        .submit3 {
            position: relative;
            left: 210px;
        }

        .result3 {
            color: red;
        }

        .upp-link {
            color: #f5e8a2;
            text-decoration: none;
        }

        .main-table {
            border: 1px black solid;
        }

        .main-table td {
            padding-right: 260px;
        }

        .container7 {
            display: flexbox;
            flex-direction: column;
            /* align-items: center;
            justify-content: center; */
            width: 50%;
            height: auto;
            margin: 0 auto;
            margin-top: 70px;
            /* background-color: red; */

        }

        .container7>.admin {

            width: 100%;
            /* height: 50%; */
            margin: 0px auto;
            /* background-color: blue; */
        }

        .container7 h3 {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 24px;
        }

        .container7>.admin>.admin-setting {
            display: flex;
        }

        .container7>.admin>.admin-setting>.admin-list {
            width: 50%;
            height: 150px;
            overflow-y: auto;
            border: #0D3B66 1px solid;
            border-radius: 10px;
            /* background-color: blue; */
        }

        .container7>.admin>.admin-setting>.vertical-section {
            width: 5px;
            margin-left: 70px;
            margin-right: 70px;
            /* border: #0D3B66 1px solid; */
            border-radius: 10px;
            background: #9CA2AB;
        }

        .container7>.admin>.admin-setting>.admin-list table tr td {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 16px;
            padding-left: 10px;
            padding-top: 10px;
            /* background-color: blueviolet; */
        }

        .container7>.admin>.admin-setting>.admin-manage {
            width: 50%;
            display: flexbox;
            flex-direction: column;
            /* margin-left: 20px; */
            /* background-color: red; */
        }

        .container7>.admin>.admin-setting>.admin-manage p {
            display: inline-block;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 16px;
            /* background-color: red; */
        }

        .container7>.submitBtn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;

            color: #F9F6F0;
            background-color: black;
        }

        .container7>.horizontal-section {
            width: 100%;
            height: 3px;
            margin-top: 50px;
            margin-bottom: 50px;
            /* border: #0D3B66 1px solid; */
            border-radius: 10px;
            background: #9CA2AB;
        }

        .container7>.board {

            width: 100%;
            /* height: 50%; */
            margin: 0px auto;
            /* background-color: red; */
        }

        .container7>.board>.board-setting {
            /* display: flex; */
            flex-direction: row;
            padding-top: 10px;
            padding-bottom: 10px;
            /* width: 100%;
            height: 50%;
            margin: 0px auto; */
            /* background-color: red; */
        }

        .container7>.board>.board-setting>form p {
            display: inline-block;
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 16px;
            padding-left: 10px;
        }

        .container7>.board>.board-setting>form textarea {
            /* margin-top: 12px;
            margin-bottom: 12px; */
        }

        .container7>.board>.board-setting>form .space {
            display: inline-block;
            width: 110px;
            height: 10px;
            /* background-color: blueviolet; */
        }

        .container7>.admin>.admin-setting>.admin-manage>div form .submitBtn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;

            color: #F9F6F0;
            background-color: black;
        }

        .container7>.board>.board-setting>form .submitBtn {
            font-family: 'Noto Sans TC', sans-serif;
            font-size: 12px;
            border-radius: 20px;

            color: #F9F6F0;
            background-color: black;
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

    <!-- <div class="container7">
        <div class="admin">
            <h3>管理員列表</h3>
            <div class="admin-setting">
                <div class="admin-list">
                    <table>
                        <tr>
                            <td>
                                ann(安安)
                            </td>
                        </tr>
                        <tr>
                            <td>
                                dong(東)
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="vertical-section"></div>
                <div class="admin-manage">
                    <div>
                        <p>新增管理員：</p>
                        <input type="text">
                        <button> 送出 </button>
                    </div>
                    <div>
                        <p>移除管理員：</p>
                        <input type="text">
                        <button>送出</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-section"></div>
        <div class="board">
            <h3>新增看板</h3>
            <div class="board-setting">
                <p>看板名稱：</p>
                <input type="text">
                <div class="space"></div>
                <p>看板說明：</p>
                <input type="text">
                <button>送出</button>
            </div>
        </div>
    </div> -->


    <div class="container7">
        <div class="admin">
            <h3>管理員列表</h3>
            <div class="admin-setting">
                <div class="admin-list">
                    <table>
                        <?php
                        $sql = "SELECT * from user WHERE is_admin = 1 ORDER BY id";
                        $sth = $dbh->query($sql);
                        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                            echo '<tr><td>' . $row['account'] . ' (' . $row['nickname'] . ')</td></tr>';
                        }
                        ?>

                    </table>
                </div>
                <div class="vertical-section"></div>
                <div class="admin-manage">
                    <div>
                        <p>新增管理員：</p>

                        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="text" name="add_account" placeholder="請輸入帳號">
                            <input class="submitBtn" type="submit" value="送出">
                        </form>
                        <?php echo "<font class=\"result1\">" . $resultStr11 . "</font>"; ?><br>
                    </div>
                    <div>
                        <p>移除管理員：</p>
                        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
                            <input type="text" name="del_account" placeholder="請輸入帳號">
                            <input class="submitBtn" type="submit" value="送出">
                        </form>
                        <?php echo "<font class=\"result1\">" . $resultStr4 . "</font>"; ?><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="horizontal-section"></div>
        <div class="board">
            <h3>新增看板</h3>
            <div class="board-setting">
                <form action="admin.php" method="post">
                    <p>看板名稱：</p><input name="name">
                    <div class="space"></div>
                    <p>看板說明：</p><textarea name="description"></textarea>
                    <input class="submitBtn" type="submit" value="新增">
                </form>
                <?php
                if (isset($resultStr2)) {
                    echo "<font class=\"result1\" >" . $resultStr2 . "</font>";
                }
                if (isset($resultStr1)) {
                    echo "<font class=\"result1\" >" . $resultStr1 . "</font>";
                }
                if (isset($resultStr)) {
                    echo "<font class=\"result1\" >" . $resultStr . "</font>";
                }
                ?>
            </div>

        </div>

    </div>
</body>

</html>