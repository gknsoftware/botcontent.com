<div class="profile">
	<img src="<?php echo _gravatar( $member_email, 60 ); ?>" alt="Profile Picture" class="pull-left" />
	<div class="pull-left">
		<h1><strong><?php echo $member_name.'&nbsp;'.$member_surname; ?></strong></h1>
		<ul>
			<li><a href="<?php echo route('member/repository'); ?>" class="ico-ticket" title="Havuz"><i class="glyphicon glyphicon-download-alt"></i></a></li>
			<li><a href="<?php echo route('member/profile'); ?>" class="ico-profile" title="Profil"><i class="glyphicon glyphicon-user"></i></a></li>
			<li><a href="<?php echo route('home/logout'); ?>" class="ico-logout" title="Çıkış"><i class="glyphicon glyphicon-off"></i></a></li>
		</ul>
	</div>
	<div class="clearfix"></div>
<!-- block: profile --> </div>

<ul class="nav nav-list left-menu">
	<?php if ($member_group == 1) : ?>
	<li class="nav-list-margin"><label class="tree-toggler nav-header" id="label-1"><i class="fa fa-coffee"></i> SUPERVISOR</label>
		<ul class="nav nav-list tree">
			<li><a href="<?php echo route('supervisor/sites'); ?>"> <i class="fa fa-desktop"></i> Site Yönetimi</a></li>
			<li><a href="<?php echo route('supervisor/customers'); ?>"> <i class="fa fa-users"></i> Müşteriler</a></li>
			<li><a href="<?php echo route('supervisor/sector'); ?>"> <i class="fa fa-globe"></i> Sektörler</a></li>
			<li><a href="<?php echo route('supervisor/templates'); ?>"> <i class="fa fa-image"></i> Şablonlar</a></li>
			<li><a href="<?php echo route('supervisor/multilang'); ?>"> <i class="fa fa-flag"></i> Çoklu Dİl</a></li>
		</ul>
	</li>
	<?php endif; ?>
	
	<?php foreach ($this->model_bot->get_bot_categories() as $cat): ?>
		<li class="nav-list-margin"><label class="tree-toggler nav-header" id="label-1"><i class="fa fa-<?php echo $cat->bot_cat_icon; ?>"></i> <?php echo mb_strtoupper($cat->bot_cat_name, 'utf-8'); ?></label>
			<ul class="nav nav-list tree">
				<?php
				foreach ($this->model_bot->get_bot_list($cat->bot_cat_id) as $bot)
				{
					$addDate = strtotime($bot->bot_add_date); 
					$currDate = strtotime(date('Y-m-d')); 
					$diffDate = ($currDate - $addDate) / (60*60*24);

					$newBot = ($diffDate <= 1) ? '<small class="label label-danger dynAnimate" style="padding:.2em .6em .3em !important;">YENİ</small> ' : null;

					echo '<li><a href="'.route('bot/lists/'.$cat->bot_cat_slug.'/'.$bot->bot_slug.'/'.$this->model_bot->get_subcat_slug($bot->bot_id).'/1').'">'.$newBot.$bot->bot_name.'</a></li>';
				} ?>
			</ul>
		</li>
	<?php endforeach ?>
<!-- block: left-menu --> </ul>