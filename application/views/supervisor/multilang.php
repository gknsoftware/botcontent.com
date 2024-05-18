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
			

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file Multilang.php */
/* Location: ./application/views/Multilang.php */ ?>