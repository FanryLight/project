<?php
class Controller_Add extends Controller
{
	function __construct()
	{
		$this->model = new Model_Add();
		$this->view = new View();
	}
	
	function action_index()  //страница добавления стратьи
	{
		if (isset($_POST['submit']))
			$this->model->save();   //сохранение
		if (isset($_POST['view']))   //предпросмотр
		{
			$this->model->data();?>
			<script> 
			window.open("/add/view"); 
			</script> <?php
		}
			
		$this->view->generate('add_view.php', 'controlpanel_view.php');

	}
	function action_view()  //страница предпросмотра
	{
		$this->view->show('temp_view.php');
	}
}
?>