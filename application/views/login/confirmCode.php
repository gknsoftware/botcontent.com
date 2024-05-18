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
						<h3><?php echo $this->lang->line('lang_ccode_confirmationcode'); ?></h3>

						<div class="alert alert-dismissible alert-danger hideResult <?php echo form_valid($verify_warning, 'show'); ?>">
							<button type="button" class="close" data-dismiss="alert">×</button>
							Onay kodu geçersiz veya süresi dolmuş.
						</div>

						<form id="form-confirmCode" action="<?php echo route('register/verifyCode/'.$member_id.md5($member_id).'-'.strlen($member_id)); ?>" method="post" accept-charset="utf-8">
						<div class="inner-addon right-addon-2 <?php echo form_valid($verify_warning); ?>">
							<input type="text" name="verifyCode" class="form-control" placeholder="<?php echo $this->lang->line('lang_ccode_confirmcode'); ?>" autocomplete="off">
							<i class="glyphicon glyphicon-ok"></i>
						</div>
						<div class="newverifycode pull-right">
							<div><a href="javascript:void(0);" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="<?php echo $member_email; ?>" data-content="<?php echo $this->lang->line('lang_ccode_confirmhelp'); ?>"><i class="glyphicon glyphicon-question-sign"></i> Yardım</a></div>
							<div><span class="<?php echo $countdown ? 'show' : 'hidden'; ?>"><i class="glyphicon glyphicon-refresh"></i> <small class="countdown callback"></small></span></div>
							<div><span class="<?php echo $countdown ? 'hidden' : 'show'; ?>" id="recode"><a href="<?php echo route('register/sendVerifyCode/'.$member_id.md5($member_id).'-'.strlen($member_id)); ?>"><i class="glyphicon glyphicon-refresh"></i> Tekrar gönder</a></span></div>
						</div>
						<div class="clearfix"></div>
						<button type="submit" class="btn btn-primary btn-resetpwd" data-loading-text="<?php echo $this->lang->line('lang_ci_valid_btnLoading'); ?>"><?php echo $this->lang->line('lang_ccode_confirmbutton'); ?></button>
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
	<script src="<?php echo get_asset('js', 'jquery.countdown.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'login.js'); ?>"></script>
</body>
</html>

<?php
/* End of file view_login.php */
/* Location: ./application/views/view_login.php */