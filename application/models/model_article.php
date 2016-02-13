<?php
	class Model_Article extends Model
	{
		public function get_data($name)  //информация про статью
		{	
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			
			$result = mysql_query("SELECT * FROM pages WHERE name='$name'") or die("Query failed : " . mysql_error());
			$data = mysql_fetch_assoc($result);
			mysql_free_result($result);
			mysql_close($link);
			
			return $data;
		}	
		public function get_comments($name)  //информация про комментарии
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");

			$query = mysql_query("SELECT * FROM comments WHERE article='$name'");
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))  //в массив
			{
				$array[$i] = array(
				'user' => $row['user'],
				'time' => $row['time'],
				'text' => $row['text']);
				$i++;
			}
			mysql_free_result($query);
			mysql_close($link);
			return $array;
		}
		public function save_comment($name)  //сохранить комментарии
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");

			$text = $_POST['text'];
			$article = $name;
			if (!defined('SID'))
				session_start();
			$user = $_SESSION['user_name'];
			$query = mysql_query("INSERT INTO comments (`user`,`text`,`article`) values ('$user','$text','$article')");
			
			mysql_close($link);
		}
				
	}
?>
