<?php
if (!isset($_SESSION)) session_start();
require_once('config.php');
$datas = array();
if (isset($_SESSION['userName']) && $_SESSION['userName'] != "") {
	$userName = $_SESSION['userName'];
	$password = $_SESSION['password'];
	$passwordHash = md5($password);
	$sql = "SELECT * FROM `member` WHERE `userName` = '$userName' AND `password` = '$passwordHash'";
	$result = mysqli_query($DBConnection, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_row($result)) {
			$currency = $row[3];
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>線上遊戲交流論壇</title>
	<link href="web_style.css" rel="stylesheet" type="text/css"/>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	<script type="text/javascript" charset="utf-8"></script>
	<link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>

</head>
<a id="homen"></a>

<body>


	<div id="header">
		<div class="text">
			<img src="./image/logo.png" alt="">
		</div>
		<div class="angelblock">&nbsp;</div>

		<div class="textblock">
			<a href="#home" id="home" style="color:white;text-decoration:none;">首頁</a>
		</div>
		<div class="textblock">
			<a href="#game" id="game" style="color:white;text-decoration:none;">遊戲</a>
		</div>
		<div class="textblock">
			<a href="feedback.php" style="color:white;text-decoration:none;">意見反饋</a>
		</div>
		<?php

		if (isset($_SESSION['userName'])) {
			echo '
			<div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">
				<a href="logout.php" style="color:white;text-decoration:none;">登出</a>
			</div>';
			echo '<div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">';
			echo '<p style="color:white;text-decoration:none;">您好 ';
			echo $userName;
			echo '</p>
			</div>';

			echo '<div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">';
			echo '<p style="color:white;text-decoration:none;">您目前擁有的阿諭幣: ';
			echo $currency;
			echo '</p>
			</div>';
		} else {

			echo '<div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">
				<a href="register.php" style="color:white;text-decoration:none;">註冊</a>
			</div>
			<div style="float: right;margin-top:5%;margin-right: 1%;font-size: 1em;">
				<a href="loginpage.php" style="color:white;text-decoration:none;">登入</a>
			</div>';
		}

		?>
	</div>



	<div>
		<br>
		<div style="height: 121vh;background:white;">
			<div class="flexslider" style="width: 50%;height:50%; margin-left:25%;">
				<ul class="slides">
					<li>
						<blockquote class="twitter-tweet">
							<p lang="en" dir="ltr">Thanks to your support, Genshin Impact has won the &quot;Players&#39;
								Voice&quot; award, and was nominated for the &quot;Best Mobile Game&quot; and &quot;Best
								Ongoing&quot; categories at The Game Awards 2022!<br><br>Watch Now &gt;&gt;&gt;<a href="https://t.co/bumie95NoZ">https://t.co/bumie95NoZ</a><a href="https://twitter.com/hashtag/GenshinImpact?src=hash&amp;ref_src=twsrc%5Etfw">#GenshinImpact</a>
							</p>&mdash; Genshin Impact (@GenshinImpact) <a href="https://twitter.com/GenshinImpact/status/1601064343742865409?ref_src=twsrc%5Etfw">December
								9, 2022</a>
						</blockquote>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

					</li>
					<li>
						<div>
							<blockquote class="twitter-tweet">
								<p lang="en" dir="ltr">&quot;Akitsu Kimodameshi&quot; Event: Take Part and Obtain the
									Event-Exclusive Weapon, Toukabou Shigure (Sword)<br><br>〓Event Gameplay
									Duration〓<br>2022/12/15 10:00:00 – 2023/01/02 03:59:59<br><br>See more details
									here:<a href="https://t.co/t3DYBhz6Xy">https://t.co/t3DYBhz6Xy</a><a href="https://twitter.com/hashtag/GenshinImpact?src=hash&amp;ref_src=twsrc%5Etfw">#GenshinImpact</a>
									<a href="https://t.co/GGcxQZhJHq">pic.twitter.com/GGcxQZhJHq</a>
								</p>&mdash; Genshin
								Impact (@GenshinImpact) <a href="https://twitter.com/GenshinImpact/status/1602151260290940929?ref_src=twsrc%5Etfw">December
									12, 2022</a>
							</blockquote>
							<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>
					</li>
					<li>
						<blockquote class="twitter-tweet">
							<p lang="en" dir="ltr">It&#39;s the most wonderful time of the year in <a href="https://twitter.com/GenshinImpact?ref_src=twsrc%5Etfw">@GenshinImpact</a>!
								Seasonal events have arrived alongside two new Anemo characters: the 5-star Wanderer and
								the 4-star Faruzan. Who will you wish for first?<br><br>📲: <a href="https://t.co/IAdy6OfZSr">https://t.co/IAdy6OfZSr</a> <a href="https://t.co/wyNMKuDfqV">pic.twitter.com/wyNMKuDfqV</a></p>&mdash; App Store
							(@AppStore) <a href="https://twitter.com/AppStore/status/1600604988820099129?ref_src=twsrc%5Etfw">December
								7, 2022</a>
						</blockquote>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</li>
				</ul>
			</div>
		</div>



		</a>

		<!--~~~~下面是我加的 ~~~~-->
		<a id="gamen">
			<div id="content">
				<div>
					<table style="align:center;">
						<div class="container" style="display:inline-block;">
							<img src="image/apex.jpg" alt="apex" class="duimage" style="width:100%">
							<div class="middle">
								<div class="dutext">
									<a href="apex.php"><img src="image/APEX1.JPG" alt="test"></a>
								</div>
							</div>
						</div>
						<div class="container" style="display:inline-block;">
							<img src="image/gen.jpg" alt="apex" class="duimage" style="width:100% ">
							<div class="middle">
								<div class="dutext">
									<a href="temp.html"><img src="temp.jpg" alt="test"></a>
								</div>
							</div>
						</div>
					</table>
				</div>
			</div>
		</a>

	</div>


</body>

</html>