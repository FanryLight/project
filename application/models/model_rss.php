<?php
	class Model_RSS extends Model
	{
		public function get_data() 
		{	
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");  //подключение к бд
			session_start();
			$access = (isset($_SESSION['lvl_access'])) ? $_SESSION['lvl_access'] : 3;  //определение уровня доступа
			$result = mysql_query("SELECT * FROM pages WHERE access>=$access AND checked=1") or die("Query failed : " . mysql_error());  //информация о статьях
			$data = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($result))  //перевод в массив
			{
				$data[$i++] = array('name' => $row['name'], 'author' => $row['author'], 'text' => $row['text'], 'time' => $row['time']);				
			}
			mysql_free_result($result);
			mysql_close($link);
					
			return $data;
		}
		
	}
	
?>