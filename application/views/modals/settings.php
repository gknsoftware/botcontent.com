<!-- Modal -->
<div class="modal fade" id="settingsModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><strong><?php echo $this->lang->line('lang_modaltitle_settings'); ?></strong></h4>
		<!-- //modal-header --> </div>

		<div class="modal-body">
			<div class="modal-body-content">
			  
			  	<form id="form-updateSettings" method="post">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab-general" data-toggle="tab">Sistem</a></li>
					<li><a href="#tab-bot" data-toggle="tab">Bot</a></li>
					<li><a href="#tab-customization" data-toggle="tab">Özgünleştirme</a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane fade active in" id="tab-general">
						<div class="form-group col-md-12 no-border">
							<label for="select" class="control-label">Tema değiştirin</label>
							<select class="form-control selectTheme">
								<option value="cerulean">Cerulean</option>
								<option value="cosmo">Cosmo</option>
								<option value="flatly">Flatly</option>
								<option value="journal">Journal</option>
								<option value="lumen">Lumen</option>
								<option value="paper">Paper</option>
								<option value="readable">Readable</option>
								<option value="sandstone">Sandstone</option>
								<option value="simplex">Simplex</option>
								<option value="spacelab">Spacelab</option>
								<option value="united">United</option>
							</select>
						</div>
						<div class="form-group col-md-12">
							<label for="select" class="control-label">Varsayılan website</label>
							<select class="form-control" name="select_website">
								<?php echo all_user_sites('site_url', '<option>', '</option>', '<option selected>'); ?>
							</select>
						</div>
						<div class="form-group col-md-12">
							<div class="pull-left">
								<label for="select" class="control-label">Zengin metin editörü kullanılsın mı?</label>
								<p><small>Getirilen içerikleri kolayca düzenlemenizi sağlar.</small></p>
							</div>
							<div class="pull-right"><input type="checkbox" name="opt_richtextbox" id="switch" data-on-color="success" data-off-color="danger" <?php echo _check_switch(get_option('_use_richtextbox')); ?> /></div>
						</div>
				    <!-- .tab-pane --> </div>

					<div class="tab-pane fade" id="tab-bot">
						<div class="form-group col-md-12">
							<div class="pull-left">
								<label for="select" class="control-label">Hedef sitedeki resimler indirilsin mi?</label>
								<p><small>Karşıdan gelen resimlerin sunucunuza kaydedilmesi.</small></p>
							</div>
							<div class="pull-right"><input type="checkbox" id="switch" name="opt_downloadimage" data-on-color="success" data-off-color="danger" <?php echo _check_switch(get_option('_use_downloadimage')); ?> /></div>
						</div>
						<div class="form-group col-md-12">
							<div class="pull-left">
								<label for="select" class="control-label">İçerikler temizlensin mi?</label>
								<p><small><i class="fa fa-info-circle" data-toggle="tooltip" data-placement="right" title="Hedef sitenin reklamları, linkleri..."></i> Hedef içeriğe ait etiket, link vs. otomatik olarak temizler.</small></p>
							</div>
							<div class="pull-right"><input type="checkbox" id="switch" name="opt_cleanedcontent" data-on-color="success" data-off-color="danger" <?php echo _check_switch(get_option('_use_cleanedcontent')); ?> /></div>
						</div>
					<!-- .tab-pane --> </div>

					<div class="tab-pane fade" id="tab-customization">
						<div class="form-group no-border" style="padding-bottom:0">
							<label for="select" class="control-label">Kelime/cümle kalıpları</label>
						</div>
						<div class="form-group multiple-form-group input-group no-padding no-border">
							<input type="text" name="text_findkeywords[]" class="form-control inline-element" placeholder="Bul">
							<input type="text" name="text_replacekeywords[]" class="form-control inline-element replacekeywords" placeholder="Değiştir">
							<span class="input-group-btn">
								<button type="button" class="btn btn-success btn-add">+</button>
							</span>
						</div>
						
						<table class="table table-hover table-ozgunlestirme">
							<thead>
								<tr>
									<th>Bul</th>
									<th>Değiştir</th>
									<th>İşlem</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach (get_option_by_group('replaced_keywords') as $key => $value) :
									$expKeywords = explode('|', $value->option_value); ?>

									<tr id="row-<?php echo $value->option_id; ?>">
										<td><?php echo trim($expKeywords[0]); ?></td>
										<td><?php echo trim($expKeywords[1]); ?></td>
										<td><a href="javascript:void(0);" class="btn btn-danger btn-xs deleteSettings" 
										data-option="<?php echo $value->option_name; ?>"
										data-id="<?php echo $value->option_id; ?>">Kaldır</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<!-- .tab-pane --> </div>
				<!-- .tab-content --> </div>
				</form>

			<!-- .modal-body-content --> </div>
		<!-- .modal-body --> </div>

		<div class="clearfix"></div>

		<div class="modal-footer">
			<div class="saveChanges hidden autohide text-left pull-left text-success" data-padding="12px 0 0 0"> <!-- Success message! --></div>

			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_close'); ?></button>
			<button type="button" class="btn btn-primary" id="updateSettings" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_save'); ?></button>
		<!-- .modal-footer --> </div>
    <!-- .modal-content --> </div>
    
  </div>
</div>