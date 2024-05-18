<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Extract data
extract($GLOBALS['target']);
extract($GLOBALS['data']);

//Get content list
$str_ContentList = '';
foreach ($title as $key => $value)
{
	$articlePath = parse_url($link[$key]->href);
	$articlePath = ltrim($articlePath['path'], '/');
	$articlePath = str_replace('/', '[s]', $articlePath);

	//Image location src or data attribute
	$image = empty($thumbnail[$key]->$original) ? $thumbnail[$key]->src : $thumbnail[$key]->$original;

	//Append a string variable
	$str_ContentList .= '<div class="list-content">';
	$str_ContentList .= '<div class="thumbnail pull-left"><a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><img src="'.$image.'" /></a></div>';
	$str_ContentList .= '<div class="article"> <a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><strong>'.$value->plaintext.'</strong></a> <p>'.$subtitle[$key]->plaintext.'</p> </div>';
	$str_ContentList .= '</div>';
}

echo $str_ContentList;
?>