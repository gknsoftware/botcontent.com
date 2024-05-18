<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('layout/header.php'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column">
			
			<div class="snippet">
				<div class="col-md-3 col-sm-6 col-xs-12 panel-stats">
		            <div class="panel panel-dark panel-colorful">
		                <div class="panel-body text-center">
		                	<p class="text-uppercase mar-btm text-sm">LİSANS PAKETİ</p>
		                	<i class="livicon" data-n="timer" data-c="#fff" data-hc="#fff" data-s="78"></i>
		                	<hr>
		                	<p class="h2 text-semibold text-uppercase"><?php echo ucfirst($premium); ?></p>
		                	<small>Lisansın bitmesine <span class="text-semibold"><?php echo _check_premium_expire_date($site_plan_expired) ? _date_diff($site_plan_expired, date('Y-m-d H:i:s')) : '0000'; ?></span> kaldı</small>
		                </div>
		            </div>
		        </div>
		        <div class="col-md-3 col-sm-6 col-xs-12 panel-stats">
		        	<div class="panel panel-danger panel-colorful">
		        		<div class="panel-body text-center">
		        			<p class="text-uppercase mar-btm text-sm">SİSTEMDEKİ BOTLAR</p>
		        			<i class="livicon" data-n="android" data-c="#fff" data-hc="#004521" data-s="78"></i>
		        			<hr>
		        			<p class="h2 text-semibold"><?php echo $this->model_bot->count_table('bot'); ?></p>
		        			<small><i class="fa fa-android fa-fw"></i>Siz <span class="text-semibold">2</span> adet kullanıyorsunuz</small>
		        		</div>
		        	</div>
		        </div>
		        <div class="col-md-3 col-sm-6 col-xs-12 panel-stats">
		        	<div class="panel panel-primary panel-colorful">
						<div class="panel-body text-center">
		        			<p class="text-uppercase mar-btm text-sm">ÖZGÜN İÇERİKLER</p>
		        			<i class="livicon" data-n="doc-portrait" data-c="#fff" data-hc="#fff" data-s="78"></i>
		        			<hr>
		        			<p class="h2 text-semibold">432</p>
		        			<small><span class="text-semibold"><i class="fa fa-hashtag fa-fw"></i> 0</span> Özgün içerik satın aldınız</small>
		        		</div>
		        	</div>
		        </div>
		        <div class="col-md-3 col-sm-6 col-xs-12 panel-stats">
		        	<div class="panel panel-info panel-colorful">
		        		<div class="panel-body text-center">
		        			<p class="text-uppercase mar-btm text-sm">DESTEK BİLDİRİMİ</p>
		        			<i class="livicon" data-n="tag" data-c="#fff" data-hc="#fff" data-s="78"></i>
		        			<hr>
		        			<p class="h2 text-semibold">86</p>
		        			<small><span class="text-semibold"><i class="fa fa-reply fa-fw"></i> 2</span> Okunmamış bildiriminiz var</small>
		        		</div>
		        	</div>
		        </div>
			</div>

			<div class="clearfix"> <!-- .clearfix --></div>

			<div class="home" data-padding="25px 0">
				<div class="col-md-8 col-lg-8 column droparea">
					
					<div class="col-md-12" data-margin="0" data-padding="0">
						<div class="panel panel-default panel-edit portlet">
							<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#edit">
								<h3 class="panel-title panel-title-news"><i class="glyphicon glyphicon-list-alt"></i> NELER OLUYOR..?</h3>
							</div>
							<div class="panel-body portlet-content" id="edit" data-margin="0" data-padding="0">
								<div class="list-group" data-margin="0" data-padding="0">
									<?php foreach ($this->model_home->get_news() as $news): ?>
										<a href="javascript:void(0);" class="list-group-item showNews" data-id="<?php echo $news->id; ?>">
											<h4 class="list-group-item-heading"><?php echo $news->title; ?></h4>
											<p class="list-group-item-text"><?php echo mb_substr($news->description, 0,150); ?>...</p>
										</a>
									<?php endforeach ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12" data-margin="0" data-padding="0">
						<div class="panel panel-default panel-edit portlet">
							<div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#edit">
								<h3 class="panel-title panel-title-news"><i class="glyphicon glyphicon-file"></i> ÖNE ÇIKAN MAKALELER</h3>
							</div>
							<div class="panel-body portlet-content" id="edit" data-margin="0" data-padding="0">
								<table class="table">
									<thead>
										<tr>
											<th>Makale başlığı</th>
											<th>Kategori</th>
											<th>Yazar</th>
											<th>Fiyat</th>
											<th>İşlem</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
										<tr>
											<td>Örnek makale başlığı</td>
											<td>Beslenme</td>
											<td>Gökhan Karakuş</td>
											<td>2₺</td>
											<th><a href="#" class="btn btn-primary btn-xs">Satın Al</a></th>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				<!-- //Left Column --> </div>

				<div class="col-md-4 col-lg-4 column droparea">

					<div class="col-md-12" data-margin="0" data-padding="0">
			            <div class="panel panel-default panel-shortcut portlet">
			                <div class="panel-heading portlet-header" data-toggle="panel-toggle" data-target="#shortcut">
			                    <h3 class="panel-title panel-title-news"><span class="glyphicon glyphicon-bookmark"></span> HIZLI MENÜ</h3>
			                </div>
			                <div class="panel-body portlet-content panel-body-shortcut" id="shortcut" data-margin="0" data-padding="0">
			                    <a href="<?php echo route('site'); ?>" class="btn btn-secondary col-md-4" role="button"><i class="glyphicon glyphicon-cloud"></i> Sitelerim</a>
								<a href="#settingsModal" data-toggle="modal" class="btn btn-secondary col-md-4" role="button"><i class="glyphicon glyphicon-cog"></i> Ayarlar</a>
								<a href="<?php echo route('upgrade'); ?>" class="btn btn-secondary col-md-4" role="button"><i class="glyphicon glyphicon-cloud-upload"></i> Lisans Al</a>
								<a href="#" class="btn btn-secondary col-md-4" role="button"><i class="glyphicon glyphicon-file"></i> Özgün İçerikler</a>
	                       		<?php foreach ($this->model_bot->get_bot_categories() as $cat): ?>
									<a href="#" class="btn btn-secondary col-md-4" role="button"><i class="fa fa-<?php echo $cat->bot_cat_icon; ?>"></i> <?php echo mb_strtoupper($cat->bot_cat_name, 'utf-8'); ?></a>
								<?php endforeach; ?>
			                </div>
			            </div>
			        <!-- //Shortcut --> </div>

				<!-- //Right Column --> </div>

				<div class="col-md-12 column droparea">
					
					

				<!-- //Full Column --> </div>
			</div>

		<!-- .right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// INC: modalbox files
$this->load->view('modals/readNews');

// INC: layout/ly_footer.php
$this->load->view('layout/footer.php');

/* End of file dashboard.php */
/* Location: ./application/views/dashboard.php */ ?>