<?php
	class Model_Review extends Model
	{
		public function get_pages()  //количество страниц
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());   //подключение
			mysql_select_db("site") or die("Could not select database"); 
			$per_page = 5;    //количество отзывов на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM reviews");  //количество отзывов
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);  //количество страниц
			mysql_free_result($pages_query);
			mysql_close($link);
			return $pages;
			
		}
		public function get_data()    //информация о отзывах
		{
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			
			$per_page = 5;   //количество отзывов на страницу
			$pages_query = mysql_query("SELECT COUNT('id') FROM reviews");  //количество отзывов
			$pages = ceil(mysql_result($pages_query, 0) / $per_page);   //количество страниц
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;   //данная страница
			$start = ($page - 1) * $per_page;   //начало выборки
			$query = mysql_query("SELECT * FROM reviews ORDER BY `datetime` DESC LIMIT $start, $per_page");  //информация об отзывах
			$array = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($query))  //конвертация в массив
			{
				$array[$i] = array(
				'name' => $row['name'],
				'mail' => $row['mail'],
				'date' => $row['datetime'],
				'ip' => $row['ip'],
				'answer' => $row['answer'],
				'message' => $row['message'],
				'reg' =>$row['registred']);
				$i++;
			}
			mysql_free_result($query);
			mysql_close($link);
			return $array;
		}
		
	}
?>