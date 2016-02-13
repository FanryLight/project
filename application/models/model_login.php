<?php
	class Model_Login extends Model
	{
		public function login()   //вход на сайт
		{
			$mess = "";   //сообщение об ошибке
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			if (isset($_POST["submit"]))
			{
				$login = $_POST["login"];
				$password = $_POST["password"];
				$query = "SELECT * FROM users WHERE login='$login' AND password='$password'"; 
				$res = mysql_query($query) or trigger_error(mysql_error().$query);
				if ($row = mysql_fetch_assoc($res))   //если есть такой пользователь
				{
					session_start();
					$_SESSION['user_name'] = $row['name'];
					$_SESSION['lvl_access'] = $row['lvl_access'];
					$_SESSION['authorized'] = 1;
					$_SESSION['mail'] = $row['mail'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
					header("Location: http://".$_SERVER['HTTP_HOST']."/main");
				} else $mess = "Authorization error.";
				
			}
			mysql_close($link);
			return $mess;
		}
	}
?>