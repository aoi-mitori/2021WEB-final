<?php
session_start();
include("pdoInc.php");
?>
 
<html>
<head>
    <title>HW5 簡易留言板</title>
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <!--link rel=stylesheet type="text/css" href="hw4.css"--> 
    <style>
        body{
            margin: 0 0 1em 0;
        }
        font{
            font-family:Microsoft JhengHei;
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
        #name,#add-board{
            padding-right:10px;
        }
        .login{
            color: #f5e8a2;
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
                                    echo "<td><font><a class=\"up-link\" href=\"./hw5.php\">返回看板列表</a></font></td>";
                                    if($_SESSION['is_admin'] == 1){ // 管理員
                                        echo "<td><font><a class=\"up-link\" href=\"./addBoard.php\">新增看板</a></font></td>";
                                    }
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
                                        echo "<td><font><a class=\"up-link\" href=\"./edit_profile.php\">修改資料</a></font></td>";
                                        echo "<td><font><a class=\"up-link\" href=\"./logout.php\">登出</a></font></td>";
                                    }
                                    else{
                                        echo "<td><font><a class=\"up-link\" href=\"./register.php\">註冊</a></font></td> <td><font><a class=\"up-link\" href=\"./login.php\">登入</a></font></td>";
                                    }
                                ?>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="container2">
        <table class="body-table" border=0 >
            <?php
                $sth = $dbh->query('SELECT * from my_board ORDER BY id');
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    echo '<tr><td> <font><a class="link" href="viewBoard.php?id='.$row['id'].'">'.$row['name'].'</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                    echo ' <font> '.$row['description'].'</font></td></tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>