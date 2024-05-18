//Global variables
var clickCount = 0;

/**
 * Bot listesi sütununu gizlemek için.
 * @return string
 */
function hideColumn()
{	
	//Left column prop
	$('.left-column').css({ 'display': 'none' });

	//Right column prop
	$('.right-column').removeClass('col-md-push-2');
	$('.right-column').removeClass('col-lg-10').addClass('col-lg-12');
}

/**
 * Bot listesi sütununu göstermek için
 * @return string
 */
function showColumn()
{	
	if (clickCount == 0)
	{
		//Left column prop
		$('.left-column').fadeIn(250).css({ 'display': 'block' });

		//Right column prop
		$('.right-column').addClass('col-md-push-2');
		$('.right-column').removeClass('col-lg-12').addClass('col-lg-10');

		clickCount = 1;
	}
	else
	{
		//Left column prop
		$('.left-column').css({ 'display': 'none' });

		//Right column prop
		$('.right-column').removeClass('col-md-push-2');
		$('.right-column').removeClass('col-lg-10').addClass('col-lg-12');

		clickCount = 0;
	};
}

$(function(){
	
	//Init: Column show/hide
	hideColumn();
	$('.getBotList').on('click', showColumn);

});