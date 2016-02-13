<html>
	<head>
		<meta charset="utf-8">
		<title>Control Panel - How to train your dragon</title>
		<link rel="stylesheet" type="text/css" href="/contstyle.css">
	</head>
	<body id="Bodybuild">
		<div id="cp">
			<div id="textcp">Control Panel</div>
		</div>
		<div id="Body">
		<div id="Menu">
			<center><h3>Menu</h3></center>
			<li><a href ="/controlpanel/articles">Articles</a></li>
			<br>
			<?php
				if (!defined('SID'))
					session_start();
				if ($_SESSION['lvl_access'] == 1)
					echo '<li><a href ="/controlpanel/messages">Reviews</a></li><br>';
				
			?>
			<li><a href="/controlpanel/comments">Comments</a></li>
			<br>
			<li><a href="/add">Add new article</a></li>
			<br>
			<li><a href="/main">Back to site</a></li>
			
			
		</div>
		<div id="main">
			<?php		
				include 'application/views/'.$content_view;
			?>
		</div>
		</div>
	</body>
</html>
	