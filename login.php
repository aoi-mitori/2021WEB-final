<?php
session_start();
include("pdoInc.php");
$resultStr1 = " ";
if(isset($_POST['account']) && isset($_POST['password'])){
    if($_POST['password'] != '' && $_POST['account'] != ''){
        $acc = preg_replace("/[^A-Za-z0-9]/", "", $_POST['account']);
        $pwd = preg_replace("/[^A-Za-z0-9]/", "", $_POST['password']);
        if($acc != NULL && $pwd != NULL){
            $sth = $dbh->prepare('SELECT * FROM user where account = ?');
            $sth->execute(array($acc));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            // 比對密碼
            if($row['pwd'] == md5($pwd)){
                $_SESSION['account'] = $row['account'];
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['is_admin'] = $row['is_admin'];
                //$_SESSION['point'] = $row['point'];
                echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
            }
            else{
                echo "<script type='text/javascript'>";
		        echo "alert('登入失敗，請檢查帳號及密碼');";
		        echo "</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>";
		    echo "alert('登入失敗，請檢查帳號及密碼');";
		    echo "</script>";
        }
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('請完整填寫');";
        echo "</script>";
    }
}
?>


<html>
<head>
<meta name=”viewport” content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>    
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
top: 16%;     
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
height: 42%;
left: 36%;
top: 35%;
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
height: 100%;
width: auto;     
}
    

        
</style>
</head>
<body>
    
    <header id="header">
        <a href="index.php"><img src="./photos/images/logo.png" style="position:relative; width: 20%;left: 2.5%;top: 15%;"/></a>
        <h1>登入</h1>
    </header>
    
    <img src="./photos/images/ICON.png" style="position:relative;width:6%;left:47%;
top:28%;;z-index:100;"/>
    <center>
        <div class="box">
            <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST">
            <div>
                <label for="username" class="text" style="top:19%;left:10%;">帳號</label>
                <input type="text" class="result" style="top:27%;" name="account">
            </div>   
            <div class="form-group">
                <label for="password" class="text" style="top:47%;left:10%;">密碼</label>
                <input type="password" class="result" style="top:55%;" name="password">
            </div>
                <Input Type="Image" class="submit" onclick="submit()" Src="./photos/images/send.png" />   
            </form>
        </div>
    </center>
    
</body>
</html>