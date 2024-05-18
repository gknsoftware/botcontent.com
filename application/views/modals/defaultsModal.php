<!-- Modal -->
<div class="modal fade" id="defaultsModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><strong>Varsayılan site ayarları</strong></h4>
		<!-- //modal-header --> </div>

		<div class="modal-body">
			<div class="modal-body-content">
			  
				<div class="well">
					<p class="label label-danger"><?php echo get_option('_def_website'); ?></p>
					<p>&nbsp;</p>
					<p><i class="fa fa-lightbulb-o"></i> <strong>İpucu:</strong> Varsayılan site ayarlarını(kategori, yazar, vs.) en sık kullandığınız yazar, kategori, vs. şeklinde seçerseniz, içerik eklerken sürekli seçim yapmak zorunda kalmazsınız.</p>
				</div>
				
			  	<form id="form-updateDefaults" method="post">
					<div class="form-group col-md-12 no-border">
						<label for="select" class="control-label">Varsayılan yazar</label>
						<select class="form-control" name="text_author">
							<?php
							$defaultAuthors = get_remote_site_data(get_option('_def_website'),null,'authors','id');
							foreach ($defaultAuthors as $key => $value)
							{
								$author = get_remote_site_data(get_option('_def_website'),null,'authors','name');

								if(get_option('_def_website_'.do_hash(get_option('_def_website')).'_author') == $value) {
									echo '<option value="'.$value.'" selected>'.$author[$key].'</option>';
								}else{
									echo '<option value="'.$value.'">'.$author[$key].'</option>';
								}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-12 no-border">
						<label for="select" class="control-label">Varsayılan kategoriler</label>
						<select class="form-control" name="text_category">
							<?php
							$defaultCategories = get_remote_site_data(get_option('_def_website'),null,'categories','id');
							foreach ($defaultCategories as $key => $value)
							{
								$catName = get_remote_site_data(get_option('_def_website'),null,'categories','name');
								
								if(get_option('_def_website_'.do_hash(get_option('_def_website')).'_category') == $value) {
									echo '<option value="'.$value.'" selected>'.$catName[$key].'</option>';
								}else{
									echo '<option value="'.$value.'">'.$catName[$key].'</option>';
								}
							}
							?>
						</select>
					</div>
				</form>

			<!-- .modal-body-content --> </div>
		<!-- .modal-body --> </div>

		<div class="clearfix"></div>

		<div class="modal-footer">
			<div class="saveChanges hidden autohide text-left pull-left text-success" data-padding="12px 0 0 0"> <!-- Success message! --></div>

			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_close'); ?></button>
			<button type="button" class="btn btn-primary" id="updateDefaults" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_save'); ?></button>
		<!-- .modal-footer --> </div>
    <!-- .modal-content --> </div>
    
  </div>
</div>