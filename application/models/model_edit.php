<?php
	class Model_Edit extends Model
	{
		public function get_data()  //информация о статье
		{	
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
				
			$id = $_GET['id'];
			$query = mysql_query("SELECT * FROM pages WHERE id='$id'") or die("Query failed : " . mysql_error());
			$row = mysql_fetch_assoc($query);
			$row['text'] = html_entity_decode($row['text']);
			mysql_free_result($query);
			mysql_close($link);
			return $row;
		}
		public function save()  //сохранить статью
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
				
			$id = $_GET['id'];
			$access 	= $_POST['access'];
			$checked 	= $_POST['checked'];
			$text 		= $_POST['text'];
			$icon 		= $_POST['icon'];
			$pair_item 	= $_POST['pair_item'];
			$stats 		= $_POST['stats'];
			$tag 		= $_POST['tag'];
			if ($_POST["tag"]=="dragon")
				$tag="dragon";
			else $tag="viking";
			if ($_POST["checked"]=="1")
				$checked="1";
			else $checked="0";
			if ($_POST["access"]=="1")
				$access=1;
			else if ($_POST["access"]=="2")
				$access=2;
			else $access=3;
			$query = "UPDATE pages SET name='".$_POST['name']."', icon='".htmlspecialchars($icon, ENT_QUOTES)."', text='".htmlspecialchars($text,ENT_QUOTES)."', tag='".$_POST['tag']."', access='".$_POST['access']."', pair_item='".$_POST['pair_item']."', stats='".$_POST['stats']."', checked='".$_POST['checked']."' WHERE id=".$_GET['id'];
			mysql_query($query) or die (mysql_error());
			mysql_free_result($query);
			mysql_close($link);
			header("Location: http://".$_SERVER['HTTP_HOST']."/controlpanel/articles");
		}
	}
?>