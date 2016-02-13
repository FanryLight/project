<?php
	class Model_Register extends Model
	{
		public function get_data()  //регистрация
		{
			$mess = "";  //сообщение об ошибке
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");  //подключение
			if (isset($_POST["submit"]))  //при нажатии кнопки Регистрации
			{
				$flag = true;  //ошибок нет
				$login = $_POST["login"];
				$password = $_POST["password"];
				$repass = $_POST["repass"];
				$mail = $_POST["mail"];
				if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['mail']))  //проверка правильности почты
				{
					$mess = $mess."Error: Wrong email adress.<br>";
					$flag = false;    //ошибка
				}
				if ($password != $repass)  //проверка совпадения паролей  
				{
					$mess = $mess."Error: Passwords don't match.<br>";
					$flag = false;     //ошибка
				}
				if (strlen($login) <= 4)
				{
					$mess = $mess."Error: Login length must be larger than 4.<br>";  //слишком короткий логин
					$flag = false;      //ошибка
				}
				if (strlen($login) >= 11)
				{
					$mess = $mess."Error: Login length must be smaller than 11.<br>";  //слишком длинный логин
					$flag = false;     //ошибка
				}
				if ($flag)
				{
					mysql_query("INSERT INTO `users` (`login`,`password`,`mail`) values ('$login','$password','$mail')") or die (mysql_error()) ;
					$mess = "Thank you for registration!";
				}

				
			}
			mysql_close($link);
			return $mess;
		}
	}
?>