<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex,follow" />
	<title>BOTCONTENT</title>
	<link rel="stylesheet" href="<?php echo !empty($_COOKIE['site_tpl']) ? get_asset('css', 'bootstrap/'.$this->input->cookie('site_tpl').'/bootstrap.min.css') : get_asset('css', 'bootstrap/cosmo/bootstrap.min.css'); ?>" id="theme">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'reset.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'bootstrap-switch.css'); ?>">
	<?php if (_is_page('bot')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'bootstrap-select.min.css').'">'; } ?>
	<?php if (_is_page('profile', 2)) { echo '<link rel="stylesheet" href="'.get_asset('css', 'timeline.css').'">'; } ?>
	<link rel="stylesheet" href="<?php echo get_asset('css', 'animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'spinkit.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'hover-min.css'); ?>">
	<link rel="stylesheet" href="<?php echo get_asset('css', 'weboti.css'); ?>">
	<?php if (_is_page('supervisor')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'supervisor.css').'">'; } ?>
	<?php if (_is_page('member')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'member.css').'">'; } ?>
	<?php if (_is_page('upgrade')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'upgrade.css').'">'; } ?>
	<?php if (_is_page('site')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'site.css').'">'; } ?>
	<?php if (_is_page('bot')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'bot.css').'">'; } ?>
	<?php if (_is_page('home')) { echo '<link rel="stylesheet" href="'.get_asset('css', 'dashboard.css').'">'; } ?>
	<link rel="stylesheet" href="<?php echo get_asset('css', 'font-awesome.min.css'); ?>">

	<base href="<?php echo base_url(); ?>">
</head>
<body>

	<nav class="navbar navbar-inverse navbar-main">
	<div class="container-fluid">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="<?php echo base_url(); ?>" style="font-family: 'Oswald', sans-serif;"><span data-font-color="#fff" data-bgcolor="#000" data-padding="0 .5em">BOT</span><span data-font-color="#000" data-bgcolor="#fff" data-padding="0 .5em">CONTENT</span></a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav header-menu">
	    	<?php if ( _is_page('bot') || _is_page('upgrade') ): ?>
	    		<li><a href="javascript:void(0);" class="getBotList"><i class="fa fa-list"></i> <?php echo $this->lang->line('lang_hm_botlist'); ?> <span class="sr-only">(current)</span></a></li>
	    	<?php endif ?>
	    	<?php if ($member_group == 1) : ?>
			<li class="dropdown <?php echo $this->uri->segment(1)=='supervisor' ? 'active' : null; ?>"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-coffee"></i> <?php echo $this->lang->line('lang_hm_supervisor'); ?></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="<?php echo route('supervisor/sites'); ?>"><i class="fa fa-desktop"></i> <?php echo $this->lang->line('lang_cm_sitemanagement'); ?></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo route('supervisor/customers'); ?>"><i class="fa fa-users"></i> <?php echo $this->lang->line('lang_cm_customers'); ?></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo route('supervisor/sector'); ?>"><i class="fa fa-globe"></i> <?php echo $this->lang->line('lang_cm_sectors'); ?></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo route('supervisor/templates'); ?>"><i class="fa fa-image"></i> <?php echo $this->lang->line('lang_cm_templates'); ?></a></li>
					<li class="divider"></li>
					<li><a href="<?php echo route('supervisor/multilang'); ?>"><i class="fa fa-flag"></i> <?php echo $this->lang->line('lang_cm_multilang'); ?></a></li>
				</ul>
			</li>
			<?php endif; ?>
			<li><a href="<?php echo route('site'); ?>"><i class="fa fa-cloud"></i> <?php echo $this->lang->line('lang_hm_mysites'); ?></a></li>
			<li><a href="#settingsModal" data-toggle="modal"><i class="fa fa-cog"></i> <?php echo $this->lang->line('lang_hm_settings'); ?></a></li>
			<li><a href="<?php echo route('site/support'); ?>"><i class="fa fa-support"></i> <?php echo $this->lang->line('lang_hm_support'); ?></a></li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="<?php echo route('upgrade'); ?>"><i class="fa fa-cloud-upload"></i> <?php echo $this->lang->line('lang_upgrade'); ?></a></li>
	      <li class="dropdown" data-hide="span">
	        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?php echo _gravatar( $member_email, 32 ); ?>" alt="Profile Picture" class="img-thumbnail pull-left"> <span class="hidden"><?php echo $member_email; ?></span> <i class="caret"></i></a>
	        <ul class="dropdown-menu dropdown-userdetail" role="menu">
	          <li class="welcome_user"><img src="<?php echo _gravatar( $member_email, 175 ); ?>" alt="Profile Picture" class="img-circle"><?php echo $member_name.'&nbsp;'.$member_surname ?> <br> <small class="fa fa-cloud-upload"><a href="#">21 gün kaldı</a></small> </li>
	          <li><a href="#"><?php echo $this->lang->line('lang_hm_accountsettings'); ?></a></li>
	          <li><a href="#languageSelectionModal" data-toggle="modal"><i class="glyphicon glyphicon-globe"></i> <?php echo $this->lang->line('lang_name'); ?></a></li>
	          <li class="divider"></li>
	          <li><a href="<?php echo route('home/logout'); ?>"><?php echo $this->lang->line('lang_hm_logout'); ?></a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>

<?php
/* End of file Header.php */
/* Location: ./application/views/layout/Header.php */ ?>