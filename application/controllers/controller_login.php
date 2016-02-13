<?php
class Controller_Login extends Controller
{
	function __construct()     //конструктор
	{
		$this->model = new Model_Login();     		//создаем объект класса Model_ControlPanel
		$this->view = new View();             	 //создаем объект класса View
	}
	
	function action_index()  //генерация вида страницы входа на сайт
	{
		$data = $this->model->login();  //проверка логина/пароля, вывод ошибок.
		
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
}
?>