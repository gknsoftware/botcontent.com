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

			<h1 class="page-title">Sektörler</h1>
			<p class="lead"><i class="fa fa-info-circle"></i> bu alanda değişiklik yapabilmeniz için <a href="#">yönetici girişi</a> yapmalısınız!</p>
			
			<div class="row">
				<div class="col-sm-3 col-md-9">
					
					<div id="ajax-post-content">
						<table class="table table-hover vertical-middle table-sector" data-toggle="selectable-rows">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo $this->lang->line('lang_sector'); ?></th>
									<th><?php echo $this->lang->line('lang_description'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($sector_list as $k => $v) : ?>
								<tr id="<?php echo $k; ?>" data-id="<?php echo $v->sector_id; ?>" data-panel-title="<?php echo mb_strtoupper($v->sector_name, 'utf-8'); ?>" data-height="50">
									<th scope="row"><?php echo $k+1; ?></th>
									<td class="company-name"><a href="javascript:void(0);"><?php echo $v->sector_name; ?></a></td>
									<td><?php echo $v->sector_desc; ?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					<!-- #ajax-post-content --> </div>

					<div class="column droparea">  <!-- .column --></div>

				<!-- row-1 --> </div>
				<div class="col-sm-10 col-md-3 column droparea">

					<div class="panel panel-info panel-edit hidden portlet" id="editable">
						<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#edit"><strong>YÖNET</strong> <i class="fa fa-sort-up pull-right"></i></div>
						<div class="panel-body portlet-content" id="edit">
							<div class="list-group edit-panel">
								<a href="javascript:void(0);" class="list-group-item cedit" id="editableCustomer"><i class="fa fa-pencil" data-width="18"></i> <?php echo $this->lang->line('lang_btn_edit'); ?></a>
								<a href="#deleteItemModal" class="list-group-item cedit" data-toggle="modal"><i class="fa fa-times" data-width="18"></i> <?php echo $this->lang->line('lang_btn_delete'); ?></a>
							</div>
						<!-- panel-body --> </div>
					<!-- panel: edit --> </div>

					<div class="panel panel-primary portlet">
						<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#addsector"><strong><?php echo mb_strtoupper($this->lang->line('lang_sv_sector_addsector'), 'utf-8'); ?></strong> <i class="fa fa-sort-up pull-right"></i></div>
						<div class="panel-body portlet-content" id="addsector">
							
							<form id="form-addsector" method="post" action="<?php echo route('supervisor/sector'); ?>" novalidate>
								<div class="form-group" data-validate="required" data-validtext="<?php echo $this->lang->line('lang_valid_emptyarea'); ?>">
									<label for="sector_name"><?php echo $this->lang->line('lang_sv_sector_sectorname'); ?></label>
									<input type="text" name="sector_name" class="form-control" id="sector_name" placeholder="<?php echo $this->lang->line('lang_sv_sector_entersectorname'); ?>">
									<p class="text-danger hidden"></p>
								</div>
								<div class="form-group">
									<label for="sector_desc"><?php echo $this->lang->line('lang_sv_sector_sectordesc'); ?></label>
									<textarea name="sector_desc" class="form-control" rows="3" id="sector_desc"></textarea>
									<p class="text-danger hidden"></p>
								</div>
								<button type="reset" class="btn btn-warning"><?php echo $this->lang->line('lang_btn_reset'); ?></button>
								<button type="submit" class="btn btn-default" id="formvalid" data-form="addsector" data-loading-text="<?php echo $this->lang->line('lang_btn_loading'); ?>"><?php echo $this->lang->line('lang_btn_add'); ?></button>
							<!-- #form-addsector --> </form>

						<!-- panel-body --> </div>
					<!-- panel: add --> </div>

				<!-- row-2 --> </div>
			</div>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// inc: modalbox files
$this->load->view('modals/deleteitem');

// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file Sector.php */
/* Location: ./application/views/Sector.php */ ?>