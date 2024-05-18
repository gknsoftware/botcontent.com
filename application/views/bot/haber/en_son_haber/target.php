<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Element attributes
$GLOBALS['data'] = array(
	//Empty array
	);


if ($single)
{
	//Find to elements
	$GLOBALS['target'] = array(
		'single_title' => $single->find('h1[itemprop=name]'),
		'single_subtitle' => $single->find('h2[itemprop=description]'),
		'single_content' => $single->find('div[class=cleft detail] div[class=content] article')
		);
}
else
{
	//Find tags
	$GLOBALS['target'] = array(
		'title' => $home->find('ul[class=ui-list] a span[class=ti]'),
		'subtitle' => $home->find('ul[class=ui-list] span[class=spot]'),
		'link' => $home->find('ul[class=ui-list] a[class=link]'),
		'thumbnail' => $home->find('ul[class=ui-list] a span[class=imgwrap] img')
		);
}
?>