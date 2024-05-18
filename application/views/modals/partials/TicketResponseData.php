<script type="text/javascript">
	$(function () {
		/* CLICK:  reply button */
		var dataID;
		var replyID;
		$('.reply')
			.click(function () 
			{
				responseID = $(this).data('response-id');
				dataID = $(this).data('id');
				replyID = $(this).attr('id');
				var replyTicketHidden = $('#replyTicketHidden').html();

				//Show reply form
				$('.ticketResponseData ul li .replyTicket').html('');
				$('.ticketResponseData ul li:eq('+replyID+') .replyTicket').html( replyTicketHidden );

				//Assign a hidden input values
				$('.hiddenResponseID').val(responseID);

				//Show response button
				$('#sendResponse').removeClass('hidden').css({'display':'inline-block'});
			})

		$('#sendResponse')
			.click(function () 
			{
				/* POST: reply ticket */
				var formID = $('#form-replyTicket').attr('id');
				var modalID = $('#ticketModal').attr('id');

				if ( $('.ticketResponseData ul li:eq('+replyID+') .replyTicket form textarea[name="reply"]').val() != '' ) 
				{
					//Remove error class and text
					$('#'+formID+' div').removeClass('has-error');
					$('#'+formID+' div p').addClass('hidden');

					//Send reply form
					$.ajax({
						url: 'site/reply_ticket',
						type: 'POST',
						data: $('.ticketResponseData ul li:eq('+replyID+') .replyTicket #'+formID).serialize(),
						success: function (data) {
							$('#'+modalID+' .modal-body-content').html(data);

							//Hide response button
							$('#sendResponse').addClass('hidden');
						}
					});

					return true;
				}
				else
				{
					var emptyarea = "<?php echo $this->lang->line('lang_valid_emptyarea'); ?>";

					//Add error class and text
					$('#'+formID+' div').addClass('has-error');
					$('#'+formID+' div p').removeClass('hidden').html( emptyarea );

					return false;
				};
			})
	})
</script>

<div class="hidden" id="replyTicketHidden">
	<form method="post" id="form-replyTicket">
		<div class="form-group">
			<input type="hidden" name="hiddenResponseID" class="hiddenResponseID">
			<textarea name="reply" id="reply" class="form-control" rows="3" placeholder="Cevap yazın"></textarea>
			<p class="text-danger hidden"></p>
		<!-- .form-group --> </div>
	</form>
<!-- .hidden --> </div>

<div class="ticketResponseData">
	
		<ul class="response-list">
			<?php
			foreach ($response as $k => $v) :
				$member_group = $this->Model_Site->get_member_info($v->member_id, 'member_group'); ?>
				<li>
					<h3 class="author">
						<div class="pull-left">
							<span class="label label-info pull-left"><?php echo mb_strtoupper($member_group==1 ? $this->lang->line('lang_authorized') : $this->lang->line('lang_customer'), 'utf-8'); ?></span>
							<span class="label label-warning pull-left"><?php echo mb_strtoupper($this->Model_Site->get_customer_info($v->member_id, 'customer_name').' '.$this->Model_Site->get_customer_info($v->member_id, 'customer_surname'), 'utf-8'); ?></span></div>
						<div class="pull-right">
							<p><i class="fa fa-clock-o"></i> <?php echo convertdate($v->ticket_date, 'datetime', 'M d, Y'); ?></p>

						</div>

						<div class="clearfix"></div>
					<!-- h3.author --> </h3>
					<span class="response">
						<p><?php echo $v->ticket_content; ?></p>
						<?php if ( ($member_group == 1) && ($v->ticket_id == $last_response_id) && ($ticket_status == 1) ) { ?>
							<p class="pull-right"><a href="javascript:void(0);" id="<?php echo $k; ?>" class="reply" data-id="<?php echo $v->ticket_id; ?>" data-response-id="<?php echo $v->response_id; ?>"><i class="fa fa-reply"></i> <?php echo $this->lang->line('lang_reply'); ?></a></p>
						<?php } ?>

						<div class="clearfix"></div>
					<!-- span.response --> </span>

					<div class="replyTicket"></div>
				</li>
			<?php endforeach; ?>
		</ul>

<!-- .ticketResponseData --> </div>