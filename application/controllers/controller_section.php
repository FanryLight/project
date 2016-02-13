<?php
	class Controller_Section extends Controller
	{

		function __construct()
		{
			$this->model = new Model_Section();
			$this->view = new View();
		}
		
		function action_dragon()   //генерация страницы со стписком статей про драконов
		{
			if (isset($_POST['Sub_Sort']))   //сортировка
			{
				$order = $_POST['sort'];
			}
			else $order = "id";
			$data = $this->model->get_data($order, "dragon");  //получение информации о статьях
			$this->view->generate('section_view.php', 'template_view.php',$data); 
			
		}
		function action_viking()  //генерация страницы со стписком статей про викингов
		{
			if (isset($_POST['Sub_Sort']))  //сортировка
			{
				$order = $_POST['sort'];
			}
			else $order = "id";
			$data = $this->model->get_data($order, "viking");  //получение информации о статьях
			$this->view->generate('section_view.php', 'template_view.php',$data); 
		}
		
		function ajax_dragon()
		{
			$order = "id";
			$data = $this->model->get_data($order, "dragon");  //получение информации о статьях
			$this->view->generate_ajax('section_view.php', $data); 
		}
		function ajax_viking()  //генерация страницы со стписком статей про викингов
		{
			$order = "id";
			$data = $this->model->get_data($order, "viking");  //получение информации о статьях
			$this->view->generate_ajax('section_view.php', $data);
		}
		
	}
?>