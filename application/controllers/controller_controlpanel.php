<?php
class Controller_ControlPanel extends Controller
{
	function __construct()   //конструктор
	{
		$this->model = new Model_ControlPanel(); 					//создаем объект класса Model_ControlPanel
		$this->view = new View();								 //создаем объект класса View
	}
	
	function action_comments() 					//генерация вида страницы с комментариями
	{
		if (isset($_POST['delete'])) 									//если нажата кнопка "Delete"
			$this->model->delete_marked("comments"); 								
		
		
		$pages = $this->model->get_pages("comments"); 								//количество страниц	
		$data = $this->model->get_comments(); 		
		
		
		$this->view->generate('comments_view.php', 'controlpanel_view.php', $data, $pages);

	}
	
	
	function action_articles() 					//генерация вида страницы с статьями
	{
		if (isset($_POST['delete'])) 									//если нажата кнопка "Delete"
			$this->model->delete_marked("pages"); 									//удалить отмеченные статьи
		if (isset($_POST['setaccess'])) 								//если нажата кнопка "Change access"
			$this->model->set_access(); 							//задаем новый уровень доступа
		if (isset($_POST['setchecked'])) 							//если нажата кнопка "Change status"
			$this->model->set_checked(); 					//задаем новый статус
		
		$pages = $this->model->get_pages("pages"); 								//количество страниц	
		$data = $this->model->get_articles(); 		//информация о статьях
		
		
		$this->view->generate('articles_view.php', 'controlpanel_view.php', $data, $pages);

	}
	function action_messages()  		//генерация вида страницы с сообщениями
	{
		if (isset($_POST['delete'])) 						//если нажата кнопка "Delete"
			$this->model->delete_marked("messages"); 					 //удалить отмеченные сообщения
		if (isset($_POST['answer']))  							//если нажата кнопка "Аnswer" 
			$this->model->answer($_POST['id']); 				//сохранить ответ в базу данных
		
		$pages = $this->model->get_pages("messages");  			//количество страниц	
		$data = $this->model->get_reviews();  								//информация о сообщениях
		
		$this->view->generate('messages_view.php', 'controlpanel_view.php', $data, $pages);


	}
	function action_access() 								//изменение уровня доступа к статье
	{
		$this->model->change_access();
	}
	function action_checked() 								 //изменение статуса статьи
	{
		$this->model->change_checked();
	}
	
}
?>