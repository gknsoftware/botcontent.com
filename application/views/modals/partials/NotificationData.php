<?php
if ( ! function_exists('n_ticket') )
{
	function n_ticket()
	{
		//Loaded model
		$ci = get_instance();
		$ci->load->model('Model_Site');

		$c = count($ci->Model_Site->get_ticket_count());

		$returned = false;
		if ($c > 0) {
			$returned = '<div class="activity-item"> <i class="fa fa-ticket"></i> <div class="activity"> Ticket! <a href="#">'.$c.' yeni</a> destek bildirimi var. <span>en son 3 saat önce</span> </div> </div>';
		}

		return (string) $returned;
	}
}
?>