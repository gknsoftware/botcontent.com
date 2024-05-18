<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Element attributes
$GLOBALS['data'] = array(
	'original' => 'data-original'
	);


if ($single)
{
	//Find to elements "single"
	$GLOBALS['target'] = array(
		'single_title' => $single->find('h1[itemprop=headline]'),
		'single_subtitle' => $single->find('p[itemprop=description]'),
		'single_content' => $single->find('div[class=lb] div[class=detYazi cf]'),
		'single_image' => $single->find('div[class=lb] div[class=detRes] img[itemprop=image]')
		);
}
else
{
	//Find to elements "List"
	$GLOBALS['target'] = array(
		'title' => $home->find('ul[class=katListe2] li h2'),
		'subtitle' => $home->find('ul[class=katListe2] li p'),
		'link' => $home->find('ul[class=katListe2] li h2 a'),
		'thumbnail' => $home->find('ul[class=katListe2] li a img[class=lazy]')
		);
}
?>