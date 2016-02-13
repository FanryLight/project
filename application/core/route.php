<?php 
class Route
{
	
	static function start()
	{
		$controller_name = 'Main';
		$action_name = 'index';
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		if ($controller_name == "article")
		{
			$yui = explode('.', $routes[2]);
			$article_name = $yui[0];
			$type = "";
			if ( !empty($yui[1]) )
			{	
				$type = $yui[1];
			}
			$action_name = "show_article";
		}
		else
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			Route::ErrorPage404();
		}
		
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			if ($controller_name == "Controller_article" AND $type == "")
				$controller->$action($article_name);
			else
				if ($controller_name == "Controller_article" AND $type == "xml")
				{
					$action = "action_show_xml";
					
					$controller->$action($article_name);
				}
				
			else
				$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
		if($controller_name == "Controller_article" AND $type != "xml" AND $type != "")
			Route::ErrorPage404();
		
	
}
	
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}
?>