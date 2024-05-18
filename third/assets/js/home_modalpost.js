$(function() {
	function autoHideElement(element, time)
	{
		setTimeout(function() {
			$(element).fadeOut(function () {
				$(element).addClass('hidden');
			});
		}, time);
	}

	/*############################################################
	#
	#	PAGE: HOME
	#
	############################################################

	/*	POST: show news
	--------------------------------------------------*/
	$('.showNews')
		.click(function () 
		{
			var modal = $('#readNewsModal');
			var modalBodyContent = $('#readNewsModal .modal-body-content');
			var news_id = $(this).data('id');

			$.post("home/show_news",
			{
				news_id: news_id
			},
			function(data, status){
				modalBodyContent.html(data);
				modal.modal('show');
			});
		});
		
});