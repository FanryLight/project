<?php
class Controller_Profile extends Controller
{
	function __construct()   
	{
		$this->model = new Model_Profile();
		$this->view = new View();
	}

	function action_user()  //генерация вида страницы с профилем пользователя
	{
		$data = $this->model->get_data();   //получение данных профиля
		$this->view->generate('profile_view.php', 'template_view.php', $data);
	}
	function action_edit()  //изменение профиля
	{
		if (isset($_POST['submit']))
			$this->model->save();     //сохранение данных
		$data = $this->model->get_data();   //получение данных
		$this->view->generate('proedit_view.php', 'template_view.php', $data);
	}
	
	function action_mymessages()  //просмотр личныз сообщений
	{
		$data = $this->model->get_messages();  //информация о сообщениях
		$pages = $this->model->get_pages();		//колличество страниц
		$this->view->generate('mymessages_view.php', 'template_view.php', $data, $pages);
	}
}
?>