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
	$image = ( $link[$key]->children(0)->$original == '' ) ? $link[$key]->children(0)->src : $link[$key]->children(0)->$original;
	$image = ( $image == '' ) ? '' : '<a href="javascript:void(0);" data-toggle="popover" data-trigger="hover" data-content="<img src=\''.$image.'\' \/>"><img src="'.$image.'" class="thumbnail" width="75" /></a>';

	//Append a string variable
	$str_ContentList .= '<tr>';
	//$str_ContentList .= '<div class="thumbnail pull-left"><a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><img src="'.$image.'" /></a></div>';
	//$str_ContentList .= '<div class="article"> <a href="javascript:void(0);" class="GetArticle" data-link="'.$articlePath.'"><strong>'.$value->plaintext.'</strong></a> <p>'.$subtitle[$key]->plaintext.'</p> </div>';
	$str_ContentList .= '<td style="vertical-align:middle;"><input type="checkbox" class="checkthis" /></td>';
	$str_ContentList .= '<td style="vertical-align:middle;">'.$image.'</td>';
	$str_ContentList .= '<td style="vertical-align:middle;">'.$value->plaintext.'</td>';
	$str_ContentList .= '<td style="vertical-align:middle;"><a href="#addContent" class="btn btn-primary GetArticle" data-link="'.$articlePath.'" data-toggle="modal">Paylaş</a></td>';
	$str_ContentList .= '</tr>';
}

if (_is_page('bot')) { echo '<script src="'.get_asset("js", "bot-inner.js").'"></script>'; }
?>

<table class="table table-list-search">
	<thead>
		<tr>
			<th><input type="checkbox" id="checkall" /></th>
			<th>Resim</th>
			<th>Başlık</th>
			<th>İşlemler</th>
		</tr>
	</thead>
	<tbody>
		<?php echo $str_ContentList; ?>
	</tbody>
</table>