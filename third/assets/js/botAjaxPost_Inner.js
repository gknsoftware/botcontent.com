$(function(){

	/**
	 * Global variables
	 * @type mixed
	 */
	var _getCat = $('input[name="getCat"]').val();
	var _getBot = $('input[name="getBot"]').val();
	var _getSubcat = $('input[name="_getSubcat"]').val();
	var _getPage = 1;
	var _getLink;

	if ( $('input[name="_getPage"]').val() != '' ) { _getPage = $('input[name="_getPage"]').val(); };
	if ( $('input[name="_getSubcat"]').val() == '' ) { _getSubcat = $('.subcategory option:first').val(); };

	/**
	 * Seçilen içeriği getir.
	 * @return string
	 */
	function getArticle()
	{
		_getLink = $(this).data('link');

		//Preloader icon
		$('#addContent #editable').html( '<div class="sk-wave"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>' );

		//Show single content
		//$('#single-notification').removeClass('hidden');
		//$('#hide-single-content').addClass('hidden');

		//Get content list in current category
		$.post( 'bot/selectedContent/'+_getCat+'/'+_getBot+'/'+_getSubcat+'/'+_getPage+'/'+_getLink )
			.done(function( data )
			{
				//Get json data
				$('#addContent #editable').html(data);
			});
	}
	$('.GetArticle').on('click', getArticle);

	

});