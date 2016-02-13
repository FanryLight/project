<?php
class View
{

	function generate($content_view, $template_view, $data = null, $pages = null, $order = null)
	{
		include 'application/views/'.$template_view;
	}
	function generate_ajax($content_view, $data = null, $pages = null, $order = null)
	{
		include 'application/views/'.$content_view;
	}
	
	function show($template_view)
	{
		
		include 'application/views/'.$template_view;
		
	}
}
?>