<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Extract data
extract($GLOBALS['target']);
extract($GLOBALS['data']);

$singleData = array();
foreach ($single_title as $k => $e)
{
	//Strip selected
	//$article = strip_selected_tag($single_content[0]->innertext, array( 'table', array( 'a', 'class="tag"' ) ));
	//$article = remove_selected_tag($article, array( array( 'div', 'class="etiketler"' ) ));

	//Encode json data
	$singleData = array (
		'title' => $e->plaintext,
		'subtitle' => $single_subtitle[0]->plaintext,
		'article' => $single_content[0]->innertext,
		'image' => $single_image[0]->src
		);

}

if (isset($singleData['title'])) :
?>
	<div class="form-group">
		<div class="input-group">
				<input type="text" name="title" class="form-control" id="title" placeholder="Başlık" id="title" value="<?php echo $singleData['title']; ?>">
			<span class="input-group-addon" tabindex="0" data-placement="left" data-toggle="popover" data-trigger="focus" data-content="Hedef siteden gelen metin başlığı.">
				<i class="fa fa-info"></i>
			</span>
		</div>
	<!-- icon.form-group --> </div>
	<div class="form-group">
		<div class="input-group">
				<textarea class="form-control" name="subtitle" id="subtitle" rows="3" placeholder="Alt başlık"><?php echo $singleData['subtitle']; ?></textarea>
			<span class="input-group-addon" tabindex="0" data-placement="left" data-toggle="popover" data-trigger="focus" data-content="Hedef siteden gelen metin başlığı.">
				<i class="fa fa-info"></i>
			</span>
		</div>
	<!-- icon.form-group --> </div>
	<div class="form-group">
		<textarea class="form-control richTextEditor" name="article" id="article"><?php echo '<img src="'.$singleData['image'].'" />'.$singleData['article']; ?></textarea>
		<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
	<!-- .form-group --> </div>

	<?php if (_is_page('bot')) : ?>
		<script src="<?php echo get_asset('js', 'tinymce/tinymce.min.js'); ?>"></script>
		<script type="text/javascript">
			tinymce.init({
				language : 'tr',
				selector: "textarea.richTextEditor",  // change this value according to your HTML
				height: 400,
				menubar: false,
				plugins: "table,media,code,paste,advlist,link,image,preview,textcolor,colorpicker,imagetools,botcontent,fullscreen,pagebreak,visualchars,wordcount,charmap,hr,filemanager",
				toolbar1: "bold italic strikethrough | bullist numlist | alignleft aligncenter alignright | link unlink blockquote hr pagebreak ttb filemanager",
				toolbar2: "styleselect | underline alignjustify forecolor | pastetext removeformat charmap | outdent indent | image media | code preview fullscreen"
			});

			tinymce.activeEditor.theme.panel.find('#mceu_29').hide();
		</script>
	<?php endif; ?>

<?php else : ?>

	Bu içerik çeşitli sebeplerden dolayı getirilemiyor, başkasını seçin.

<?php endif; ?>