<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN | BOTCONTENT</title>
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
				<div class="icon-user"><i class="fa fa-user fa-5x"></i></div>
				
				<div class="row-same-height box-shadow">
					<!-- ############### ACCOUNT INFO ############### -->
					<div class="col-md-5 col-lg-4 col-md-height col-lg-height row-full-height account-info">
						<h1><i class="glyphicon glyphicon-menu-down btn-showinfo hide"></i> botcontent</h1>
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
						<h3><?php echo $this->lang->line('lang_login_signinyouraccount'); ?></h3>
						<div class="alert alert-dismissible alert-danger hideResult <?php echo form_valid(validation_errors(), 'show'); ?>">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo combine_valid_message(array('email', 'password')); ?>
						</div>

						<div class="alert alert-dismissible alert-success hideResult <?php echo form_valid($verification_success, 'show'); ?>">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo $verification_success; ?>
						</div>

						<form id="form-signin" method="post" action="<?php echo route('login'); ?>" novalidate>
							<div class="inner-addon right-addon form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="email" name="email" class="form-control" id="email" placeholder="<?php echo $this->lang->line('lang_login_email'); ?>" value="<?php echo set_value('email'); ?>" autocomplete="off" validate="email">
								<i class="glyphicon glyphicon-user"></i>
							</div>
							<div class="inner-addon right-addon form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="password" name="password" class="form-control" id="pwd" placeholder="<?php echo $this->lang->line('lang_login_password'); ?>" autocomplete="off" validate>
								<i class="glyphicon glyphicon-lock"></i>
							</div>
							<div class="pull-left"><button type="submit" data-loading-text="<?php echo $this->lang->line('lang_ci_valid_btnLoading'); ?>" class="btn btn-primary btn-animate" id="btn-signin"><?php echo $this->lang->line('lang_login_signin'); ?></button></div>
							<div class="pull-right forgotpassword"><a href="<?php echo route('forgotpwd'); ?>"><?php echo $this->lang->line('lang_login_forgotyourpassword'); ?></a></div>
						</form>
						
					<div class="hrSocial"></div>
					<div class="hrOr"><?php echo $this->lang->line('lang_login_or'); ?></div>
						<div class="social-login">
						<button type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i> <?php echo $this->lang->line('lang_login_connectwithfacebook'); ?></button>
						<button type="button" class="btn-tt btn btn-lg btn-block btn-square"><i class="fa fa-twitter pull-left"></i> <?php echo $this->lang->line('lang_login_connectwithtwitter'); ?></button>
						</div>
					<div class="clearfix"></div>
					<div class="pull-right signup"><a href="<?php echo route('register'); ?>"><?php echo $this->lang->line('lang_login_createnewaccount'); ?></a></div>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-lg-2">&nbsp;</div>
		<!-- .row --> </div>
	</div>

	<!-- Javascript -->
	<script src="<?php echo get_asset('js', 'jquery-1.11.3.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'jquery.countdown.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'bootstrap.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'login.js'); ?>"></script>
</body>
</html>

<?php
/* End of file view_login.php */
/* Location: ./application/views/view_login.php */