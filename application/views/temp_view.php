<html>
	<head>
		<meta charset="utf-8">
		<title>How to train your dragon</title>
		<link rel="stylesheet" type="text/css" href="/style.css">
	</head>
	
	<body id = "Bodybild">
	
		<div id = "Head">
		<div class="lang">
	<a href="/main/en" title="English"><img src="/img/en.png" width="30"></a>
	<a href="/main/ua" title="Ukrainian"><img src="/img/ua.png" width="30"></a>
	</div>
			<div id = "Menu">
				<li id = "shed"><a ></a></li>
				<li><a href = "/main">Main</a></li>
				<li><a href = "/section/dragon">Dragons</a></li>
				<li><a href = "/section/viking">Vikings</a></li>
				<li><a href = "/contact">Contact</a></li>
				<li><a href = "/review//?page=1">Review</a></li>
				<li id = "shed"><a ></a></li>
			</div>
		</div>
		<div id = "Cloud">
		<div id = "Entrance">
		<?php
		if (!defined('SID'))
			session_start();
		if (isset($_SESSION['authorized']) AND  $_SESSION['authorized']== 1) 
		{
			$user_name = $_SESSION['user_name'];
			echo '<b>Welcome,</b> '.$user_name.'!<br>';
			if ($_SESSION['lvl_access'] == 1 or $_SESSION['lvl_access'] == 2)
				echo '<a href="/controlpanel/articles"><b>Control Panel</b></a><br>';
			echo '<a href="/profile/user/?name='.$user_name.'"><b>Profile</b></a><br>';
			echo '<a href="/out"><b>Logout</b></a>';
		}
		else 
		echo "<b><a href=\"/login\">Login</a> <br>
		<a href=\"/register\">Register</a></b>";
		?>
		</div>
		</div>
		<div id = "boddy">
			<div id = "text">	
				<?php
				$temp = fopen ("temp.txt", "r");
				echo fread($temp, 1024);
				fclose($temp);
				unlink('temp.txt');
				?>

			</div>	
		</div>
	</body>
	<div id = "footer">
		Made by Svitlana Medoeva, IS-32. Kyiv 2015.    
		<a id="rss" href="/rss" title="RSS"><img src="/img/rss.png" width="30"></a>
	</div>
</html>