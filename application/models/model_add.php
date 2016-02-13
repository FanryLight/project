<?php
	class Model_Add extends Model
	{
		public function save()  //сохранение статьи
		{	
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			if (isset($_POST["submit"]))  //если нажато 
			{
				$access 	= $_POST['access'];
				$checked 	= $_POST['checked'];
				$text 		= $_POST['text'];
				$icon 		= $_POST['icon'];
				$pair_item 	= $_POST['pair_item'];
				$stats 		= $_POST['stats'];
				$tag 		= $_POST['tag'];
				$name       = $_POST['name'];
				if ($_POST["tag"]=="dragon")
					$tag="dragon";
				else $tag="viking";
				if ($_POST["checked"]=="1")  //проверенно
					$checked="1";
				else $checked="0";   //не провевренно
				if ($_POST["access"]=="1")   //только админ
					$access=1;
				else if ($_POST["access"]=="2")  //только зарегестрированные
					$access=2;
				else $access=3;  //все
				session_start();
				$author = $_SESSION['user_name'];
				$query = "INSERT INTO pages (`name`,`icon`,`text`,`tag`,`access`,`checked`,`author`,`pair_item`,`stats`) values ('$name','".$icon."','".htmlspecialchars($text,ENT_QUOTES)."','$tag','$access','$checked','$author','$pair_item','$stats')";   //запись информации в бд
				mysql_query($query) or die (mysql_error());
				header("Location: http://".$_SERVER['HTTP_HOST']."/controlpanel/articles");
				
			}
			mysql_close($link);
		}
		public function data() //информация для предпросмотра
		{
			$text = $_POST['text'];
			$name = 	$_POST['name'];
			$icon = 	$_POST['pair_item'];
			$stats = 	$_POST['stats'];
			$data = '<div id="article"><img src="/'.$stats.'" class="left"><center><h2><a href = "/article/'.$name.'.xml" title="Watch as XML">'.$name.'</a><br></h2></center>'.$text.'<center><br><img src="/'.$icon.'" width="600px"></center></div>';
			$fp = fopen ("temp.txt", "w");  
			fwrite($fp,$data);  
			fclose($fp);  
			
		}
		
	}
	
?>