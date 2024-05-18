<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-md-push-2 right-column column droparea">
			
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('lang_dashboard'); ?></a></li>
				<?php echo generate_breadcrumb(null, 2); ?>
			</ul>

			<h1 class="page-title"><?php echo page_title(1); ?></h1>
			<p class="lead"><i class="fa fa-info-circle"></i> <?php echo page_title(1,true); ?></p>

			<div class="panel panel-default portlet">
				<div class="panel-heading portlet-header">Havuz Kotası: 4/100</div>
				<div class="panel-body portlet-content">
					<div class="col-md-12" id="searchbox">
					    <form action="#" method="get">
					        <div class="input-group">
					            <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
					            <input class="form-control" id="system-search" name="q" placeholder="Başlıklar içerisinde arayın" required>
					            <span class="input-group-btn">
					                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
					            </span>
					        </div>
					    </form>
					<!-- #searchbox --> </div>
					<div class="col-md-12" id="contentlist">
									
						<table class="table table-list-search">
							<thead>
								<tr>
									<th><input type="checkbox" id="checkall" /></th>
									<th>Resim</th>
									<th>Başlık</th>
									<th>İşlemler</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>asdasd</td>
									<td>aasd</td>
									<td>asdasd</td>
									<td>asdasd</td>
								</tr>
								<tr>
									<td>x</td>
									<td>x</td>
									<td>x</td>
									<td>x</td>
								</tr>
							</tbody>
						</table>

					<!-- #contentlist --> </div>
				</div>
			</div>

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