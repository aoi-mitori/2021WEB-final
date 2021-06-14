<?php
session_start();
include("pdoInc.php");
header("Cache-Control: no-cache, no-store, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: 0");
if(!isset($_SESSION['account'])){
    die('<meta http-equiv=REFRESH CONTENT=0;url=./login.php>');
}

if(isset($_POST['nickname']) && isset($_POST['password'])){
    if($_POST['nickname']!=NULL){
    $sth = $dbh->prepare('SELECT account FROM user WHERE account = ? and pwd = md5(?)');
    $sth->execute(array($_SESSION['account'], $_POST['password']));
    if($sth->rowCount() == 1){
        if($_POST['newpwd1'] != '' && $_POST['newpwd2'] != ''){
            if($_POST['newpwd1'] == $_POST['newpwd2']){
                $pattern = "/[^A-Za-z0-9]/";
                //preg_match($pattern, $_POST['newpwd1']); 
                if(preg_match($pattern, $_POST['newpwd1'])){
                    echo "<script type='text/javascript'>";
                    echo "alert('密碼請勿使用字母、數字以外的字元！');";
                    echo "</script>"; 
                }else{
                    $sth2 =  $dbh->prepare('UPDATE user SET nickname = ?, pwd = md5(?) WHERE account = ?');
                    $sth2->execute(array($_POST['nickname'], $_POST['newpwd1'], $_SESSION['account']));
                    $_SESSION['nickname'] = $_POST['nickname'];
                    echo "<script type='text/javascript'>";
                    echo "alert('修改暱稱或密碼成功');";
                    echo "location.href='index.php';";
                    echo "</script>";
                }
            }
            else {
                echo "<script type='text/javascript'>";
		        echo "alert('兩次新密碼填寫不同');";
		        echo "</script>";
            }
        }
        else {
            $sth2 =  $dbh->prepare('UPDATE user SET nickname = ? WHERE account = ?');
            $sth2->execute(array($_POST['nickname'], $_SESSION['account']));
            $_SESSION['nickname'] = $_POST['nickname'];
            echo "<script type='text/javascript'>";
		    echo "alert('修改暱稱成功');";
		    echo "location.href='index.php';";
		    echo "</script>";
        }
    }
    else {
        echo "<script type='text/javascript'>";
		echo "alert('密碼填寫錯誤');";
		echo "</script>";
    }
}
else{
    echo "<script type='text/javascript'>";
    echo "alert('暱稱請勿空白');";
    echo "</script>";
}
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<style>
      
body{
position: relative;
width: 100%;
height: 100vh;    
background-color:#F9F6F0;
font-family: Noto Sans CJK TC;
font-size: 16px;    
}

    
#header{
background-color:#0D3B66;    
position: fixed;
width: 100%;
height: 16%;
left: 0px;
top: 0px;
z-index:1000;     
}
    
    
h1{
position:absolute; 
left: 30%;
top: 15%;   
font-style: normal;
font-weight: normal;
font-size: 4.5vmin;
line-height: 100%;
color: #FFFFFF;  
}

p{
position: absolute;
left: 14%;
top: 63%;        
font-size: 2vmin;
line-height: 2.2vmin; 
color: #4B4B4B;    
}
    
.text{
position: absolute;
font-size: 2.3vmin;
line-height: 2.25vmin;    
color: #000000;        
}
      
.box{
position: absolute; 
width: 45%;
height: 55%;
left: 28%;
top: 30%;
background: #E1E1E1;
border: 1px solid #000000;
box-sizing: border-box;
border-radius: 10px;       
}
    
.submit{
position: absolute;
width: 13%;  
left: 43%;
top: 87%;
}    
    
.result{        
position: absolute;   
width: 35%;
height: 10%;
left: 58%;
background: #FFFFFF;
border: 1px solid #000000;
box-sizing: border-box;
}

.photo{
position: absolute; 
width: 40%;
height: 40%;   
}

.image-cropper{
width: 12vmin;
height: 12vmin;
position: absolute;
overflow: hidden;
background: #FFFFFF;
border-radius: 50%;
}
    
.image{
display: inline;
margin: 0 auto;
margin-left: -25%; 
height: 100%;
width: auto;     
}
    

    
</style>
</head>
<body>
    
    <header id="header">
        <a href="index.php"><img src="./photos/images/logo.png" style="position:relative; width: 20%;left: 2.5%;top: 15%;"/></a>
        <h1>修改</h1>
        <div class="text" style="color:#FFFFFF;top:25%;left:68%;">    
        <?php echo $_SESSION['nickname'] ?>   
        </div>
        <div class="text" style="color:#FFFFFF;top:55%;left:68%;">    
        積分:<?php $sth = $dbh->prepare('SELECT point from user where account = ?');
              $sth->execute(array($_SESSION['account']));
              $row = $sth->fetch(PDO::FETCH_ASSOC);
              echo "&nbsp&nbsp&nbsp".$row['point']."</td>"; ?>   
        </div>

            
        <div class="photo" style="top:13%;left:75%;">
            <div class="image-cropper"><img src="<?php if(isset($_SESSION['account'])){
                $sth = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                $sth->execute(array($_SESSION['account']));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
                    if($row['path']!=''){
                        echo $row['path'];
                    }else{
                        echo './photos/images/photo.png';}}?>" class="image"/>
            </div>
        </div>        
        <div>    
        <a href="edit_profile.php"><img src="./photos/images/edit.png" style="position:absolute;width:8%;left:83%;
top:15%;"/></a>    
        <a href="logout.php"><img src="./photos/images/logout.png" style="position:absolute;width:8%;left:83%;
top:55%;"/></a>  
        </div>     
        
    </header>
    
    <img src="./photos/images/ICON.png" style="position:relative;width:6%;left:47%;
top:24%;;z-index:100;"/>
    <center>
        <div class="box">
            <div class="text" style="color:#000000;top:15%;left:20%;">    
            <?php echo $_SESSION['account'] ?>   
            </div>
            <div class="photo" style="left: 12%;top: 24%;">
            <div class="image-cropper" style="width:22vmin;height:22vmin;"><img src="<?php if(isset($_SESSION['account'])){
                $sth = $dbh->prepare('SELECT path FROM user WHERE account = ?');
                $sth->execute(array($_SESSION['account']));
                $row = $sth->fetch(PDO::FETCH_ASSOC);
                    if($row['path']!=''){
                        echo $row['path'];
                    }else{
                        echo './photos/images/photo.png';}}?>" class="image" /></div></div>
            <p>建議使用正方形圖片</p>    
            <a href="photo.php"><img src="./photos/images/edit_photo.png" style="position:absolute; width: 18%;left: 14.5%;top: 73%;"/></a>
            
            <form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
                <div>
                <label for="nickname" class="text" style="top:20%;left:51%; ">暱稱</label>
                <input type="text" style="top:17%;" class="result" name="nickname">
                </div>
                <div>
                <label for="password" class="text" style="top:37%;left:51%; ">密碼</label>
                <input type="password" class="result" style="top:34%;" name="password">
                </div>
                <div>
                <label for="password" class="text" style="top:54%;left:46%;">修改密碼</label>
                <input type="password" class="result" style="top:51%;" name="newpwd1">
                </div>
                <div>
                <label for="password" class="text" style="top:71%;left: 46%;">確認密碼</label>
                <input type="password" class="result" style="top:68%;" name="newpwd2">
                </div>
                <Input Type="Image" class="submit" onclick="submit()" Src="./photos/images/send.png" />
            </form>

        </div>
    </center>
    
</body>
</html>


