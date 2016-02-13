<?php
class XML
{
	public function generate($data = null)
	{
		$doc = new DOMDocument('1.0','utf-8');
		$doc->formatOutput = true;

		$article = $doc->createElement('article');
		$article = $doc->appendChild($article);

		$article -> appendChild( $doc->createElement('name', $data['name']));
		$article -> appendChild( $doc->createElement('text', $data['text']));
		$article -> appendChild( $doc->createElement('author', $data['author']));
		$article -> appendChild( $doc->createElement('time', $data['time']));

		header("Content-Type: text/xml");
		echo $doc->saveXML();
	}
	public function generate_rss($data = null)
	{
		$doc = new DOMDocument('1.0','utf-8');
		$doc->formatOutput = true;

		$articles = $doc->createElement('articles');
		$articles = $doc->appendChild($articles);
		
		$n = count($data);
		for ($i = 0; $i<$n; $i++)
		{
			$article = $doc->createElement('article');
			$article = $doc->appendChild($articles);
			
			$article -> appendChild( $doc->createElement('name', 	$data[$i]['name']));
			$article -> appendChild( $doc->createElement('link', 'localhost/article/'.$data[$i]["name"]));
			$article -> appendChild( $doc->createElement('xml_link','localhost/article/'.$data[$i]["name"].'.xml'));
			$article -> appendChild( $doc->createElement('text', 	substr($data[$i]['text'], 0, 150).'...'));
			$article -> appendChild( $doc->createElement('author', 	$data[$i]['author']));
			$article -> appendChild( $doc->createElement('time', 	$data[$i]['time']));
		}
		header("Content-Type: text/xml");
		echo $doc->saveXML();
	}
	
}
?>