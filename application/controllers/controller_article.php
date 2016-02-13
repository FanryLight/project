<?php
class Controller_Article extends Controller
{
	
	function __construct()
	{
		$this->model = new Model_Article();
		$this->view = new View();
		$this->xml = new XML();
	}
	
	function action_show_article($name)  //страница со статьей
	{
		if (isset($_POST['submit']))
			$this->model->save_comment($name);  //сохранение комментария
		$data = $this->model->get_data($name);  //информация о статье
		$comments = $this->model->get_comments($name);   //информация о комментариях
		$this->view->generate('article_view.php', 'template_view.php', $data, $comments);  	
	}
	
	function action_show_xml($name)  //генерация статьи в xml формате
	{
		$data = $this->model->get_data($name);  //информация о статье
		$this->xml->generate($data);
	}

}
?>