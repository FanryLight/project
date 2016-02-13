<?php
class Controller_Out extends Controller
{
	
	function action_index()  //выход из аккаунта
	{
		session_start();
		$_SESSION['authorized'] = 0;
		session_destroy();
		header("Location: http://".$_SERVER['HTTP_HOST']."/main");
	}
}
?>