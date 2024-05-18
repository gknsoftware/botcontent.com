<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column">

			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('lang_dashboard'); ?></a></li>
				<?php echo generate_breadcrumb(); ?>
			</ul>

			<h1 class="page-title"><?php echo page_title(2); ?></h1>
			<p class="lead"><i class="fa fa-info-circle"></i> <?php echo page_title(2,true); ?></p>

			<div class="row" data-padding="25px 0">

				<div class="col-lg-12 col-md-12 col-sm-12">
					<fieldset>
						<legend><i class="fa fa-ticket"></i> DESTEK BİLDİRİMLERİ</legend>
						
						<table class="table table-striped table-hover table-ticket">
							<thead>
							<tr>
								<th>Tarih</th>
								<th>Departman</th>
								<th>Başlık</th>
								<th>Durum</th>
								<th>Öncelik</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							foreach ($ticket_list as $k => $v) : 
								if (empty($v->response_id) || $v->response_id == 0 || $v->response_id == 1) :

									$modal_content = '<strong>Departman</strong> <p>'.$this->model_site->get_department($v->department_id).'</p><br />';
									$modal_content .= '<strong>Konu</strong> <p>'.$v->ticket_subject.'</p><br />';
									$modal_content .= '<strong>Durum</strong> <p>'.mb_strtoupper(_check_status($v->ticket_status)).'</p><br />';
									$modal_content .= '<strong>Önem</strong> <p>'.mb_strtoupper(_check_priority($v->ticket_priority)).'</p><br />';

									$response = null;
									if ($v->read == 1) {
										$status = $v->read == 1 ? 'data-font-weight="bold"' : null;
										$response = '<i class="glyphicon glyphicon-envelope blink" data-font-color="#f90"></i> <a href="#ticketModal" class="showTicket" data-id="'.$v->ticket_id.'" data-modal-content="'.$modal_content.'" data-toggle="modal" data-font-color="#444" '.$status.'>'.$v->ticket_subject.'</a>';
									}elseif ($v->read == 2) {
										$response = '<i class="glyphicon glyphicon-envelope" data-font-color="#f90"></i> <a href="#ticketModal" class="showTicket" data-id="'.$v->ticket_id.'" data-modal-content="'.$modal_content.'" data-toggle="modal" data-font-color="#444">'.$v->ticket_subject.'</a>';
									}else {
										$response = '<i class="glyphicon glyphicon-envelope"></i> '.$v->ticket_subject;
									}
								?>
								<tr>
									<td><?php echo convertdate($v->ticket_date, 'date', 'M d, Y'); ?></td>
									<td><?php echo $this->model_site->get_department($v->department_id); ?></td>
									<td><?php echo $response; ?></td>
									<td><span class="label label-<?php echo generate_label($v->ticket_status); ?>" data-width="60"><?php echo mb_strtoupper(_check_status($v->ticket_status)); ?></span></td>
									<td><span class="label label-<?php echo generate_label($v->ticket_priority); ?>" data-width="60"><?php echo mb_strtoupper(_check_priority($v->ticket_priority)); ?></span></td>
								</tr>
							<?php 
								endif;
							endforeach; ?>
							</tbody>
						</table>
					<!-- fieldset --> </fieldset>
				<!-- //extended-column --> </div>

				<div class="col-lg-6 col-md-6 col-sm-6">
					
					<fieldset>
						<legend><i class="fa fa-file"></i> DÖKÜMANLAR</legend>

						<ul class="support-documents">
							<li><i class="livicon" data-n="doc-landscape" data-c="#ccc" data-s="48"></i> <a href="#">Web sitesi nasıl oluşturulur?</a></li>
							<li><i class="livicon" data-n="image" data-c="#ccc" data-s="48"></i> <a href="#">Hazır tasarımlar nasıl kullanılır?</a></li>
							<li><i class="livicon" data-n="clapboard" data-c="#ccc" data-s="48"></i> <a href="#">Kurumsal bir web sitesinde olması gerekenen modüller?</a></li>
							<li><i class="livicon" data-n="doc-landscape" data-c="#ccc" data-s="48"></i> <a href="#">Web sitesi nasıl oluşturulur?</a></li>
							<li><i class="livicon" data-n="image" data-c="#ccc" data-s="48"></i> <a href="#">Hazır tasarımlar nasıl kullanılır?</a></li>
							<li><i class="livicon" data-n="image" data-c="#ccc" data-s="48"></i> <a href="#">Hazır tasarımlar nasıl kullanılır?</a></li>
						</ul>
					<!-- fieldset --> </fieldset>

				<!-- //left-column --> </div>

				<div class="col-lg-6 col-md-6 col-sm-6">

					<fieldset>
						<legend><i class="fa fa-life-ring"></i> DESTEK TALEBİ</legend>
						
						<div class="ticket-current-user">
							<img src="<?php echo _gravatar( $member_email, 75 ); ?>" alt="Profile Picture" class="img-rounded pull-left"> <h2 class="pull-left" data-margin="0 10px">
							<p><?php echo $member_name.'&nbsp;'.$member_surname ?></p>
							<p data-margin="5px 0"><?php echo $member_email; ?></p>
							<p data-margin="16px 0 0 0" class="text-success"><i class="fa fa-quote-left"></i> olarak oturum açtınız, bu bilgiler ile destek talebinde bulanacaksınız.</p></h2>
						</div>

						<ul class="ticket-department">
							<?php foreach ($department_list as $k => $v) : ?>
								<li data-id="<?php echo $v->department_id; ?>" data-name="<?php echo $v->department_name; ?>"><i class="fa fa-pencil"></i> <?php echo $v->department_name; ?></li>
							<?php endforeach; ?>
						</ul>
						<div id="ticket" class="hidden">
							<form id="form-ticket" method="post" action="<?php echo route('site/sendTicket'); ?>" novalidate>
								<div class="form-group hidden">
									<input type="hidden" name="department" class="form-control">
								</div>
								<div class="form-group" data-validate="required" data-validtext="Alan boş olamaz">
									<input type="text" name="subject" class="form-control" id="subject" placeholder="Destek konusu">
									<p class="text-danger"></p>
								</div>
								<div class="form-group" data-validate="required" data-validtext="Alan boş olamaz">
									<textarea name="content" class="form-control" rows="5" placeholder="Destek talebi"></textarea>
									<p class="text-danger"></p>
								</div>
								<div class="form-group">
									<label for="department" data-margin="0 10px 0 0">Departman: </label>
									<span id="department"></span> <a href="javascript:void(0);" class="changeDepartment">(değiştir)</a>
								</div>
								<div class="form-group">
									<label for="inputEmail3" data-margin="0 10px 0 0">Öncelik: </label>
									<label class="radio-inline"><input type="radio" name="priority" value="1" checked>Düşük</label>
									<label class="radio-inline"><input type="radio" name="priority" value="2">Orta</label>
									<label class="radio-inline"><input type="radio" name="priority" value="3">Yüksek</label>
								</div>
								<div class="pull-right">
									<button type="reset" class="btn btn-warning">Reset</button>
									<button type="submit" class="btn btn-default" id="formvalid" data-form="ticket">Gönder</button>
								</div>
							</form>
						</div>
					<!-- fieldset --> </fieldset>

				<!-- //right-column --> </div>

				<div class="col-lg-12 col-md-12 col-sm-12">
					<fieldset>
						<!-- <legend><i class="fa fa-question-circle"></i> SIKÇA SORULAN SORULAR</legend> -->
						
						<?php echo $faq_list; ?>
					<!-- fieldset --> </fieldset>
				<!-- //extended-column --> </div>

			<!-- .row --> </div>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// inc: modalbox files
$this->load->view('modals/Ticket');

// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file view_customers.php */
/* Location: ./application/views/view_customers.php */ ?>