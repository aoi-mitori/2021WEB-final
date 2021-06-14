<?php
session_start();
include("pdoInc.php");

if (isset($_SESSION['account']) && $_SESSION['account'] != null) {
    header("Location: index.php");
    }
                               
if (isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['account'])) {
    if ($_POST['nickname'] != '' && $_POST['password'] != '' && $_POST['account'] != '') {
        $pattern = "/[^A-Za-z0-9]/";
        if (preg_match($pattern, $_POST['account']) || preg_match($pattern, $_POST['password'])){
            echo "<script type='text/javascript'>";
		    echo "alert('帳號密碼請勿使用字母、數字以外的字元！');";
		    echo "</script>";
        }else {
            $sth = $dbh->prepare('SELECT account FROM user WHERE account = ? ');
            $sth->execute(array($_POST['account']));
            if ($sth->rowCount() != 0) { //帳號已註冊
                echo "<script type='text/javascript'>";
		        echo "alert('此帳號已有人使用');";
		        echo "</script>";
            } else {
                $sth = $dbh->prepare('INSERT INTO user (account, pwd, nickname  ) VALUES (?, md5(?), ?)');
                $sth->execute(array($_POST['account'], $_POST['password'], $_POST['nickname']));
                echo "<script type='text/javascript'>";
		        echo "alert('註冊成功');";
		        echo "location.href='index.php';";
		        echo "</script>";
            }
        }
    } else {
         echo "<script type='text/javascript'>";
		 echo "alert('請完整填寫');";
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
    
    
h1 {
position:absolute; 
left: 30%;
top: 15%;     
font-style: normal;
font-weight: normal;
font-size: 4.5vmin;
line-height: 100%;
color: #FFFFFF;  
}

.text{
position: absolute;
font-size: 2.3vmin;
line-height: 2.25vmin;    
color: #000000;        
}    
    
.box{
position: absolute; 
width: 28%;
height: 57%;
left: 36%;
top: 30%;
background: #E1E1E1;
border: 1px solid #000000;
box-sizing: border-box;
border-radius: 10px;       
}
    
.submit{
position:absolute;
width: 21%;  
left: 40%;
top: 82%;
}       
   
.result{        
position: absolute;   
width: 80%;
height: 10%;
left: 10%;
background: #FFFFFF;
border: 1px solid #000000;
box-sizing: border-box;
}

.photo{
position: absolute;
width:18%;    
left: 15%;
top: 25%;  
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
        <h1>註冊</h1>
    </header>
    
    <img src="./photos/images/ICON.png" style="position:relative;width:6%;left:47%;
top:24%;;z-index:100;"/>
    <center>
        <div class="box">
            <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
            <div>
                <label for="username" class="text" style="top:17%;left: 10%;">帳號</label>
                <input type="text" style="top:23%;" class="result"name="account">
            </div>
            <div >
                <label for="name" class="text" style="top:38%;left: 10%;">暱稱</label>
                <input type="text" class="result" style="top:44%;" name="nickname">
            </div>    
            <div class="form-group">
                <label for="password" class="text" style="top:59%;left: 10%;">密碼</label>
                <input type="password" class="result" style="top:65%;" name="password">
            </div>
                <Input Type="Image" class="submit" onclick="submit()" Src="./photos/images/send.png" />   
            </form>
        </div>
    </center>
    
</body>
</html>