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

			<h1 class="page-title">Müşteriler</h1>
			<p class="lead"><i class="fa fa-info-circle"></i> bu alanda değişiklik yapabilmeniz için <a href="#">yönetici girişi</a> yapmalısınız!</p>
			
			<div class="row">
				<div class="col-sm-3 col-md-9">
					
					<table class="table table-hover vertical-middle table-customer" data-toggle="selectable-rows">
						<thead>
							<tr>
								<th>#</th>
								<th>Firma</th>
								<th>Yetkili</th>
								<th>E-Mail</th>
								<th>Ödeme</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($customer_list as $k => $v) {

								$payment_label = null;
								$customer_payment = null;
								if ($v->customer_payment == 0) { 
									$payment_label = 'label-danger';
									$customer_payment = 'ÖDENMEDİ';
								}
								elseif ($v->customer_payment == 1) {
									$payment_label = 'label-success'; 
									$customer_payment = 'ÖDENDİ';
								}
								else{ 
									$payment_label = 'label-warning';
									$customer_payment = 'BEKLEMEDE';
								} ?>
							<tr id="<?php echo $k; ?>" data-id="<?php echo $v->member_id; ?>" data-panel-title="<?php echo $v->customer_company; ?>" data-height="50">
								<th scope="row"><?php echo $k+1; ?></th>
								<td class="company-name"><a href="javascript:void(0);"><?php echo $v->customer_company; ?></a></td>
								<td><?php echo $v->customer_name; ?> <?php echo $v->customer_surname; ?></td>
								<td><?php echo $v->customer_email; ?></td>
								<td><span class="label <?php echo $payment_label; ?>" data-width="80px"><?php echo $customer_payment; ?></span></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>

					<div class="column droparea">  <!-- .column --></div>

				<!-- row: left --> </div>
				<div class="col-sm-10 col-md-3 column droparea">

					<div class="panel panel-info panel-edit hidden portlet">
						<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#edit"><strong>YÖNET</strong> <i class="fa fa-sort-up pull-right"></i></div>
						<div class="panel-body portlet-content" id="edit">
							<div class="company-logo">
								<?php foreach ($customer_list as $k => $v) : ?>
									<img src="<?php echo get_third('uploads', $v->company_logo); ?>" class="img-responsive" data-img="<?php echo $k; ?>">
								<?php endforeach; ?>
							</div>

							<div class="list-group edit-panel">
								<a href="javascript:void(0);" class="list-group-item cedit" id="businessCard"><i class="fa fa-info-circle" data-width="18"></i> <?php echo $this->lang->line('lang_btn_businesscard'); ?></a>
								<a href="javascript:void(0);" class="list-group-item cedit" id="editableCustomer"><i class="fa fa-pencil" data-width="18"></i> <?php echo $this->lang->line('lang_btn_edit'); ?></a>
								<a href="#deleteItemModal" class="list-group-item cedit" data-toggle="modal"><i class="fa fa-times" data-width="18"></i> <?php echo $this->lang->line('lang_btn_delete'); ?></a>
							</div>
						<!-- panel-body --> </div>
					<!-- panel: edit --> </div>

					<div class="panel panel-primary panel-addcustomer portlet">
						<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#addcustomer"><strong><?php echo mb_strtoupper($this->lang->line('lang_sv_customer_addcustomer'), 'utf-8'); ?></strong> <i class="fa fa-sort-up pull-right"></i></div>
						<div class="panel-body portlet-content" id="addcustomer">

							<form id="form-addcustomer" method="post" action="<?php echo route('supervisor/customers'); ?>" novalidate>
								<div class="form-group" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
									<label for="company"><?php echo $this->lang->line('lang_sv_customer_company'); ?></label>
									<input type="text" name="customer_company" class="form-control" id="company" placeholder="<?php echo $this->lang->line('lang_sv_customer_entercompanyname'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div class="form-group inline-element" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
									<label for="authorized"><?php echo $this->lang->line('lang_sv_customer_name'); ?></label>
									<input type="text" name="customer_name" class="form-control" id="authorized" placeholder="<?php echo $this->lang->line('lang_sv_customer_entername'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div class="form-group inline-element" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
									<label for="authorized"><?php echo strtolower($this->lang->line('lang_sv_customer_surname')); ?></label>
									<input type="text" name="customer_surname" class="form-control" id="authorized" placeholder="<?php echo $this->lang->line('lang_sv_customer_entersurname'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div class="form-group" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>" data-second-validtext="<?php echo $this->lang->line('lang_valid_invalidemail'); ?>">
									<label for="email"><?php echo $this->lang->line('lang_sv_customer_email'); ?></label>
									<input type="email" name="customer_email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('lang_sv_customer_enteremail'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div class="form-group" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
									<label for="pwd"><?php echo $this->lang->line('lang_sv_customer_password'); ?></label>
									<input type="password" name="customer_password" class="form-control" id="pwd" placeholder="<?php echo $this->lang->line('lang_sv_customer_enterpassword'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div id="hidden-elements" data-display="none">
									<div class="form-group inline-element">
										<label for="phone"><?php echo $this->lang->line('lang_sv_customer_group'); ?></label><br>
										<select name="customer_group">
											<?php foreach ($group_list as $k => $v) : ?>
												<option value="<?php echo $v->group_id; ?>"><?php echo $this->lang->line('lang_'.$v->group_name); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="form-group inline-element">
										<label for="phone"><?php echo $this->lang->line('lang_sv_customer_payment'); ?></label><br>
										<select name="customer_payment">
											<option value="0"><?php echo $this->lang->line('lang_sv_customer_notpaid'); ?></option>
											<option value="2"><?php echo $this->lang->line('lang_sv_customer_pending'); ?></option>
											<option value="1"><?php echo $this->lang->line('lang_sv_customer_paid'); ?></option>
										</select>
									</div>
									<div class="form-group">
										<label for="phone"><?php echo $this->lang->line('lang_sv_customer_phone'); ?></label>
										<input type="text" name="customer_phone" class="form-control" id="phone" placeholder="<?php echo $this->lang->line('lang_sv_customer_enterphone'); ?>">
									</div>
									<div class="form-group">
										<label for="address"><?php echo $this->lang->line('lang_sv_customer_address'); ?></label>
										<textarea name="customer_address" class="form-control" rows="5" id="address"></textarea>
									</div>
								<!-- #hidden-elements --> </div>
								<button type="reset" class="btn btn-warning"><?php echo $this->lang->line('lang_btn_reset'); ?></button>
								<button type="submit" class="btn btn-default" id="formvalid" data-form="addcustomer" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_add'); ?></button>
							<!-- #form-addcustomer --> </form>

						<!-- panel-body --> </div>
					<!-- panel: add --> </div>

				<!-- row: right --> </div>
			</div>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// inc: modalbox files
$this->load->view('modals/businesscard');
$this->load->view('modals/editcustomer');
$this->load->view('modals/deleteitem');

// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file Customers.php */
/* Location: ./application/views/Customers.php */ ?>