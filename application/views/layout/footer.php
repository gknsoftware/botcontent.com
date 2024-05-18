	<?php
	// inc: modalbox files
	$this->load->view('modals/languageSelection');
	$this->load->view('modals/settings');

	//inc: partial files
	$this->load->view('modals/partials/NotificationData.php'); ?>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="<?php echo get_asset('js', 'jquery-ui.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'bootstrap.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'bootstrap-switch.js'); ?>"></script>
	<?php if (_is_page('bot')) : ?><script src="<?php echo get_asset('js', 'bootstrap-select.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('home')) : ?><script src="<?php echo get_asset('js', 'jquery.bootstrap.newsbox.min.js'); ?>"></script><?php endif; ?>
	<script src="<?php echo get_asset('js', 'jquery.noty.packaged.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'raphael-min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'livicons-1.4.min.js'); ?>"></script>
	<script src="<?php echo get_asset('js', 'common.js'); ?>"></script>
	<?php if (_is_page('bot')) : ?><script src="<?php echo get_asset('js', 'bot.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('bot')) : ?><script src="<?php echo get_asset('js', 'botAjaxPost.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('site')) : ?><script src="<?php echo get_asset('js', 'site.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('upgrade')) : ?><script src="<?php echo get_asset('js', 'upgrade.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('home')) : ?><script src="<?php echo get_asset('js', 'home_modalpost.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('supervisor')) : ?><script src="<?php echo get_asset('js', 'supervisor_modalpost.js'); ?>"></script><?php endif; ?>
	<?php if (_is_page('site')) : ?><script src="<?php echo get_asset('js', 'site_modalpost.js'); ?>"></script><?php endif; ?>
	<noscript><meta http-equiv="refresh" content="0;url=<?php echo route('home/noJavascript'); ?>"></noscript>   

	<?php
	/*
	//Notification data
	$func = array(
		array(
			'type' => 'notification',
			'func' => 'n_ticket'
			));

	//Notification render
	echo notify($func, array('pos' => 'topRight')); */
	?>
</body>
</html>