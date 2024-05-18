$(function(){
	/*	GOGO: refresh remote client connection status
	--------------------------------------------------*/
	function checkConnection()
	{
		var href = $(this).attr('href');
		var siteID = $(this).data('site-id');

		//Preloader icon
		$('td#site-id-'+siteID).html('kontrol ediliyor...');

		//Post data
		$.post("site/check_remote_client",{ url: href, site_id: siteID }, function(data, status){
			$('td#site-id-'+siteID).html(data);
		});

		return false;
	}
	$('.checkConnection').on('click', checkConnection);

	/*	GOGO: sync remote connection
	--------------------------------------------------*/
	function syncRemoteConnection()
	{
		var url = $(this).data('sync-url');
		var siteID = $(this).data('sync-id');

		//Preloader
		$('#syncRemoteClient .modal-body-content').html('<p>Websiteniz senkronize ediliyor. Lütfen bekleyiniz...</p><p><small style="color:#666;font-size:.8em;">'+url+'</small></p>');
		$('#syncRemoteClient .modal-footer div').html('<div class="sk-wave" style="margin:0;"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>');
		$('#syncRemoteClient .modal-footer button').addClass('hidden');

		//Post data
		$.post("site/sync_remote_client",{ url: url, site_id: siteID }, function(data, status){
			$('#syncRemoteClient .modal-body-content').html(data);
			$('#syncRemoteClient .modal-footer div').html('');
			$('#syncRemoteClient .modal-footer button').removeClass('hidden');
		});
	}
	$('a[data-sync-url]').on('click', syncRemoteConnection);
});