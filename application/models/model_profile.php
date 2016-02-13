<?php
	class Model_Profile extends Model
	{
		public function get_data()  //получение информации о профиле
		{
			
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");  //подключение
			if (!defined('SID'))
				session_start();
			if (isset($_GET['name']))
			{
				$name = $_GET['name'];
				$query = mysql_query("SELECT * FROM users WHERE name='$name'");
			}
			else 
			{
				$id = $_SESSION['id'];
				$query = mysql_query("SELECT * FROM users WHERE id='$id'");
			}
			
			$row = mysql_fetch_assoc($query);
			
			mysql_close($link);
			return $row;
		}
		public function save()  //сохранение профиля
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			if (!defined('SID'))
				session_start();
			$id = $_SESSION['id'];
			$mail_access 	= $_POST['mail_access'];
			$info 	= $_POST['info'];
			$name 		= $_POST['name'];
			$avatar 	= $_POST['avatar'];
			$sex 	= $_POST['sex'];
			$age 		= $_POST['age'];
			$query = "UPDATE users SET name='$name', info='$info', mail_access='$mail_access', avatar='$avatar', sex='$sex', age='$age' WHERE id='$id'";
			mysql_query($query) or die (mysql_error());
			mysql_free_result($query);
			mysql_close($link);
			header("Location: http://".$_SERVER['HTTP_HOST']."/profile/user/?name=".$name."");
		}
		public function get_pages()   //количество страниц с сообщениями
		{ 
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			$per_page = 3;  //сообщений на страницу
			if (!defined('SID'))
				session_start();
			$name = $_SESSION['user_name'];
			$pages_query = mysql_query("SELECT COUNT('id') FROM messages WHERE user_to='$name'");
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			mysql_free_result($pages_query);
			mysql_close($link);
			return $pages;
			
		}
		public function get_messages()   //информация о сообщениях 
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			if (!defined('SID'))
				session_start();
			$name = $_SESSION['user_name'];
			$query = mysql_query("SELECT * FROM messages WHERE user_to='$name'");
			$per_page = 3;  //количество сообщений на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM messages WHERE user_to='$name'");
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;  //текущая страница
			$start = ($page - 1) * $per_page;  //начало выборки
			$query = mysql_query("SELECT * FROM messages WHERE user_to='$name' LIMIT $start, $per_page");
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))  //конвертация в массив
			{
				$array[$i] = array(
				'user_from' => $row['user_from'],
				'theme' => $row['theme'],
				'time' => $row['time'],
				'message' => $row['message']);
				$i++;
			}
			mysql_free_result($query);
			mysql_close($link);
			return $array;
			
		}
	}
?>