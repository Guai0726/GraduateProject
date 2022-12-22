<?php

    if (!isset($_SESSION)) session_start();

    $userName = "";
    if (isset($_SESSION['userName']) && $_SESSION['userName'] != "") {
        $userName = $_SESSION['userName'];
    } else if (isset($_SESSION['remUserName']) && $_SESSION['remUserName'] != "") {
        $userName = $_SESSION['remUserName'];
    }
    $password = "";
    if (isset($_SESSION['password']) && $_SESSION['password'] != "") {
        $password = $_SESSION['password'];
    } else if (isset($_SESSION['remPassword']) && $_SESSION['remPassword'] != "") {
        $password = $_SESSION['remPassword'];
    }

  

    if (isset($_POST['login'])){

        $userName = $_POST['userName'];
        $password = $_POST['password'];
        unset($_SESSION['remUserName']);
        unset($_SESSION['remPassword']);

        require_once('config.php');

        if ($userName != "" && $password != "") {

            if ($_POST['remUserName']) $_SESSION['remUserName'] = $userName;
            if ($_POST['remPassword']) $_SESSION['remPassword'] = $password;
            $passwordHash = md5($password);

            $sql = "SELECT * FROM `member` WHERE `username` = '$userName' AND `password` = '$passwordHash'";
            $result = mysqli_query($DBConnection, $sql);
            var_dump($result);
            if ($result && mysqli_num_rows($result) > 0) {

                $_SESSION['userName'] = $userName;
                $_SESSION['password'] = $password;
                header("Location: ./mainpage.php");

            } else {

                $_SESSION['userName'] = "";
                $_SESSION['password'] = "";
                echo '<script>alert("帳號或密碼錯誤");</script>';

            }

        } else if ($userName == "") {
            $userNameBorder = "red";
            echo '<script>alert("尚未輸入帳號");</script>';
        } else if ($password == "") {
            if (isset($_POST['remUserName']) && $_POST['remUserName']) $_SESSION['remUserName'] = $userName;
            $passwordBorder = "red";
            echo '<script>alert("尚未輸入密碼");</script>';
        }

    } 

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MainPage</title>
    <link rel="stylesheet" href="web_style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" charset="utf-8"></script>


</head>

<body>


    <div id="header">
        <div class="text">
            <img src="./image/logo.gif" alt="">
        </div>
        <div class="angelblock">&nbsp;</div>

        <div class="textblock">
            <a href="mainpage.php" id="home" style="color:white;text-decoration:none;">首頁</a>
        </div>
        <div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">
            <a href="register.php" style="color:white;text-decoration:none;">註冊</a>
        </div>
        <div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">
            <a href="loginpage.php" style="color:white;text-decoration:none;">登入</a>
        </div>

    </div>
    <div>
    <div style="text-align: center; margin: 10vh auto; height: 50vh; width: 25vw; min-height: 460px; min-width: 360px; border: 1px black solid; background-color: white; border-radius: 10px;">
        <p style="font-size: 1.9rem; font-weight: bold; margin: 5% auto">登入</p>
        <hr>
        <form method="post" action="">
            <input type="text" name="userName" value="<?php echo $userName;?>" placeholder="帳號" style="margin: 5% 0 0 0; height: 2rem; width: 80%; border: 1px <?php echo $userNameBorder; ?> solid;">
            <input type="password" name="password" value="<?php echo $password;?>" placeholder="密碼"style="margin: 5% 0 5% 0; height: 2rem; width: 80%; border: 1px <?php echo $passwordBorder; ?> solid;">
            <br>
            <div style="text-align: left;">
                <text style="padding-left: 10%">
                    <input type="checkbox" id="remUserName" name="remUserName">記住帳號 &nbsp;
                    <input type="checkbox" id="remPassword" name="remPassword" disabled="disabled">記住密碼 &nbsp;&nbsp;&nbsp;
                    <a href="./reset.php">忘記密碼</a>
                </text>
            </div>
            <input type="submit" name="login" value="登入" style="font-size: 1.5rem; width: 80%; padding: 1%; margin: 5% auto; background-color: lightblue; border-radius: 5px;">
            <br>
            <text>還沒有帳號嗎 ? <a href="./register.php">註冊</a></text>
        </form>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
            $('#remUserName').click(function(){
                if ($('#remUserName').prop('checked'))
                    $('#remPassword').attr("disabled", false);
                else
                $('#remPassword').attr("disabled", true);
            })
        </script>
    </div>
    </div>