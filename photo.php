<?php include_once "pdoInc.php";
session_start();
if (isset($_GET['id'])) {
    $sth = $dbh->prepare('SELECT * FROM user');
    $sth->execute(array((int)$_GET['id']));
    $row = $sth->fetch(PDO::FETCH_ASSOC);
}
header('X-Content-Type-Options: nosniff');
?>



<html>

<head>

    <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="EXPIRES" CONTENT="0">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <meta charset="UTF-8">
    <title>上傳大頭貼</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
        * {
            margin: 1%
        }
    </style>
</head>

<body>
    <form method="post" action="" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
        上傳圖片:
        <input type="file" name="file" id="file"><br>
        <input type="submit" id="submit" value="確認">
    </form>

</body>

</html>



<?php 
        $whiteList = array('jpeg', 'jpg', 'png');  
        if (isset($_FILES["file"])) {
            @$extension = strtolower(end(explode(".", $_FILES["file"]["name"])));    
            if ((in_array($extension, $whiteList)) && ($_FILES["file"]["size"] < 1024 * 1024) && (getimagesize($_FILES["file"]["tmp_name"]))){
                if ($_FILES["file"]["error"] > 0) {
                    echo "檔案錯誤 " . $_FILES["file"]["error"];
                } else {
                    $photo_user = $_SESSION["account"];
                    $new_filename = $photo_user . "." . $extension;
                    $file = "./photos/" . $new_filename;
                    move_uploaded_file($_FILES["file"]["tmp_name"], "./photos/" . $new_filename);
                    $sth2 = $dbh->prepare('UPDATE user SET path = ? WHERE account = ?');
                    $sth2->execute(array($file, $photo_user));
                    echo "<script type='text/javascript'>";
                    echo "alert('已成功更新');";
                    echo "location.href='index.php';";
                    echo "</script>";
                }
            } else {
                echo "<script type='text/javascript'>";
                echo "alert('上傳失敗！');";
                echo "</script>";
            }
    } ?>