//Global variables
var clickCount = 0;
var title;
var content;
var tags;

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
	if (clickCount === 0)
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
	}
}

$(function(){
	/*	Bootstrap
	--------------------------------------------------*/
	$('.selectpicker').selectpicker();
	
	/*	INIT: Number button up/down
	--------------------------------------------------*/
	hideColumn();
	$('.getBotList').on('click', showColumn);

	/*	GOGO: Number button up/down
	--------------------------------------------------*/
	$('.btn-number').click(function(e){
        e.preventDefault();
        
        var fieldName = $(this).attr('data-field');
        var type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {
                var minValue = parseInt(input.attr('min')); 
                if(!minValue) minValue = 1;
                if(currentVal > minValue) {
                    input.val(currentVal - 1).change();
                } 
                if(parseInt(input.val()) == minValue) {
                    $(this).attr('disabled', true);
                }
    
            } else if(type == 'plus') {
                var maxValue = parseInt(input.attr('max'));
                if(!maxValue) maxValue = 9999999999999;
                if(currentVal < maxValue) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == maxValue) {
                    $(this).attr('disabled', true);
                }
    
            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {
        
        var minValue =  parseInt($(this).attr('min'));
        var maxValue =  parseInt($(this).attr('max'));
        if(!minValue) minValue = 1;
        if(!maxValue) maxValue = 9999999999999;
        var valueCurrent = parseInt($(this).val());
        
        var name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        
        
    });
    $(".input-number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) || 
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
    });

    /*  GOGO: Live search table
    --------------------------------------------------*/
    var activeSystemClass = $('.list-group-item.active');

    $('#system-search').click(function () {
        //goto that anchor by setting the body scroll top to anchor top
        $('html, body').animate({scrollTop:$("#listedContent").offset().top}, 'slow');
    })

    //something is entered in search form
    $('#system-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Aranıyor: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">Hiç kayıt bulunamadı.</td></tr>');
        }
    });

    /*  GOGO: Check and checkall
    --------------------------------------------------*/
    $("#contentlist table #checkall").click(function () {
        if ($("#contentlist table #checkall").is(':checked')) {
            $("#contentlist table input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

            //Show process button group
            $('#buttonbox').removeClass('hidden');
            $('#searchbox').addClass('hidden');

        } else {
            $("#contentlist table input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });

			//Hide process button group
			$('#buttonbox').addClass('hidden');
			$('#searchbox').removeClass('hidden');
        }
    });

	$("#contentlist table input[type=checkbox]").click(function () {
		if ($("#contentlist table input[type=checkbox], #contentlist table #checkall").is(':checked')) {
			//Show process button group
			$('#buttonbox').removeClass('hidden');
			$('#searchbox').addClass('hidden');
		} else {
			//Hide process button group
			$('#buttonbox').addClass('hidden');
			$('#searchbox').removeClass('hidden');
		}
	});

    /*  GOGO: Select and hide selectpicker
    --------------------------------------------------*/
    function hideSelectpicker()
    {
        $('div.subcategory').removeClass('open');
    }
    $('ul.selectpicker li').on('click', hideSelectpicker);

    /**
     * Simple content preview mode.
     * @return string
     */
    function preview()
    {
        title = $('#title').val();
        content = tinyMCE.activeEditor.getContent();
        $('.previewContent').html('<h1>'+title+'</h1>'+content);
    }
    $('.refresh').on('click', preview);

    /**
     * Ara, bul ve değiştir
     * 
     * @param  string find String içerisinde aranacak kelimeler.
     * @param  string replace Değiştirilecek yeni kelimeler.
     * @return string
     */
    String.prototype.replaceArray = function(find, replace) {
        var replaceString = this;
        var regex; 
        for (var i = 0; i < find.length; i++) {
            regex = new RegExp(find[i], "g");
            replaceString = replaceString.replace(regex, replace[i]);
        }
        return replaceString;
    };

    /**
     * Eşleşen kelimeleri değiştir
     * @return string
     */
    function replaceWords()
    {
        //Replace keywords
        var find = JSON.parse( JSON.stringify( $(this).data('find-words') ) );
        var replace = JSON.parse( JSON.stringify( $(this).data('replace-words') ) );
        var replacePreview = JSON.parse( JSON.stringify( $(this).data('replace-words-highlights') ) );
        var newContent;
        var contentPreview;

        if (find=='' || replace=='')
        {
            alert('Hiçbir aranacak veya yeni değer bulunamadı.\nİpucu: Eklenti ayarlarından bu değerleri belirleyebilirsiniz.');
        }
        else
        {
            newContent = content.replaceArray(find, replace);
            contentPreview = content.replaceArray(find, replacePreview);

            //Replace "preview" text
            $('.previewContent').html('<h1>'+title+'</h1>'+contentPreview);

            //Replace "tinymce" text
            tinyMCE.activeEditor.setContent(newContent);
        }
    }
    $('.replaceWords').on('click', replaceWords);

    /**
     * Eşleşen ve değişen kelimeleri geri al.
     * @return string
     */
    function undoWords()
    {
        //Replace keywords
        var find = JSON.parse( JSON.stringify( $(this).data('replace-words') ) );
        var replace = JSON.parse( JSON.stringify( $(this).data('find-words') ) );
        var newContent;

        if (find=='' || replace=='')
        {
            alert('Hiçbir aranacak veya yeni değer bulunamadı.\nİpucu: Eklenti ayarlarından bu değerleri belirleyebilirsiniz.');
        }
        else
        {
            newContent = content.replaceArray(find, replace);

            //Replace "preview" text
            $('.previewContent').html('<h1>'+title+'</h1>'+newContent);

            //Replace "tinymce" text
            tinyMCE.activeEditor.setContent(newContent);
        }
    }
    $('.undoWords').on('click', undoWords);
	
	//  
    $('select#status').change(function() {
        var selectedSchedule = $(this).val();

		if(selectedSchedule == 'future')
		{
			$('#'+selectedSchedule+'Div').removeClass('hidden');	
		}
		else
		{
			$('#futureDiv').addClass('hidden');		
		}
    });

});