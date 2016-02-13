<?php
	class Model_Section extends Model
	{
		public function get_data($order, $tag)  
		{	
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")  //подключение к бд
				or die("Could not connect : " . mysql_error());
			mysql_select_db("site") or die("Could not select database");
			session_start(); 
			$access = (isset($_SESSION['lvl_access'])) ? $_SESSION['lvl_access'] : 4;  //проверка уровня доступа
			$result = mysql_query("SELECT `icon`, `name` FROM pages WHERE tag='".$tag."' AND access>=$access AND 
			checked=1 ORDER BY $order") or die("Query failed : " . mysql_error()); // информация о статьях
			$data = array();
			$i = 0;
			while ($row = mysql_fetch_assoc($result))
			{
				$data[$i++] = array('icon' => $row['icon'], 'name' => $row['name']);	//конвертируем в массив			
			}
			mysql_free_result($result);
			mysql_close($link);
					
			return $data;
		}	
				
	}
?>