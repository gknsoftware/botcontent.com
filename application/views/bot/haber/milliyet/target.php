<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Element attributes
$GLOBALS['data'] = array(
	'original' => 'data-original'
	);


if ($single)
{
	//Find to elements
	$GLOBALS['target'] = array(
		'single_title' => $single->find('div[class=detayTop] h1'),
		'single_subtitle' => $single->find('div[class=detayTop] h2'),
		'single_content' => $single->find('div[class=content]'),
		'single_images' => $single->find('div[itemscope] img'),
		'single_tags' => $single->find('[class=etiketler] a')
		);
}
else
{
	if ( $this->model_bot->get_subcat_diff($subcat) == 1 )
	{
		//Find tags
		$GLOBALS['target'] = array(
			'title' => $home->find('[class=ver] a strong'),
			'subtitle' => $home->find('[class=ver] a span'),
			'link' => $home->find('[class=ver] li a[target]')
			);
	}
	else
	{
		//Find tags
		$GLOBALS['target'] = array(
			'title' => $home->find('[class=list listVer] a strong'),
			'subtitle' => $home->find('[class=list listVer] a span'),
			'link' => $home->find('[class=list listVer] li a[target]')
			);
	}
}
?>