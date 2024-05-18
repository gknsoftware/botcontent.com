<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Element attributes
$GLOBALS['data'] = array(
	//Empty array
	);


if ($single)
{
	//Find to "single" elements
	$GLOBALS['target'] = array(
		'single_title' => $single->find('h1[itemprop=headline]'),
		'single_subtitle' => $single->find('h2[itemprop=description]'),
		'single_content' => $single->find('div[itemprop=articleBody]'),
		'single_image' => $single->find('div[class=news] img[itemprop=image]'),
		'single_images' => $single->find('div[itemprop=articleBody] img')
		);
}
else
{
	//Find to "list" elements
	$GLOBALS['target'] = array(
		'title' => $home->find('ul[class=list] li strong'),
		'subtitle' => $home->find('ul[class=list] li span'),
		'link' => $home->find('ul[class=list] li span a'),
		'image' => $home->find('ul[class=list] li a img')
		);
}
?>