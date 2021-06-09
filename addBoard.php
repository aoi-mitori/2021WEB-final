<?php
session_start();
include("pdoInc.php");

if($_SESSION['is_admin']!=1){//not admin
    die('<meta http-equiv=REFRESH CONTENT=0;url=./index.php>');
}
$resultStr = '';
$resultStr1 = '';
$resultStr2 = '';

if(isset($_POST['name']) && $_SESSION['is_admin']==1){
    if($_POST['name']!=NULL){
            $sth = $dbh->prepare('SELECT name FROM my_board WHERE name = ? ');
            $sth->execute(array($_POST['name']));
            if($sth->rowCount() !=0){ //看板已存在
                $resultStr ="此看板已經存在";
            }
            else{
                $sth = $dbh->prepare('INSERT INTO my_board (name, description  ) VALUES (?, ?)');
                $sth->execute(array($_POST['name'], $_POST['description']));
                $resultStr1 ="看板新增成功";
            }      
        
}else{
    $resultStr2 = "看板名稱請勿空白";}
}
?>
 
<html>
<head>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
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
.link:hover{
    text-decoration:underline;
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
.submit1{
    position: relative;
    top: 6px;
    left:197px; 
    margin-bottom: 10px;
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
.container4{
    margin-top: 30px ;
    margin-left: 30px;
}
.container5{
    margin-top: 30px ;
    margin-left: 35px;
    margin-right: 30px;
}
.zi_hr_01 {
    border-width: 0;
    height: 30px;
    background-image: url("./line2.png");
    background-repeat: repeat-x;
}
.hr_02{
    border-width: 0;
    border-bottom:1px #5f5f5f dashed;
}
.title-link{
    color: #6F3381;
    font-size: 20px;
    text-decoration:none;
    font-weight:bold;
}
.title-link:hover{
    text-decoration:underline;
}
.tex{
    font-size: 14px;
}
.text-big{
    font-size: 27px;
}
.container6{
    margin-top:30px;
    text-align:left;
    padding-left:200px;
}
.submit3{
    position: relative;
    left:210px; 
}
.result3{
    color:red;
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
                                    echo "<td><a class=\"up-link\" href=\"./index.php\">返回看板列表</a></td>";
                                    if(isset($_SESSION['account']) && $_SESSION['account'] != null){
                                        
                                        echo "<td class=\"login\"  ><a class=\"upp-link\" href=\"./admin.php\" id=\"name\"><font>Hi, ".$_SESSION['account']." (".htmlspecialchars($_SESSION['nickname']).")</font></a></td>"; 
                                        echo "<td style=\"color:#f7efc1; \"><i class=\"far fa-smile\"></i>";
                                        $sth = $dbh->prepare('SELECT point from user where account = ?');
                                        $sth->execute(array($_SESSION['account']));
                                        $row = $sth->fetch(PDO::FETCH_ASSOC);
                                        echo "&nbsp&nbsp&nbsp".$row['point']."</td>";
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
 
<div class="container6" >
<?php echo "<font class=\"result1\" >".$resultStr1."</font>";?><br>
<form action="addBoard.php" method="post">
    <font class="text">看板名稱：</font><input name="name"><br><br>
    <?php echo "<font class=\"result1\" >".$resultStr2."</font>";?><br>
    <?php echo "<font class=\"result1\" >".$resultStr."</font>";?><br>
    <font class="text">看板說明：</font><textarea name="description"></textarea><br>
    <input class="submit1" type="submit"><br>
</form>
</div>
 
</body></html>
