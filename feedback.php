<?php
if (!isset($_SESSION)) session_start();
require_once("config.php");
if (!isset($_SESSION['userName'])) {
    echo "<script>alert('請先登入!');location.href='loginpage.php';
    </script>";
}




?>


<HTML>

<HEAD>
    <meta charset="UTF-8">
    <TITLE>留言test</TITLE>
    <link href="css/feedback.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/web_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" charset="utf-8"></script>
    <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>
</HEAD>

<BODY align="center">


    <div id="header">

        <div class="text">
            <img src="./image/logo.gif" alt="">
        </div>
        <div class="angelblock">&nbsp;</div>

        <div class="textblock">
            <a href="mainpage.php" id="home" style="color:white;text-decoration:none;">首頁</a>
        </div>

        <div class="textblock">
            <a href="#game" id="game" style="color:white;text-decoration:none;">遊戲</a>
        </div>
    </div>

    <div>
        <br><br>
        <h1>留下您的意見</h1>
        <br>
    </div>
    <form action="" method="post" onsubmit="return false;">
        <INPUT TYPE="text" id="username" name="username" value="" placeholder="姓名" class="BG-Copy" size="30" />
        <INPUT TYPE="text" id="useremail" name="useremail" value="" placeholder="email" class="BG-Copy" size="30" />
        <br>
        <TEXTAREA NAME="feedback" id="feedback" ROWS="8" COLS="80" placeholder="想說啥" class="BG-Copy" style="border:2px #2f3944 solid;"></TEXTAREA>
        <br>
        <INPUT TYPE="submit" VALUE="送出" class="Base" style='text-align:"right"' onclick='processFormData();addMsg()'>
        <br><br>
    </form>
    <p>
        <IMG SRC=image/feedback.jpg width="300px">
    </p>
    <hr>
    <br>
    <CAPTION>
        <h2><strong>留言</strong></h2>
    </CAPTION>
    <br>
    <table width="800px" id='Feedback_table' >
        <tr>
            <th width="25%">留言時間</th>
            <th width="15%">姓名</th>
            <th width="20%">email</th>
            <th width="30%">意見內容</th>
            <th width="10%"></th>
        </tr>
    </table>
</BODY>

<script src="js/feedback.js"></script>

</HTML>