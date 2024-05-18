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
				<div class="icon-user"><i class="fa fa-users fa-5x"></i></div>
				
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
						<h3><?php echo $this->lang->line('lang_signup_createnewaccount'); ?></h3>
						<?php echo !empty($show) ? '<div class="alert alert-success">'.$show.'</div>'.$redirect : null; ?>

						<div class="alert alert-dismissible alert-danger hideResult <?php echo form_valid(validation_errors(), 'show'); ?>">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<?php echo combine_valid_message(array('email', 'name', 'surname', 'password', 'passconf')); ?>
						</div>
						
						<form id="form-signup" method="post" action="<?php echo route('register'); ?>" novalidate>
							<div class="inner-addon right-addon-2 form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $this->lang->line('lang_login_email'); ?>" value="<?php echo set_value('email'); ?>" autocomplete="off">
								<i class="glyphicon glyphicon-envelope"></i>
							</div>
							<div class="inner-addon right-addon-2 col-xs-6 form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $this->lang->line('lang_signup_name'); ?>" value="<?php echo set_value('name'); ?>" autocomplete="off">
								<i class="glyphicon glyphicon-user"></i>
							</div>
							<div class="inner-addon right-addon-2 col-xs-6 form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="text" class="form-control" id="surname" name="surname" placeholder="<?php echo $this->lang->line('lang_signup_surname'); ?>" value="<?php echo set_value('surname'); ?>" autocomplete="off">
								<i class="glyphicon glyphicon-user"></i>
							</div>
							<div class="inner-addon right-addon-2 col-xs-6 form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="password" class="form-control" id="pwd" name="password" placeholder="<?php echo $this->lang->line('lang_signup_password'); ?>">
								<i class="glyphicon glyphicon-lock"></i>
							</div>
							<div class="inner-addon right-addon-2 col-xs-6 form-group <?php echo form_valid(validation_errors()); ?>">
								<input type="password" class="form-control" id="pwd" name="passconf" placeholder="<?php echo $this->lang->line('lang_signup_repeatpassword'); ?>">
								<i class="glyphicon glyphicon-lock"></i>
							</div>
							<div class="clearfix"></div>
							<div class="checkbox">
								<label class="agreement">
									<input type="checkbox"> Sözleşmeyi okudum ve kabul ediyorum
								</label>
							</div>
							<div class="clearfix"></div>
							<button type="submit" class="btn btn-primary btn-animate" id="btn-signup" data-loading-text="<?php echo $this->lang->line('lang_ci_valid_btnLoading'); ?>"><?php echo $this->lang->line('lang_signup_register'); ?></button>
						</form>
						
					<div class="hrSocial"></div>
					<div class="hrOr"><?php echo $this->lang->line('lang_login_or'); ?></div>
						<div class="social-login">
						<button type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i> <?php echo $this->lang->line('lang_login_connectwithfacebook'); ?></button>
						<button type="button" class="btn-tt btn btn-lg btn-block btn-square"><i class="fa fa-twitter pull-left"></i> <?php echo $this->lang->line('lang_login_connectwithtwitter'); ?></button>
						</div>
					<div class="clearfix"></div>
					<div class="pull-right signup"><a href="<?php echo route('login'); ?>"><?php echo $this->lang->line('lang_signup_currentaccount'); ?></a></div>
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
/* End of file view_register.php */
/* Location: ./application/views/view_register.php */