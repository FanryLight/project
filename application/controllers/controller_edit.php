<?php
class Controller_Edit extends Controller
{
	function __construct()  //конструктор
	{
		$this->model = new Model_Edit();   		//создаем объект класса Model_ControlPanel
		$this->view = new View();            	 //создаем объект класса View
	}
	
	function action_index()    ////генерация вида страницы  редактирования статьи
	{
		if (isset($_POST['submit']))     //если нажата кнопка Сохранить
			$this->model->save();        //сохраняем информацию в бд
		$data = $this->model->get_data();        //информация о статье
		$this->view->generate('edit_view.php', 'controlpanel_view.php', $data);
	}
}
?>