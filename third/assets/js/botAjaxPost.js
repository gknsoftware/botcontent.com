$(function(){

	/**
	 * Global variables
	 * @type mixed
	 */
	var getCat = $('input[name="getCat"]').val();
	var getBot = $('input[name="getBot"]').val();
	var subcat = $('.subcategory option:first').val();
	var page = 1;
	var link;

	/**
	 * Text kutusuna girilen sayfa numarasına git.
	 * @return string
	 */
	function getCategories()
	{
		subcat = $(this).val();
		subcatHTML = $('select.subcategory option:selected').html();

		//Reset page number in "textbox"
		$('#page').val(1);
		page = 1;

		//Add current input to "subcat" value
		$('input[name="_getSubcat"]').val( $(this).val() );

		//Preloader icon
		$('#contentlist').html( '<div class="sk-wave"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>' );

		//Get content list in current category
		$.post( 'bot/selectedCategory/'+getCat+'/'+getBot+'/'+subcat+'/1' )
			.done(function( data ) {
				//Render data
				$('#contentlist').html( data );

				//goto that anchor by setting the body scroll top to anchor top
				$('html, body').animate({scrollTop:$("#listedContent").offset().top}, 'slow');

				//Show current page
				$('.current-cat').html( subcatHTML );

				//Show current page
				$('.current-page').html( '1.' );

				//Listed info
				$('.listed-info').removeClass('hidden');
			});
	}
	$('.subcategory').on('change', getCategories);

	/**
	 * Text kutusuna girilen sayfa numarasına git.
	 * @return string
	 */
	function getPage()
	{
		page = $('#page').val();

		//Add current input to "subcat" value
		$('input[name="_getPage"]').val( $('#page').val() );

		//Preloader icon
		$('#contentlist').html( '<div class="sk-wave"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>' );

		//Get content list in current category
		$.post( 'bot/selectedCategory/'+getCat+'/'+getBot+'/'+subcat+'/'+page )
			.done(function( data ) {
				//Render data
				$('#contentlist').html( data );

				//goto that anchor by setting the body scroll top to anchor top
				$('html, body').animate({scrollTop:$("#listedContent").offset().top}, 'slow');

				//Show current page
				$('.current-page').html( page+'.' );

				//Listed info
				$('.listed-info').removeClass('hidden');
			});
	}
	$('#page').on('keyup', getPage);
	$('#page').on('change', getPage);

	/**
	 * Seçilen içeriği hedef siteye ekle.
	 * @return string
	 */
	function addTargetSite()
	{
  		var formID = $('#form-addNewContent');
		var action = formID.attr('action');

		$.post( action, $('#form-addNewContent').serialize(), function( data, status ) {
			alert(data);
		});
		$.ajax({
			type: "POST",
			url: action,
			crossDomain: true,
			data: formID.serialize(),
			success: function (data) {
				alert(data);
			},
			error: function (err) {
				// handle your error logic here
			}
		});

		return false;


		//Preloader icon
		//$('#addContent #editable').html( '<div class="sk-wave"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>' );

		//Show single content
		//$('#single-notification').removeClass('hidden');
		//$('#hide-single-content').addClass('hidden');

		//Get content list in current category
		/*$.post( 'bot/selectedContent/'+_getCat+'/'+_getBot+'/'+_getSubcat+'/'+_getPage+'/'+_getLink )
			.done(function( data )
			{
				//Get json data
				$('#addContent #editable').html(data);
			});*/
	}
	$('.addTargetSite').on('click', addTargetSite);

	/**
	 * Seçilen içeriği havuza ekle.
	 * @return string
	 */
	function addReposity()
	{
  		
		alert($( '#form-addNewContent' ).serialize());

		//Preloader icon
		//$('#addContent #editable').html( '<div class="sk-wave"> <div class="sk-rect sk-rect1"></div> <div class="sk-rect sk-rect2"></div> <div class="sk-rect sk-rect3"></div> <div class="sk-rect sk-rect4"></div> <div class="sk-rect sk-rect5"></div> </div>' );

		//Show single content
		//$('#single-notification').removeClass('hidden');
		//$('#hide-single-content').addClass('hidden');

		//Get content list in current category
		/*$.post( 'bot/selectedContent/'+_getCat+'/'+_getBot+'/'+_getSubcat+'/'+_getPage+'/'+_getLink )
			.done(function( data )
			{
				//Get json data
				$('#addContent #editable').html(data);
			});*/
	}
	$('.addReposity').on('click', addReposity);

});