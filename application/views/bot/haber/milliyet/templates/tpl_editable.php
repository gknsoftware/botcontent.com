<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Extract data
extract($GLOBALS['target']);
extract($GLOBALS['data']);

$singleData = array();
foreach ($single_title as $k => $e)
{
	//Strip selected
	$article = strip_selected_tag($single_content[0]->innertext, array( 'table', array( 'a', 'class="tag"' ) ));
	$article = remove_selected_tag($article, array( array( 'div', 'class="etiketler"' ) ));

	$cleanedtext = ( compare_option('_use_cleanedcontent', 'on') ) ? $article : $single_content[0]->innertext;

	//Encode json data
	$singleData = array (
		'title' => $e->plaintext,
		'subtitle' => $single_subtitle[0]->plaintext,
		'article' => $cleanedtext
		);
}
?>

<div class="form-group">
	<div class="input-group">
			<input type="text" name="title" class="form-control" id="title" placeholder="Başlık" id="title" value="<?php echo $singleData['title']; ?>">
		<span class="input-group-addon" tabindex="0" data-placement="left" data-toggle="popover" data-trigger="hover" data-content="Hedef siteden gelen metin başlığı.">
			<i class="fa fa-info"></i>
		</span>
	</div>
<!-- icon.form-group --> </div>
<div class="form-group">
	<?php if (compare_option('_use_richtextbox', 'on')) : ?>
		<textarea class="form-control richTextEditor" name="article" id="article"><?php echo $singleData['article']; ?></textarea>
	<?php else : ?>
		<textarea class="form-control" name="article" id="article" rows="10"><?php echo $singleData['article']; ?></textarea>
	<?php endif ?>
<!-- .form-group --> </div>

<!-- ######### KEYWORDS ######### -->
<div class="panel panel-default">
	<div class="panel-heading"><strong>YAZI DETAYLARI</strong></div>
	<div class="panel-body">
		<div class="row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<input type="text" name="tags" class="form-control" id="tags" placeholder="Etiketler">
					<span class="input-group-addon" tabindex="0" data-placement="left" data-toggle="popover" data-trigger="hover" data-content="Hedef siteden gelen etiketler.">
						<i class="fa fa-info"></i>
					</span>
				</div>
			<!-- .form-group --> </div>
		</div>
	</div>
</div>


<!-- ######### METABOX ######### -->
<div class="panel panel-default">
	<div class="panel-heading"><strong>ÖZEL ALANLAR</strong></div>
	<div class="panel-body">
		<fieldset>
			<legend>ALT BAŞLIK</legend>
			<div class="row subtitle">
				<div class="form-group col-md-4">
					<label for="metabox_name">İsim</label>
					<select name="metabox_name[]" class="form-control" id="metabox_name">
						<option value="Deneme">Deneme</option>
						<option value="Deneme">Test</option>
					</select>
					<input type="text" name="metabox_name[]" class="form-control hidden" id="metabox_name" placeholder="Özel alan adı">
					<small><a href="javascript:void(0);" class="metabox_name_manual" data-metabox="subtitle">+ Kendiniz girin</a></small>
				<!-- .form-group --> </div>
				<div class="form-group col-md-8">
					<label for="metabox_value">Değer</label>
					<textarea class="form-control" name="metabox_value[]" id="metabox_value" rows="2" placeholder="Özel alan değeri"><?php echo $singleData['subtitle']; ?></textarea>
				<!-- .form-group --> </div>
			</div>
		</fieldset>
	</div>
</div>

<?php if (_is_page('bot')) : ?>
	<script src="<?php echo get_asset('js', 'tinymce/tinymce.min.js'); ?>"></script>
	<script type="text/javascript">
		$(function(){
			/*  Bootstrap
			--------------------------------------------------*/
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover({
				html : true
			});
			$('#addContent').on('hidden.bs.modal', function () {
				$('.previewContent').html('<p class="previewInfo text-center text-muted" data-padding="3em 0"></i> İçeriğin önizlemesini görmek için <u><strong>yenile</strong></u> butonunu kullanın.</p>');
			})

			/*  Variables
			--------------------------------------------------*/
			var counter_metabox = 0;

			/*  GOGO: Metabox manual enter
			--------------------------------------------------*/
			function metabox_name_manual()
			{
				var metabox = $(this).data('metabox');

				if (counter_metabox==0)
				{
					$('div.'+metabox+' .form-group select#metabox_name').addClass('hidden');
					$('div.'+metabox+' .form-group input#metabox_name').removeClass('hidden');

					$(this).html('Vazgeç');

					counter_metabox = 1;
				}
				else
				{
					$('div.'+metabox+' .form-group select#metabox_name').removeClass('hidden');
					$('div.'+metabox+' .form-group input#metabox_name').addClass('hidden');

					$('div.'+metabox+' .form-group input#metabox_name').val('');

					$(this).html('+ Kendiniz girin');

					counter_metabox = 0;
				}
			}
			$('.metabox_name_manual').on('click', metabox_name_manual);
		});

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