<html>
	<head>
		<meta charset="utf-8">
		<title>How to train your dragon</title>
		<link rel="stylesheet" type="text/css" href="/style.css">
		
		<script type="text/javascript" src="\jquery.js"></script>
		<script type="text/javascript" src="\ajax.js"></script>
	</head>
	<body id = "Bodybild">
		<div id = "Head">
			<div id = "Menu">
				<li class = "shed"><a ></a></li>
				<li><a class="menu" href = "/main">Main</a></li>
				<li><a class="menu" href = "/section/dragon">Dragons</a></li>
				<li><a class="menu" href = "/section/viking">Vikings</a></li>
				<li><a class="menu" href = "/contact">Contact</a></li>
				<li><a class="menu" href = "/review//?page=1">Review</a></li>
				<li class = "shed"><a></a></li>
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
				include 'application/views/'.$content_view;
				?>
			</div>	
		</div>
	</body>
	<div id = "footer">
		Made by Svitlana Medoeva, IS-32. Kyiv 2015.    
		<a id="rss" href="/rss" title="RSS"><img src="/img/rss.png" width="30"></a>
	</div>
</html>