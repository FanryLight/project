<?php
	class Controller_Ajax extends Controller
	{
		function action_index()
		{
			$url = $_POST['url'];
			
			
			$controller_name = 'Main';
			$action_name = 'index';
			$routes = explode('/', $url);
			
			if ( !empty($routes[3]) )
			{	
				$controller_name = $routes[3];
			}
			
			if ( !empty($routes[4]) )
			{
				$action_name = $routes[4];
			}

			$model_name = 'Model_'.$controller_name;
			$controller_name = 'Controller_'.$controller_name;
			$action_name = 'ajax_'.$action_name;

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
			
			
			$controller = new $controller_name;
			$action = $action_name;
			
			if(method_exists($controller, $action))
			{
				$controller->$action();
			}
			
			
		}
	}
?>