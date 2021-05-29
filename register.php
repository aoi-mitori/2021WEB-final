<?php
session_start();
include("pdoInc.php");

$resultStr = '';
$resultStr1= '';

if( isset($_POST['nickname']) && isset($_POST['password']) && isset($_POST['account']) ){
    if($_POST['nickname'] != '' && $_POST['password'] != '' && $_POST['account'] != ''){
        $pattern = "/[^A-Za-z0-9]/";
        //preg_match($pattern, $_POST['account']); 
        //preg_match($pattern, $_POST['password']); 
        echo $matches_account[0];
        if(preg_match($pattern, $_POST['account']) || preg_match($pattern, $_POST['password'])) $resultStr1 ="帳號密碼請勿使用字母、數字以外的字元！";
        else{
            $sth = $dbh->prepare('SELECT account FROM user WHERE account = ? ');
            $sth->execute(array($_POST['account']));
            if($sth->rowCount() !=0){ //帳號已註冊
                $resultStr ="此帳號已有人使用";
            }
            else{
                $sth = $dbh->prepare('INSERT INTO user (account, pwd, nickname  ) VALUES (?, md5(?), ?)');
                $sth->execute(array($_POST['account'], $_POST['password'],$_POST['nickname']));
                $resultStr1 ="註冊成功";
            }      
        }
    }
    else{
        $resultStr1 = "請完整填寫";
    }
}
?>


<html>
<head>
    <!--link rel=stylesheet type="text/css" href="hw4.css"--> 
    <style>
body{
    margin: 0 0 1em 0;
}
.container{
    font-size: 30px;
    background-color: #005CAF;
    margin-top: 0;
    height: 60px;   
}
.up-table{
    padding-top: 13px;
    margin-right: 30px;
    width: 100%;            
}
.up-table td{
    font-size: 20px;
}
.left-table td{
    padding-left:25px;
}
.right-table td{
    padding-right:25px;
}
.up-link{
    color:white;
    text-decoration:none;
}
.link{
    color: #113285;
    font-size: 23px;
    text-decoration:none;
}
.body-table{
    margin-top: 20px;
    margin-left: 40px;
}
.body-table td{
    padding-top: 10px; 
}
#name{
    padding-right:10px;
}
.login{
    color: #f5e8a2;
}
.text{
    color: #113285;
    font-size: 20px;
}
.container3{
    margin-top: 35px ;
}
font{
    font-family:Microsoft JhengHei;
}
a{
    font-family:Microsoft JhengHei;
}
.submit{
    position: relative;
    left:85px; 
}
.result{
    color:red;
    position: relative;
    right: 40px;
}
.result1{
    color:red;
    font-size: 23px;
}
.upp-link{
            color:#f5e8a2;
            text-decoration:none;
        }
    </style>
</head>
<body bgcolor="#d4ebfa">
<div class="container" >
        <table class="up-table" border=0>
            <tr>
                <td>
                    <div align="left">
                        <table class="left-table" border=0>
                            <tr>
                                <?php
                                    echo "<td><a class=\"up-link\" href=\"./hw5.php\">返回看板列表</a></td>";
                                    if(isset($_SESSION['account']) && $_SESSION['account'] != null){
                                        echo "<td class=\"login\"  ><a class=\"upp-link\" href=\"./admin.php\" id=\"name\"><font>Hi, ".$_SESSION['account']." (".htmlspecialchars($_SESSION['nickname']).")</font></a></td>"; 
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
                                    if(isset($_SESSION['account']) && $_SESSION['account'] != null){ //如果登入
                                        echo "<td><a class=\"up-link\" href=\"./edit_profile.php\">修改資料</a></td>";
                                        echo "<td><a class=\"up-link\" href=\"./logout.php\">登出</a></td>";
                                    }
                                    else{
                                        echo " <td><a class=\"up-link\" href=\"./login.php\">登入</a></td>";
                                    }
                                ?>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>

<center><div class="container3">
<?php echo "<font class=\"result1\">".$resultStr1."</font>";?><br><br>
<form action="<?php echo basename($_SERVER['PHP_SELF']);?>" method="POST">
    <font class="text">帳號：</font><input type="text" name="account" placeholder="必填"><br>
    <?php echo "<font class=\"result\">".$resultStr."</font>";?><br>
    <font class="text">暱稱：</font><input type="text" name="nickname" placeholder="必填"><br><br>
    <font class="text">密碼：</font><input type="password" name="password" placeholder="必填"><br>
    <br>
    <input class="submit" type="submit">
</form>
</div></center>
</body></html>