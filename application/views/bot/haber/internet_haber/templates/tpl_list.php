<?php
extract($GLOBALS['target']);
extract($GLOBALS['data']);

//Get content list
$str_ContentList = '';
foreach ($title as $key => $value)
{
	$articlePath = parse_url($link[$key]->href);
	$articlePath = ltrim($articlePath['path'], '/');
	$articlePath = str_replace('/', '[s]', $articlePath);

	//Append a string variable
	$str_ContentList .= '<div class="list-content">';
	$str_ContentList .= '<div class="thumbnail pull-left"><a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><img src="'.$image[$key]->src.'" /></a></div>';
	$str_ContentList .= '<div class="article"> <a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><strong>'.$value->plaintext.'</strong></a> <p>'.str_replace($value->plaintext, '', $subtitle[$key]->plaintext).'</p> </div>';
	$str_ContentList .= '</div>';
}

echo $str_ContentList;
?>