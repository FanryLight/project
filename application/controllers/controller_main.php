<?php
class Controller_Main extends Controller
{
	function action_index()   //генерация вида главной страницы
	{	
		$this->view->generate('main_view.php', 'template_view.php');
	}
	function ajax_index()   //генерация вида главной страницы
	{	
		
		$this->view->generate_ajax('main_view.php');
	}
	
}
?>