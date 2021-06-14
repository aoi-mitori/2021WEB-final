<?php
session_start();
include("pdoInc.php");
?>

<html>

<head>
    <title>安安安價板</title>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!--link rel=stylesheet type="text/css" href="hw4.css"-->
    <style>
        body {
            margin: 0 0 1em 0;
        }

        font {
            font-family: 'Noto Sans TC', sans-serif;
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



        #name,
        #add-board {
            padding-right: 10px;
        }

        .login {
            color: #f5e8a2;
        }

        .upp-link {
            color: #f5e8a2;
            text-decoration: none;
        }

        .container2 {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 80%;
            margin: 0 auto;
        }

        .body-table {
            /* margin-top: 20px;
            margin-left: 40px; */
            /* border: black solid 1px; */
            /* padding-top: 10px;
            padding-bottom: 10px; */
            border-spacing: 20px 40px;

        }

        .body-table tr {
            /* padding-top: 20px;
            padding-bottom: 20px; */
            /* background-color: red; */

        }

        .body-table tr td {
            font-family: 'Noto Sans TC', sans-serif;
            /* border: black solid 1px; */
            /* padding-left: 50px; */
            /* padding-right: 50px; */
            /* padding-top: 30px; */
            /* padding-bottom: 30px; */

            text-align: center;
        }

        .body-table tr .board-td {
            padding-right: 25px;
            border-right: 5px #9CA2AB solid;
        }

        .body-table tr td .board-title {
            display: flex;
            width: 200px;
            height: 80px;
            font-size: 32px;
            align-items: center;
            justify-content: center;
            /* background-color: #0D3B66; */
            /* border: 1px solid black; */
            border-radius: 10px;
            background: #0D3B66;
            color: #F9F6F0;
        }

        .body-table tr td .board-title a {
            font-size: 32px;
            text-decoration: none;
            color: #F9F6F0;
        }

        .body-table tr td .board-discription {
            display: flex;
            width: 580px;
            height: 80px;
            font-size: 24px;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            border-color: #0D3B66;
            border-radius: 10px;
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
        
        
        .text{
            position: absolute;
            font-size: 2.3vmin;
            line-height: 2.25vmin;    
            color: #000000;        
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

<body bgcolor="#F9F6F0">
    <header id="header">
        <a href="index.php"><img src="./photos/images/logo.png" style="position:relative; width: 20%;left: 2.5%;top: 15%;"/></a>
        
         
        <?php if(isset($_SESSION['account']) && $_SESSION['account'] != null){ ?>
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
        <?php }else{ ?>
        <a href="register.php"><img src="./photos/images/register.png" style="position:absolute;width:8%;left:83%;
top:15%;"/></a>    
        <a href="login.php"><img src="./photos/images/login.png" style="position:absolute;width:8%;left:83%;
top:55%;"/></a>     
    
<?php } ?>
        
    </header>
<br><br><br><br><br><br>

    <!-- <div class="container2">
        <table class="body-table">
            <tr>
                <td class="board-td">
                    <div class="board-title">
                        <a href="">就可版</a>

                    </div>
                </td>
                <td>
                    <div class="board-discription">
                        來分享笑話吧
                    </div>
                </td>
            </tr>
            <tr>
                <td class="board-td">
                    <div class="board-title">
                        八卦版
                    </div>

                </td>
                <td>
                    <div class="board-discription">
                        閒聊
                    </div>

                </td>
            </tr>
            <tr>
                <td class="board-td">
                    <div class="board-title">
                        西洽版
                    </div>

                </td>
                <td>
                    <div class="board-discription">
                        Anime, Comic, Games
                    </div>
                </td>
            </tr>
        </table>
    </div> -->
    <div class="container2">
        <table class="body-table">
            <?php
            $sth = $dbh->query('SELECT * from my_board ORDER BY id');
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) { //顯示看板
                // echo '<tr><td class="board-td"> <font><a class="link" href="viewBoard.php?id=' . $row['id'] . '">' . $row['name'] . '</a></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                // echo ' <font> ' . $row['description'] . '</font></td></tr>';
                echo '<tr><td class="board-td"> <div class="board-title"><a class="link" href="viewBoard.php?id=' . $row['id'] . '">' . $row['name'] . '</a></div></td>';
                echo ' <td><div class="board-discription"> ' . $row['description'] . '</div></td></tr>';
            }
            ?>
        </table>
    </div>

</body>

</html>