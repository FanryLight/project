<?php
class Controller_Review extends Controller
{
	function __construct()
	{
		$this->model = new Model_Review();
		$this->view = new View();
	}
	
	function action_index()   //генерация страницы с отзывами посетителей
	{
		$data = $this->model->get_data();    //информация о отзывах
		$pages = $this->model->get_pages();		//количество страниц
		$this->view->generate('review_view.php', 'template_view.php', $data, $pages);
	}
	
	function ajax_index()
	{
		
		$data = $this->model->get_data();    //информация о отзывах
		$pages = $this->model->get_pages();		//количество страниц
		$this->view->generate_ajax('review_view.php', $data, $pages);
	}
	
}
?>