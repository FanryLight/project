<?php
	class Model_Contact extends Model
	{
		public function set_data()  //отправить отзыв
		{
			$error = "";
			$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
			if (isset($_POST["submit"]))
			{
				$flag = true;  //ошибок нет
				session_start();
				if (isset($_SESSION['user_name']))  //если пользователь залогинен
				{
					$name = $_SESSION['user_name'];
					$mail = $_SESSION['mail'];
					$reg = 1;
					echo $name;
				}
				else 
				{
					$name = $_POST["name"];
					$mail = $_POST["email"];
					echo $name;
					$reg = 0;
				}
				$message = $_POST["message"];
				
				if (strlen($message)<6)  
				{
					$flag = false;   //слишком короткое сообщение
					$error = "Error: Message length must be larger than 6.<br>"; 
				
				}
				if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $mail))  
				{
					$error = $error."Error: Wrong email adress.<br>";
					$flag = false;   //неправильный мейл
				}
				if ($flag==true)
				{
					$error =
					"Thank you for your message, $name!<br>
					We will reply you as soon as posible.";
				
					if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  //ip адресс
						$ip = $_SERVER['HTTP_CLIENT_IP'];
						} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
							$ip = $_SERVER['REMOTE_ADDR'];
						}
				
					$date = date("Y-m-d H:i:s");
					mysql_query("INSERT INTO `reviews` (`name`, `mail`,`message`,`datetime`,`ip`,`registred`) values
					('$name', '$mail', '$message', '$date', '$ip', '$reg')") or die (mysql_error());
				}
				
				
			}
			mysql_close($link);
			return $error;
		}
	}

?>