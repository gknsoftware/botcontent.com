<span class="hidden member_id"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'member_id'); ?></span>
<span class="hidden customer_company"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_company'); ?></span>
<span class="hidden customer_name"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_name'); ?></span>
<span class="hidden customer_surname"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_surname'); ?></span>
<span class="hidden customer_email"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_email'); ?></span>
<span class="hidden customer_phone"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_phone'); ?></span>
<span class="hidden customer_address"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_address'); ?></span>
<span class="hidden company_logo"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'company_logo'); ?></span>
<span class="hidden customer_group"><?php echo $this->Model_Supervisor->get_member_info($member_id, 'member_group'); ?></span>
<span class="hidden customer_payment"><?php echo $this->Model_Supervisor->get_customer_info($member_id, 'customer_payment'); ?></span>
<span class="hidden customer_payment_text"><?php

$customerPayment = $this->Model_Supervisor->get_customer_info($member_id, 'customer_payment');
if ($customerPayment == 0) {
	echo '<span class="label label-danger" style="width:80px;">ÖDENMEDİ</span>';
}elseif($customerPayment == 1) {
	echo '<span class="label label-success" style="width:80px;">ÖDENDİ</span>';
}else{
	echo '<span class="label label-warning" style="width:80px;">BEKLEMEDE</span>';
}
?></span>

<div class="alert alert-dismissible alert-success autohide <?php echo showhide($success); ?>">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<strong>Tebrikler!</strong> Değişiklikler başarıyla kaydedildi.</a>.
<!-- .alert --> </div>