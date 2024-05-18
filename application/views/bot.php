<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');

$findWords = array();
$replaceWords = array();
$replaceWordsHighlights = array();

foreach (get_option_by_group('replaced_keywords') as $key => $value) {
	$expKeywords = explode('|', $value->option_value);

	$findWords[] = trim($expKeywords[0]);
	$replaceWords[] = trim($expKeywords[1]);
	$replaceWordsHighlights[] = '<span style="background-color:#FFEEAD">'.trim($expKeywords[1]).'</span>';
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column column droparea">

			<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
				<strong>Heyy dostum!</strong> İçeriklerin ekleneceği varsayılan websiteni <a href="#defaultsModal" data-toggle="modal" class="alert-link"><?php echo get_option('_def_website'); ?></a> olarak ayarladın.
			</div>

			<input type="hidden" name="getCat" value="<?php echo $get_cat; ?>">
			<input type="hidden" name="getBot" value="<?php echo $get_bot; ?>">
			<input type="hidden" name="_getSubcat">
			<input type="hidden" name="_getPage">

			<div class="panel panel-default panel-control portlet">
				<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#control">Kontrol Paneli</div>
				<div class="panel-body portlet-content" id="control">
					<div class="row">
						<div class="col-md-6 options-content-list">
							<div class="col-md-12" data-margin="0" data-padding="0">
								<p><label class="label label-info">VERSION <?php echo $this->model_bot->get_bot_info($get_bot, 'bot_version'); ?></label>
								<label class="label label-info"><?php echo mb_strtoupper($this->model_bot->get_bot_info($get_bot, 'bot_name'), 'utf-8'); ?></label>
								<label class="label label-info"><?php echo parse_uri($this->model_bot->get_bot_info($get_bot, 'bot_url')); ?></label></p>
							</div>

							<div class="clearfix" data-margin="1.5em 0"></div>

							<div class="col-md-6" data-margin="0" data-padding="0">
								<div class="form-group inline-form">
									<select class="form-control selectpicker subcategory">
										<?php
										$str_SubCategories = '';
										foreach ($subcat as $key => $value)
										{
											if ( $this->model_bot->get_subcat_slug($this->model_bot->get_bot_id($get_bot)) == $value->bot_subcat_slug ) {
												$str_SubCategories .= '<option value="'.$value->bot_subcat_slug.'" selected>'.$value->bot_subcat_name.'</option>';
											}else {
												$str_SubCategories .= '<option value="'.$value->bot_subcat_slug.'">'.$value->bot_subcat_name.'</option>';
											}
											
										}

										echo $str_SubCategories; ?>
									</select>
								<!-- //subcategories --> </div>

								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="quant[1]" class="form-control input-number" id="page" placeholder="Sayfa" value="1">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								<!-- //page-number --> </div>
							</div>

							<div class="col-md-6" data-margin="0" data-padding="0 0 0 1em">
								&nbsp;
							</div>
						<!-- .options-content-list --> </div>

						<div class="col-md-6 options-edit-article">
							&nbsp;
						<!-- .options-edit-article --> </div>
					<!--.row--> </div>
				</div>
			<!-- .panel --> </div>
			
			<div class="panel panel-default panel-contentListed portlet" id="listedContent">
				<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#contentListed">Listelenen İçerikler</div>
				<div class="panel-body portlet-content" id="contentListed">
					<div class="row">
						<div class="col-md-12 hidden" id="buttonbox">
							<div class="btn-group">
								<a href="#" class="btn btn-primary">İşlemler</a>
								<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Havuza gönder</a></li>
								</ul>
							</div>
						<!-- #buttonbox --> </div>
						<div class="col-md-12" id="searchbox">
						    <form action="#" method="get">
						        <div class="input-group">
						            <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
						            <input class="form-control" id="system-search" name="q" placeholder="Başlıklar içerisinde arayın" required>
						            <span class="input-group-btn">
						                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
						            </span>
						        </div>
						    </form>
						<!-- #searchbox --> </div>
						<div class="col-md-12" id="contentlist">
							
							<div class="text-center text-muted" data-margin="2em 0">İçerikleri listelemek için yukarıdan bir <u><strong>kategori</strong></u> seçin</div>

						<!-- #contentlist --> </div>
					<!-- .row --> </div>
				</div>
				<div class="panel-footer listed-info hidden"><span class="current-cat">&nbsp;</span> kategorisinde <span class="current-page"></span> sayfada 27 içerik listelendi.</div>
			</div>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// INC: modalbox files
$this->load->view('modals/addContent.php');
$this->load->view('modals/defaultsModal.php');

// INC: layout/ly_footer.php
$this->load->view('layout/footer');
/* End of file view_customers.php */
/* Location: ./application/views/view_customers.php */ ?>