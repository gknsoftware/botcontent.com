<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column">

			<?php //echo $this->encrypt->decode($this->uri->segment(3)); ?>

			<div class="col-lg-12 col-md-12 col-sm-12 faq-header" data-margin="0 0 50px 0">
				
				<h1>Weboti Help Center</h1>

				<ul class="faq-breadcrumb">
					<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
					<?php echo generate_breadcrumb( $faq_title, 3 ); ?>
				</ul>

			<!-- .faq-header --> </div>
			
			<?php if ($this->uri->segment(3) && $this->uri->segment(3)): ?>
				<div class="col-lg-8 col-md-8 col-sm-8 faq-content">
					<h1><?php echo $faq_title; ?></h1>
					<p><?php echo $faq_content; ?></p>
				<!-- .faq-content --> </div>

				<div class="col-lg-4 col-md-4 col-sm-4 faq-sidebar">
					<form id="form-search" method="post" action="<?php echo route('login'); ?>" autocomplete="off">
						<div class="inner-addon right-addon form-group <?php echo form_valid(validation_errors()); ?>">
							<input type="email" name="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('lang_login_email'); ?>">
							<i class="glyphicon glyphicon-search"></i>
						</div>
					</form>
					<ul>
						<?php
						foreach ($faq_title_list as $k => $v):
							$active = $this->encrypt->decode($this->uri->segment(4))==$v->faq_id ? ' class="active"' : null; ?>
							<li <?php echo $active; ?>><a href="<?php echo route('site/faq/'.$this->encrypt->encode($v->faq_cat_id).'/'.$this->encrypt->encode($v->faq_id)); ?>"><?php echo $v->faq_title; ?></a></li>
						<?php endforeach ?>
					</ul>
				<!-- .faq-sidebar --> </div>
			<?php endif; ?>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file view_customers.php */
/* Location: ./application/views/view_customers.php */ ?>