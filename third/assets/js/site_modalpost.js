$(function() {

	/*############################################################
	#
	#	PAGE: SUPPORT
	#
	############################################################

	POST: show ticket
	--------------------------------------------------*/
	$('.showTicket')
		.click(function () 
		{
			var modal_content = $(this).data('modal-content');
			var ticket_id = $(this).data('id');
			var modalID = $('#ticketModal').attr('id');

			$(this).css({'font-weight':'normal'});

			//Post data
			$.post("site/show_ticket",
			{
				ticket_id: ticket_id
			},
			function(data, status){
				$('#'+modalID+' .modal-body-content').html(data);
				$('#'+modalID+' .modal-title a').attr('data-content', modal_content);
			});
		});
		
});