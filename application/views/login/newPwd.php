<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN | WEBOTI</title>
	<link rel="stylesheet" href="<?php echo get_asset('css', 'bootstrap/cosmo/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'reset.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'login.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'font-awesome.min.css'); ?>">

	<base href="<?php echo base_url(); ?>">
</head>
<body>

	<div id="backgrounds"></div>
	<div id="bgfilter"></div>


	<div class="container">
		<div class="row">
			<div class="col-md-2 col-lg-2">&nbsp;</div>
			<div class="col-md-8 col-lg-8">
				<div class="icon-user"><i class="fa fa-lock fa-5x"></i></div>
				
				<div class="row-same-height">
					<!-- ############### ACCOUNT INFO ############### -->
					<div class="col-md-5 col-lg-4 col-md-height col-lg-height row-full-height account-info">
						<h1><i class="glyphicon glyphicon-menu-down btn-showinfo hide"></i> weboti</h1>
						<small>Modular & Flexible</small>

						<ul>
							<li><i class="fa fa-magic"></i> Site hazırlama sihirbazı</li>
							<li><i class="fa fa-users"></i> Sürükle ve bırak</li>
							<li><i class="fa fa-support"></i> Hızlı ve pratik</li>
							<li><i class="fa fa-credit-card"></i> Geniş bileşenler arşivi</li>
						</ul>
					</div>
					<div class="col-md-5 col-lg-4 col-lg-height row-full-height account-info showinfo">
						<h1><i class="glyphicon glyphicon-menu-down btn-showinfo hide"></i> SITE BUILDER</h1>
						<small>pratik site hazırlama aracı</small>

						<ul>
							<li><i class="fa fa-magic"></i> Site hazırlama sihirbazı</li>
							<li><i class="fa fa-users"></i> Sürükle ve bırak</li>
							<li><i class="fa fa-support"></i> Hızlı ve pratik</li>
							<li><i class="fa fa-credit-card"></i> Geniş bileşenler arşivi</li>
						</ul>
					</div>
					
					<!-- ############### ACCOUNT FORM ############### -->
					<div class="col-md-7 col-lg-8 col-md-height col-lg-height col-full-height account-form">
						<h3><?php echo $this->lang->line('lang_cpass_changepassword'); ?></h3>
						<div class="alert alert-dismissible alert-danger hideResult <?php echo form_valid(validation_errors(), 'show'); ?>">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo combine_valid_message(array('password')); ?>
						</div>

						<form id="form-forgotpwd" method="post" action="<?php echo route('forgotpwd/newpwd/'.$user_id); ?>" novalidate>
							<div class="inner-addon right-addon form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="password" name="password" class="form-control" id="pwd" placeholder="<?php echo $this->lang->line('lang_cpass_enternewpassword'); ?>" autocomplete="off" validate>
								<i class="glyphicon glyphicon-lock"></i>
							</div>
							<div class="inner-addon right-addon form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="password" name="passconf" class="form-control" id="pwd" placeholder="<?php echo $this->lang->line('lang_cpass_retypeenternewpassword'); ?>" autocomplete="off" validate>
								<i class="glyphicon glyphicon-lock"></i>
							</div>
							<div class="clearfix"></div>
							<button type="submit" class="btn btn-primary btn-animate btn-resetpwd" data-loading-text="<?php echo $this->lang->line('lang_ci_valid_btnLoading'); ?>"><?php echo $this->lang->line('lang_cpass_changebutton'); ?></button>
						</form>

						<div class="center-block m-t-50">
							<ul>
								<li><a href="<?php echo route('register'); ?>" class="btn btn-primary"><?php echo $this->lang->line('lang_fypass_createnewaccount'); ?></a> </li>
								<li><a href="<?php echo route('login'); ?>" class="btn btn-success"><?php echo $this->lang->line('lang_fypass_signin'); ?></a> </li>
							</ul>
						</div>					
					</div>
				</div>
			</div>
			<div class="col-md-2 col-lg-2">&nbsp;</div>
		<!-- .row --> </div>
	</div>

	<!-- Javascript -->
	<script src="<?php echo get_asset('js', 'jquery-1.11.3.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'bootstrap.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'login.js'); ?>"></script>
</body>
</html>

<?php
/* End of file view_login.php */
/* Location: ./application/views/view_login.php */