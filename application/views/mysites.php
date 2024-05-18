<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');

//Compare Premium Features
$compareWebsiteLimit = array(count($website_list), $this->model_site->get_premium_feature($premium, 'website_limit'));

//Return boundary messages
$buttonAddWebsite = array(
	'limited' => '<a href="#" class="btn btn-default disabled"><i class="fa fa-plus-circle"></i> Yeni Websitesi Ekle</a>',
	'unlimited' => '<a href="#addNewWebsite" data-toggle="modal" class="btn btn-default"><i class="fa fa-plus-circle"></i> Yeni Websitesi Ekle</a>'
	);
$alertQuotaExpired = array(
	'limited' => '
	<div class="alert alert-dismissible alert-info">
		<button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>
		<strong>Heyyy!</strong> Görünüşe göre kotanız dolmuş, <a href="'.route('upgrade').'" class="alert-link">lisansınızı yükselterek</a> daha fazla websitesi ekleyin.
	</div>',
	'unlimited' => null
	);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column">

			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('lang_dashboard'); ?></a></li>
				<?php echo generate_breadcrumb(); ?>
			</ul>

			<h1 class="page-title"><?php echo page_title(1); ?></h1>
			<p class="lead"><i class="fa fa-info-circle"></i> <?php echo page_title(1,true); ?></p>
			
			<?php echo premium_boundary($compareWebsiteLimit, $alertQuotaExpired); ?>
			
			<table class="table table-striped table-hover" data-margin="4em 0 1em 0">
				<thead>
					<tr>
						<th>#</th>
						<th>Site adı</th>
						<th>Site adresi</th>
						<th>Script</th>
						<th>Kategori</th>
						<th><i class="fa fa-info-circle"></i> Bağlantı</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($website_list as $website) : @$i++; ?>
					<tr>
						<th scope="row"><?php echo $i; ?></td>
						<td><?php echo $website->site_name; ?></td>
						<td><a href="#syncRemoteClient" data-toggle="modal" data-sync-id="<?php echo $website->site_id; ?>" data-sync-url="<?php echo $website->site_url; ?>"><i class="fa fa-exchange"></i> <?php echo $website->site_url; ?></a></td>
						<td><?php echo $website->site_script; ?></td>
						<td><?php echo $website->site_category; ?></td>
						<td id="site-id-<?php echo $website->site_id; ?>">
						<a href="<?php echo $website->site_url; ?>" class="checkConnection" data-site-id="<?php echo $website->site_id; ?>">Kontrol et</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<?php echo premium_boundary($compareWebsiteLimit, $buttonAddWebsite); ?>
			<div class="pull-right"><strong>Kota:</strong> <?php echo count($website_list).'/'.$this->model_site->get_premium_feature($premium, 'website_limit'); ?></div>

		<!-- layout: right-column --> </div>
		<div class="col-md-2 col-lg-pull-10 left-column">

			<?php $this->load->view('layout/sidebar.php'); ?>

		<!-- layout: left-column --> </div>
	</div>
</div>

<?php
// INC: modalbox files
$this->load->view('modals/syncRemoteClient');
$this->load->view('modals/addNewWebsite');

// INC: layout/ly_footer.php
$this->load->view('layout/footer');

/* End of file view_customers.php */
/* Location: ./application/views/view_customers.php */ ?>