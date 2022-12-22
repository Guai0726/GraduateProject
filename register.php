<?php
    if (!isset($_SESSION)) session_start();

    $userName = "";
    $userNameError = "";
    $password = "";
   
   

    if (isset($_POST['register'])) {

        require_once('config.php');

        if (isset($_POST['userName']) && $_POST['userName'] != '') {

            $userName = $_POST['userName'];
            $userNameBorder = "black";

            $sqlCheck = "SELECT `username` FROM `member` WHERE `username` = '$userName'";
            $result = mysqli_query($DBConnection, $sqlCheck);

            if ($result && mysqli_num_rows($result) > 0) {

                $userName = "";
                $userNameBorder = "red";
                $userNameError = "此帳號已被使用";

            } else {

                if (isset($_POST['password']) && $_POST['password'] != '') {

                    $password = $_POST['password'];
                    $password = md5($password);
                    $passwordBorder = "black";

                    $result = mysqli_query($DBConnection, $sqlCheck);
                    if (mysqli_num_rows($result) == 0) {
                    
                        $sql = "INSERT INTO `member` (`username`, `password`) VALUE ('$userName', '$password')";
                    } else {
                        $sql = "INSERT INTO `member` (`username`, `password`) VALUE ('$userName', '$password')";
                    }

                    $result = mysqli_query($DBConnection, $sql);

                    if ($result) {

                        $userName = "";
                        $password = "";
                        echo '<script>alert("註冊成功");</script>';
                        
                    }

                } else {
                    $passwordBorder = "red";
                }

            }

        } else {
            $userNameBorder = "red";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MainPage</title>
    <link href="web_style.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" charset="utf-8"></script>
    <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>

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
            <p style="font-size: 1.9rem; font-weight: bold; margin: 5% auto">註冊</p>
            <hr>
            <form method="post" action="">
                <input type="text" name="userName" value="<?php echo $userName; ?>" placeholder="帳號 (必填) <?php echo $userNameError; ?>" style="margin: 5% 0 0 0; height: 2rem; width: 80%; border: 1px <?php echo $userNameBorder; ?> solid;">
                <input type="password" name="password" value="<?php echo $password; ?>" placeholder="密碼 (必填)" style="margin: 5% 0 0 0; height: 2rem; width: 80%; border: 1px <?php echo $passwordBorder; ?> solid;">
                <input type="submit" name="register" value="註冊" style="font-size: 1.5rem; width:80%; padding: 1%; margin: 5% auto; background-color: lightblue; border-radius: 5px;">
                <br>
                <text>其實有帳號了嗎 ? <a href="./login.php">登入</a></text>
            </form>
        </div>

    </div>
</body>
</html>