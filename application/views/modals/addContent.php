<!-- Modal -->
<div class="modal fade" id="addContent" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><strong>Sitenize ekleyin</strong></h4>
			<!-- //modal-header --> </div>
			
			<form id="form-addNewContent" method="post" action="<?php echo get_option('_def_website'); ?>/bototi-client.php?action=insert">
			<input type="hidden" name="token" value="<?php echo md5('test'); ?>">
			<input type="hidden" name="defCategory" value="<?php echo get_option('_def_website_'.do_hash(get_option('_def_website')).'_category'); ?>">
			<div class="modal-body">

				<div class="modal-body-content">
					<div class="col-md-12 edit-article">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#editable" data-toggle="tab">DÜZENLE</a></li>
							<li><a href="#publish" data-toggle="tab">YAYINLA</a></li>
							<li><a href="#preview" data-toggle="tab">ÖNİZLE</a></li>
						<!-- .nav-tabs --> </ul>
						<div id="botContent" class="tab-content" style="padding-top: 1.5em;">
							<div class="tab-pane fade active in" id="editable">

								<!-- Ajaxpost: Editable article area -->

							</div>
							<div class="tab-pane fade" id="metabox">

								<!-- Ajaxpost: Metabox article area -->

							</div>
							<div class="tab-pane fade" id="publish">
								<div class="form-group">
									<label for="status">Durum</label>
									<select name="status" id="status" class="form-control">
										<option value="publish">Yayınla</option>
										<option value="draft">Taslak</option>
										<option value="pending">İnceleme Bekliyor</option>
										<option value="future">Zamanla</option>
									</select>
								</div>
								<div class="form-group hidden" id="futureDiv">
									<label for="status">Zamanlayın</label>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-addon" data-toggle="tooltip" data-placement="top" title="Gün"><i class="fa fa-calendar"></i></div>
												<select name="dateDay" class="form-control datePart">
													<?php
													for($i=1;$i<=31;$i++) {
														$i = first_zero($i);
														if ($i == date('d')) {
															echo '<option value="'.$i.'" selected>'.$i.'</option>';
														}else{
															echo '<option value="'.$i.'">'.$i.'</option>';
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-addon" data-toggle="tooltip" data-placement="top" title="Ay"><i class="fa fa-calendar"></i></div>
												<select name="dateMonth" class="form-control datePart">
													<?php
													for($i=1;$i<=12;$i++) {
														$i = first_zero($i);
														if ($i == date('m')) {
															echo '<option value="'.$i.'" selected>'.replace_month($i).'</option>';
														}else{
															echo '<option value="'.$i.'">'.replace_month($i).'</option>';
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-addon" data-toggle="tooltip" data-placement="top" title="Yıl"><i class="fa fa-calendar"></i></div>
												<select name="dateYear" class="form-control datePart">
													<?php
													for($i=date('Y');$i<=2030;$i++) {
														if ($i == date('d')) {
															echo '<option value="'.$i.'" selected>'.$i.'</option>';
														}else{
															echo '<option value="'.$i.'">'.$i.'</option>';
														}
													}
													?>
												</select>
											</div>
										</div>
									<!-- .row --> </div>
									<div class="clearfix"></div>
									<div class="row">
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-addon" data-toggle="tooltip" data-placement="top" title="Saat"><i class="fa fa-clock-o"></i></div>
												<select name="timeHour" class="form-control datePart">
													<?php
													for($i=0;$i<=23;$i++) {
														$i = first_zero($i);
														if ($i == date('G')) {
															echo '<option value="'.$i.'" selected>'.$i.'</option>';
														}else{
															echo '<option value="'.$i.'">'.$i.'</option>';
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="input-group">
												<div class="input-group-addon" data-toggle="tooltip" data-placement="top" title="Dakika"><i class="fa fa-clock-o"></i></div>
												<select name="timeMinute" class="form-control datePart">
													<?php
													for($i=0;$i<=59;$i++) {
														$i = first_zero($i);
														if ($i == date('i')) {
															echo '<option value="'.$i.'" selected>'.$i.'</option>';
														}else{
															echo '<option value="'.$i.'">'.$i.'</option>';
														}
													}
													?>
												</select>
											</div>
										</div>
									<!-- .row --> </div>
									<input type="hidden" name="timeSecond" value="<?php echo date('s'); ?>">
									<div class="clearfix" style="padding-bottom: .2em;"></div>
									<small><i class="fa fa-info-circle"></i> Geçerli olması için durumu "Zamanla" olarak seçmeniz gerekiyor.</small>
								</div>
								<div class="form-group">
									<label for="author">Yazar</label>
									<select name="author" class="form-control">
										<?php
										$authorList = get_remote_site_data(get_option('_def_website'),null,'authors','id');
										foreach ($authorList as $key => $value)
										{
											$author = get_remote_site_data(get_option('_def_website'),null,'authors','name');

											if(get_option('_def_website_'.do_hash(get_option('_def_website')).'_author') == $value) {
												echo '<option value="'.$value.'" selected>'.$author[$key].' (varsayılan)</option>';
											}else{
												echo '<option value="'.$value.'">'.$author[$key].'</option>';
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="categories">Eklenecek kategori</label>
									<div class="checkbox" data-margin="0 0 0 1em">
										<?php
										$categories = get_remote_site_data(get_option('_def_website'),null,'categories','id');
										foreach ($categories as $key => $value)
										{
											$catName = get_remote_site_data(get_option('_def_website'),null,'categories','name');

											echo '
											<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
												<label><input type="checkbox" name="category[]" value="'.$value.'"> '.$catName[$key].'</label>
											</div>';
										}
										?>
									</div>
									<p class="text-info"><small>* Eğer hiç kategori seçmezseniz varsayılan kategoriye eklenecek.</small></p>
								</div>
							<!-- #publish --> </div>
							<div class="tab-pane fade" id="preview">
								<ul class="previewMenu">
									<li><a href="javascript:void(0);" class="refresh button btn btn-primary btn-sm"><i class="fa fa-refresh"></i> YENİLE</a></li>
									<li><a href="javascript:void(0);" class="replaceWords btn btn-primary btn-sm" data-find-words='<?php echo json_encode($findWords,JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>' data-replace-words='<?php echo json_encode($replaceWords,JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>' data-replace-words-highlights='<?php echo json_encode($replaceWordsHighlights,JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>'><i class="fa fa-exchange"></i> ÖZGÜNLEŞTİR</a></li>
									<li><a href="javascript:void(0);" class="undoWords btn btn-primary btn-sm" data-find-words='<?php echo json_encode($findWords,JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>' data-replace-words='<?php echo json_encode($replaceWords,JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP); ?>'><i class="fa fa-undo"></i> GERİ AL</a></li>
								</ul>
								<div class="previewContent" data-padding="2em 0">
									<p class="previewInfo text-center text-muted" data-padding="3em 0"></i> İçeriğin önizlemesini görmek için <u><strong>yenile</strong></u> butonunu kullanın.</p>
								<!-- .preview --></div>
							<!-- #preview --> </div>
						<!-- .tab-content --> </div>
					<!-- .edit-article --> </div>
				<!-- .modal-body-content --> </div>

			<!-- //modal-body --> </div>
			<div class="clearfix"></div>
			<div class="modal-footer">
				<div class="pull-left">&nbsp;</div>
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('lang_btn_close'); ?></button>
				<button type="button" class="btn btn-primary addReposity"><?php echo $this->lang->line('lang_btn_addreposity'); ?></button>
				<button type="submit" class="btn btn-primary addTargetSite" id="formvalid" data-form="addNewContent"><?php echo $this->lang->line('lang_btn_add'); ?></button>
			<!-- //modal-footer --> </div>
			</form>
		<!-- //modal-content --> </div>

	</div>
</div>