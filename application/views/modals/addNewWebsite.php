<!-- Modal -->
<div class="modal fade" id="addNewWebsite" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">
					<a href="javascript:void(0);" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-font-color="#444"><i class="fa fa-plus-circle"></i></a>
					<strong><?php echo $this->lang->line('lang_modaltitle_addnewsite'); ?></strong>
				</h4>
			<!-- //modal-header --> </div>
			
			<form id="form-addNewSite" method="post" action="<?php echo route('site/add_new_site'); ?>" novalidate>
			<div class="modal-body">

				<div class="modal-body-content">
						<div class="form-group" data-validate="required" data-validtext="Alan boş olamaz">
							<label for="site_name">Site adı</label>
							<input type="text" class="form-control" id="site_name" name="site_name" placeholder="Benim Sitem">
							<p class="text-danger"></p>
						</div>
						<div class="form-group" data-validate="required" data-validtext="Alan boş olamaz">
							<label for="site_url">Site adresi</label>
							<input type="url" class="form-control" id="site_url" name="site_url" placeholder="www.benimsitem.com">
							<p class="text-danger"></p>
						</div>
						<div class="form-group">
							<label for="site_script">Script</label>
							<select name="site_script" class="form-control">
								<option>WordPress</option>
							</select>
						</div>
						<div class="form-group">
							<label for="site_category">Ne sitesi?</label>
							<select name="site_category" class="form-control">
								<option>Oyun</option>
								<option>Müzik</option>
								<option>Blog</option>
								<option>Kurumsal</option>
								<option>Film - Dizi</option>
							</select>
						</div>
				<!-- .modal-body-content --> </div>

			<!-- //modal-body --> </div>
			<div class="modal-footer">
				<div class="pull-left">&nbsp;</div>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_close'); ?></button>
				<button type="submit" class="btn btn-primary" id="formvalid" data-form="addNewSite"><?php echo $this->lang->line('lang_btn_save'); ?></button>
			<!-- //modal-footer --> </div>
			</form>
		<!-- //modal-content --> </div>

	</div>
</div>