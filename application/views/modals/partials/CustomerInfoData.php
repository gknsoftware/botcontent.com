<div class="businessCard">
	<div class="pull-left" style="width: 25%">
		<img src="<?php echo get_third('uploads', $company_logo); ?>" alt="Coca Cola" class="img-responsive" width="125">
		<p class="label label-default"><?php echo $customer_company; ?></p>
	</div>

	<ul class="pull-left" style="width: 75%">
		<li><strong>Yetkili:</strong> <p><?php echo $customer_name; ?> <?php echo $customer_surname; ?></p></li>
		<li><strong>E-Mail:</strong> <p><?php echo $customer_email; ?></p></li>
		<li><strong>Telefon:</strong> <p><?php echo $customer_phone; ?></p></li>
		<li><strong>Adres:</strong> <p><?php echo nl2br($customer_address); ?></p></li>
	</ul>
<!-- .businessCard --> </div>