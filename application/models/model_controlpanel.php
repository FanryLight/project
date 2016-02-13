<?php
	class Model_ControlPanel extends Model
	{
		public function get_articles() //достаем информацию о статьях
		{	
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			//порядок статей
			if (isset($_POST['sort']))
				$order = $_POST['sort'];
			else if (isset($_GET['order']))
				$order = $_GET['order'];
			else $order = "id";
			$per_page = 3; //количество статей на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM pages"); //количество статей
			$pages = ceil(mysql_result($pages_query, 0) / $per_page); //количество страниц
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;  //номер текущей страницы
			$start = ($page - 1) * $per_page;  //id первой страницы
			$query = mysql_query("SELECT * FROM pages ORDER BY $order LIMIT $start, $per_page ");
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))
			{
				switch($row['access'])
				{
					case "1": $access = "Admin only"; break;
					case "3": $access = "Registred only"; break;
					case "4": $access = "All";break;
				};
				switch($row['checked'])
				{
					case '1': $checked = "Yes";break;
					case '0': $checked = "No";break;
				};
				$array[$i] = array(
				'name' => $row['name'],
				'id' => $row['id'],
				'time' => $row['time'],
				'author' => $row['author'],
				'access' => $access,
				'checked' => $checked);
				$i++;
			}
			mysql_free_result($query);
			mysql_free_result($pages_query);
			mysql_close($link);
			return $array;
		}	
		
		public function delete_marked($table) //удаляем отмеченное
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			
			$check = $_POST['choosed']; //отмеченные чекбоксы
			if (!empty($check))
			{
				$n = count($check);
				for ($i=0; $i<$n;$i++)
				{
					$query = "DELETE FROM $table WHERE id=".$check[$i]; //удаляем из таблицы
					mysql_query($query) or die (mysql_error());
				}
				
			}
			mysql_free_result($query);
			mysql_close($link);
		}	
		public function set_access()  //изменение доступа к статье
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			//отмеченные чекбоксы
			$check = $_POST['choosed'];
			if (!empty($check))
			{
				$n = count($check);
				for ($i=0; $i<$n;$i++)
				{
					$query = "UPDATE pages SET access='".$_POST['access']."' WHERE id=".$check[$i]; //устанавливаем новый уровень доступа
					mysql_query($query) or die (mysql_error());
				}
				
			}
			mysql_free_result($query);
			mysql_close($link);
		}
		public function set_checked() //изменить статус проверено/не проверено статьи
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			$check = $_POST['choosed']; //отмеченные чекбоксы
			if (!empty($check))
			{
				$n = count($check);
				for ($i=0; $i<$n;$i++)
				{
					$query = "UPDATE pages SET checked='".$_POST['checked']."' WHERE id=".$check[$i]; //устанавливаем новый статус
					mysql_query($query) or die (mysql_error());
				}
				
			}
			
			mysql_free_result($query);
			mysql_close($link);
		}
		public function get_pages($table)  //достаем количество страниц
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			$per_page = 3; //количество статей/сообщений на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM $table"); //количество статей/сообщений
			$pages = ceil(mysql_result($pages_query, 0) / $per_page); //количество страниц
			mysql_free_result($pages_query);
			mysql_close($link);
			return $pages;
			
		}
		public function get_reviews() //достаем информацию о сообщениях
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			//порядок сообщений
			if (isset($_POST['sort']))
				$order = $_POST['sort'];
			else if (isset($_GET['order']))
				$order = $_GET['order'];
			else $order = "id";

			$per_page = 3; //количество сообщений на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM reviews"); //количество сообщений
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1; //текущая страница
			$start = ($page - 1) * $per_page; //id первого сообщения
			$query = mysql_query("SELECT * FROM reviews ORDER BY $order LIMIT $start, $per_page ");
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))
			{
				$array[$i] = array(
				'id' => $row['id'],
				'time' => $row['datetime'],
				'name' => $row['name'],
				'mail' => $row['mail'],
				'date' => $row['datetime'],
				'ip' => $row['ip'],
				'answer' => $row['answer'],
				'message' => $row['message']);
				$i++;
			}
			mysql_free_result($query);
			mysql_close($link);
			return $array;
		}
		public function answer($id) //сохранение ответа на сообщение
		{
			
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			//сохранение ответа
			$query = "UPDATE reviews SET answer='".$_POST['text']."' WHERE id=".$id;
			mysql_query($query) or die (mysql_error());
			
			mysql_free_result($query);
			mysql_close($link);
		}
		public function change_access() //изменение доступа к статье
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			
			$id = $_GET['id']; //id статьи
			$access = mysql_query("SELECT `access` FROM pages WHERE id=$id"); //текущий уровень доступа
			$access = mysql_fetch_assoc($access);
			switch($access['access']) //изменение доступа
			{
				case "1": $access = 3; break;
				case "3": $access = 4; break;
				case "4": $access = 1; break;
			}
			$query = "UPDATE pages SET access=$access WHERE id=".$id; //обновление доступа
			
			mysql_query($query) or die (mysql_error());
			
			mysql_close($link);
			header('Location: /controlpanel/articles');
			
		}
		public function change_checked() //изменение статуса статьи проверено/не проверено
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
				
			$id = $_GET['id']; //id статьи
			$checked = mysql_query("SELECT `checked` FROM pages WHERE id=$id"); //текущий статус
			$checked = mysql_fetch_assoc($checked); 
			switch($checked['checked']) //изменение статуса
			{
				case "1": $checked = 0; break;
				case "0": $checked = 1; break;
			}
			$query = "UPDATE pages SET checked=$checked WHERE id=".$id; //обновление статуса
			
			mysql_query($query) or die (mysql_error());
			mysql_close($link);
			header('Location: /controlpanel/articles');
		}
		public function get_comments() 
		{
			//подключение к базе данных
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			//порядок комментариев
			if (isset($_POST['sort']))
				$order = $_POST['sort'];
			else if (isset($_GET['order']))
				$order = $_GET['order'];
			else $order = "id";

			$per_page = 3; //количество комментариев на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM comments"); //количество комментариев
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1; //текущая страница
			$start = ($page - 1) * $per_page; //id первого комментариев
			$query = mysql_query("SELECT * FROM comments ORDER BY $order LIMIT $start, $per_page ");
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))
			{
				$array[$i] = array(
				'id' => $row['id'],
				'article' => $row['article'],
				'user' => $row['user'],
				'time' => $row['time'],
				'text' => $row['text']);
				$i++;
			}
			mysql_free_result($query);
			mysql_close($link);
			return $array;
		}
	
	}
?>