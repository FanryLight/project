<?php
class Controller_Contact extends Controller
{
	function __construct()
	{
		$this->model = new Model_Contact();
		$this->view = new View();
	}
	
	function action_index()  //генерация страницы с обратной связью
	{
		$data = $this->model->set_data();   //созранение информации, вывод ошибки
		$this->view->generate('contact_view.php', 'template_view.php', $data);
		
	}
	function ajax_index()  //генерация страницы с обратной связью
	{
		$data = $this->model->set_data();   //созранение информации, вывод ошибки
		$this->view->generate_ajax('contact_view.php', $data);
		
	}
}
?>