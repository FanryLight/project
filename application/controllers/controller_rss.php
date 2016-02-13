<?php
class Controller_Rss extends Controller
{
	function __construct()
	{
		$this->model = new Model_Rss();
		$this->xml = new XML();
	}
	function action_index()  //генерация вида rss страницы
	{	
		$data = $this->model->get_data();  //получение данных
		$this->xml->generate_rss($data);
	}
}
?>