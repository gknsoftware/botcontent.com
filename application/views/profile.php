<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column">
			
			<?php $this->load->view('layout/profileOverview'); ?>

			<?php $this->load->view('layout/timeline'); ?>

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