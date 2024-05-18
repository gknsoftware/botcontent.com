var base_url = window.location.origin;
// "http://private.botcontent.com"

var host = window.location.host;
// private.botcontent.com

var pathArray = window.location.pathname.split( '/' );
// ["", "home", "21246818", "site/support"]

/**
 * Set a cookie
 * @param {[type]} cname  [description]
 * @param {[type]} cvalue [description]
 * @param {[type]} exdays [description]
 */
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

/**
 * Get a cookie
 * @param  string cname Cookie name.
 * @return mixed
 */
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

//Bootstrap
$("[id='switch']").bootstrapSwitch();
$('[data-toggle="tooltip"]').tooltip();
$('.dropdown-toggle').dropdown();
$('[data-toggle="popover"]').popover({
	html : true
});
$('.modal').on('hidden.bs.modal', function(){
	$(this).hide();
});

$(function(){
	/*	GOGO: auto hide element
	--------------------------------------------------*/
 	function autoHideElement(element, time)
	{
		setTimeout(function() {
			$(element).slideUp(function () {
				$(element).addClass('hidden');
			});
		}, time);
	}

	/*	GOGO: blink to first element
	--------------------------------------------------*/
	var stopBlinking = false;
	setTimeout(function() 
	{
		stopBlinking = true;
	}, 3000);

	function blink(selector) {
		$(selector).fadeOut('slow', function() {
			$(this).fadeIn('slow', function() {
				if (!stopBlinking)
				{
					blink(this);
				}
				else
				{
					$(this).show();
				}
			});
		});
	}
	blink('.first-blink tbody tr:first'); //blink: table first element
	blink('.blink'); //blink: all elements

	/*  CHANGE: Button text
  	--------------------------------------------------*/
	$("button[data-loading-text]")
		.click(function() 
		{
			var $btn = $(this);
			$btn.button('loading');
			// simulating a timeout
			setTimeout(function () {
				$btn.button('reset');
			}, 1000);
		});

	/*	GOGO: tree menu
	--------------------------------------------------*/
    $('label.tree-toggler')
	    .click(function () 
	    {
	    	var labelID = $(this).attr('id');
	    	var c = 0;
	        $(this).parent().children('ul.tree').slideToggle(300);
	    });

	/*	GOGO: selectable table rows
	--------------------------------------------------*/
	$('table[data-toggle="selectable-rows"] tbody tr')
		.click(function () 
		{
			$('.panel-edit').removeClass('hidden');

			var id=$(this).attr('id');
	        $('table[data-toggle="selectable-rows"] tbody tr').removeClass('info');
	        $('#'+id).addClass('info');
	        $('.company-logo img').removeClass('show');
	        $('.company-logo img[data-img="'+id+'"]').addClass('show');

	        $('.panel-edit .panel-heading strong').html($(this).data('panel-title'));
		});

	/*	GOGO: toggle panel
	--------------------------------------------------*/
	var numT = 0;
	$('*[data-toggle="panel-toggle"]')
		.click(function () 
		{
			var dataTarget = $(this).data('target');

			$(dataTarget).slideToggle(function () {
				var arrow = $(this).parent().children();

				if (numT==0) {
					$('.'+$(arrow).attr('class')+' i').removeClass('fa-sort-up');
					$('.'+$(arrow).attr('class')+' i').addClass('fa-sort-down');

					return numT=1;
				}else{
					$('.'+$(arrow).attr('class')+' i').addClass('fa-sort-up');
					$('.'+$(arrow).attr('class')+' i').removeClass('fa-sort-down');

					return numT=0;
				}
			});
		})

	/*	jUI: sortable
	--------------------------------------------------*/
	$( ".column" ).sortable({
		connectWith: ".column",
		handle: ".portlet-header",
		cancel: ".portlet-toggle",
		placeholder: "portlet-placeholder ui-corner-all"
	});
 
	$( ".portlet" )
		.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
		.find( ".portlet-header" )
			.addClass( "ui-widget-header ui-corner-all" )
			.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
 
	$( ".portlet-toggle" ).click(function() {
		var icon = $( this );
		icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
		icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
	});

	/*	GOGO: data-style-*
	#	DESC: easy style assignment
	--------------------------------------------------*/
	$( "*" ).each(function( index ) {
		var prop_width = $(this).data('width');
		var prop_height = $(this).data('height');
		var prop_bg = $(this).data('bg');
		var prop_bgcolor = $(this).data('bgcolor');
		var prop_padding = $(this).data('padding');
		var prop_margin = $(this).data('margin');
		var prop_text_align = $(this).data('text-align');
		var prop_font_color = $(this).data('font-color');
		var prop_font_weight = $(this).data('font-weight');
		var prop_font_size = $(this).data('font-size');
		var prop_display = $(this).data('display');
		var prop_position = $(this).data('position');
		var prop_top = $(this).data('top');
		var prop_left = $(this).data('left');

		if (prop_width != undefined) {
			$('*[data-width="'+prop_width+'"]').css('width', prop_width);
		};
		if (prop_height != undefined) {
			$('*[data-height="'+prop_height+'"]').css('height', prop_height);
		};
		if (prop_bgcolor != undefined) {
			$('*[data-bgcolor="'+prop_bgcolor+'"]').css('background-color', prop_bgcolor);
		};
		if (prop_padding != undefined) {
			$('*[data-padding="'+prop_padding+'"]').css('padding', prop_padding);
		};
		if (prop_margin != undefined) {
			$('*[data-margin="'+prop_margin+'"]').css('margin', prop_margin);
		};
		if (prop_text_align != undefined) {
			$('*[data-text-align="'+prop_text_align+'"]').css('text-align', prop_text_align);
		};
		if (prop_font_color != undefined) {
			$('*[data-font-color="'+prop_font_color+'"]').css('color', prop_font_color);
		};
		if (prop_font_weight != undefined) {
			$('*[data-font-weight="'+prop_font_weight+'"]').css('font-weight', prop_font_weight);
		};
		if (prop_font_size != undefined) {
			$('*[data-font-size="'+prop_font_size+'"]').css('font-size', prop_font_size);
		};
		if (prop_display != undefined) {
			$('*[data-display="'+prop_display+'"]').css('display', prop_display);
		};
		if (prop_position != undefined) {
			$('*[data-position="'+prop_position+'"]').css('position', prop_position);
		};
		if (prop_top != undefined) {
			$('*[data-top="'+prop_top+'"]').css('top', prop_top);
		};
		if (prop_left != undefined) {
			$('*[data-left="'+prop_left+'"]').css('left', prop_left);
		};
		if (prop_bg != undefined) {
			$('*[data-bg="'+prop_bg+'"]').css({ 'background-image': 'url('+prop_bg+')', 'background-size': 'cover', '-webkit-background-size': 'cover', '-moz-background-size': 'cover', '-o-background-size': 'cover', '-ms-background-size': 'cover' });
		};
	});

	/*	ADD: active class for menu
	--------------------------------------------------*/
	//left menu
	$('.left-menu ul li a')
		.each(function () 
		{
			if ($(this).attr('href') == window.location) {
				$(this).addClass('active')
			};
		});
	//header menu
	$('.header-menu li a')
		.each(function () 
		{
			if ($(this).attr('href') == window.location) {
				$(this).parent().addClass('active');
			};
		})

	/*	GOGO: language selection
	--------------------------------------------------*/
	$('.select-language li')
		.click(function () 
		{
			var index = $(this).index();

			//add active class
			$('.select-language li').removeClass('active');
			$('.select-language li').eq(index).addClass('active');
		});
	//dismiss language selection modal
	$('#languageSelectionModal').on('hidden.bs.modal', function () {
		//remove all active class
		$('.select-language li').removeClass('active');

		//add 	active class for current lang
		$('.select-language li')
			.each(function () 
			{
				var id_lang = $(this).attr('id');

				if (id_lang != undefined) {
					$('#'+id_lang).addClass('active');
				};
			})
	});

	/*	GOGO: form validation
	--------------------------------------------------*/
	function validate_error(t, m, v)
	{
		//Success to error
		var returned = t.addClass('has-error');

		if (v!='single') {
			//Multiple valid message
			var returned = t.children('p').removeClass('hidden').addClass('show');
			var returned = t.children('p').html(m);
		}else{
			//Single valid message
			var returned = $('#valid-single').removeClass('hidden').addClass('show').html(m);
		};

		return returned;
	}

	function validate_success(t, m, v)
	{
		//error to success
		var returned = t.removeClass('has-error');
		var returned = t.children('p').removeClass('show').addClass('hidden');

		return returned;
	}

	$('#formvalid')
		.click(function () 
		{
			var form = $(this).data('form');
			var valid_type = $('form#form-'+form).data('valid-type');
			var email_pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			
			var isValid = true;
			$('form#form-'+form+' div')
				.each(function (e) 
				{
					//Data parameters
					var validate = $(this).data('validate');
					var validtext = $(this).data('validtext');
					var second_validtext = $(this).data('second-validtext');

					//Input val
					var input = $(this).children('input,textarea').val();

					//Input type
					var type = $(this).children('input').attr('type');

					if ( (validate == 'required') && (input == '') ) {
						validate_error($(this), validtext, valid_type);
						isValid = false;
					}else if ( (validate == 'required') && (type == 'email') && (!email_pattern.test(input)) ) {
						validate_error($(this), second_validtext, valid_type);
						isValid = false;
					}else{
						validate_success($(this), null, valid_type);
					}
				});

			//Check validate
			if (isValid == false) {
				$('form#form-'+form).parent().parent().removeClass('panel-primary').addClass('panel-danger');
				return false;
			}else{
				$('form#form-'+form).parent().parent().removeClass('panel-danger').addClass('panel-primary');
				$('#valid-single').removeClass('show').addClass('hidden');

				//To reduce the transparency of the table
				$('table[data-toggle="selectable-rows"] tbody').css({ opacity: 0.5 });

				return true;
			};
			
		});

	$('form')
		.click(function () 
		{
			$('#hidden-elements').fadeIn('fast');
		})

	$('table[data-toggle="selectable-rows"]')
		.click(function () 
		{
			$('#hidden-elements').hide();
		})

	/*	GOGO: ticket form
	--------------------------------------------------*/
	$('ul.ticket-department li')
		.click(function ()
		{
			var department_id = $(this).data('id');
			var department_name = $(this).data('name');

			//Fill department values
			$('#department').html(department_name);
			$('#ticket form input[name="department"]').val(department_id);

			//Change current user styles
			$('.ticket-current-user').css({'border':'1px solid #ccc'});

			//Hide departments and show ticket form
			$('.ticket-department').addClass('hidden');
			$('#ticket').fadeIn('fast').removeClass("hidden");
		});
	$('.changeDepartment')
		.click(function ()
		{
			//Empty department values
			$('#department').html('');
			$('#ticket form input[name="department"]').val('');

			//Change current user styles
			$('.ticket-current-user').css({'border':'0'});

			//Hide departments and show ticket form
			$('.ticket-department').removeClass('hidden').addClass('show');
			$('#ticket').removeClass("show").addClass('hidden');

			$('#ticket form')[0].reset();
		});

	/*	MODALPOST: change language
	--------------------------------------------------*/
	var lang_href;
	$('.select-language li')
		.click(function () 
		{
			var index = $(this).index();

			lang_href = $('.select-language li a').eq(index).data('href');
		});

	$('#changeLanguage')
		.click(function () 
		{
			if (lang_href != undefined) {
				$.post("home/change_language",
				{
					language: lang_href
				},
				function(data, status){
					$('.modal-body-content').html(data);
					$('#languageSelectionModal').modal('hide');
					
					window.location.href = window.location.href;
				});
			};
		});

	$('#tip_faqlist')
		.click(function () 
		{
			$('.faq-sidebar').toggle("shake", function () {
				$(this).show();
			});
		});

	/*	GOGO: custom location
	--------------------------------------------------*/
	$('[data-location]').click(function () {
		var href = $(this).data('location');

		return window.location.href = href;
	});

	//_blank target
	$('[data-location-blank]').click(function () {
		var href = $(this).data('location-blank');

		return window.open(href,'_newtab');
	})

	/*	GOGO: hidden to visible element
	--------------------------------------------------*/
	var clickCount = 0;
	$('*')
		.each(function( index ) {
			if ($(this).data('hide') != undefined) {
				var elem = $(this).data('hide');				
				
				$(this).children()
					.click(function () {
						if (clickCount == 0) {
							clickCount = 1;
							$(this).find(elem).removeClass('hidden');
						}else{
							clickCount = 0;
							$(this).find(elem).addClass('hidden');
						};
					});
				$('.dropdown')
					.on('hide.bs.dropdown', function () {
						$(this).find(elem).addClass('hidden');
					});
			};
		});

	/*	GOGO: change system theme
	--------------------------------------------------*/
	if (getCookie('site_tpl') != '') {
		var asd = $('.selectTheme option[value="'+getCookie('site_tpl')+'"]').attr('selected', 'selected');
	};
	function changeTheme()
	{
		var currentTheme = $('#theme').attr('href');
		var theme = $(this).val();
		var previewImage = $(this).find('option[value="'+theme+'"]').data('preview');

		//Post data
		$.post("home/change_template",
		{
			template: theme
		},
		function(data, status){
			$('#settingsModal').modal('hide');
			window.location.href = window.location.href;
		});
	}
	$('.selectTheme').on('change', changeTheme);

	/*	GOGO: dynamic css animate
	--------------------------------------------------*/
	function setCssAnimate(startTime, endTime) {
		setInterval(cssAddAnimate, startTime);
		setInterval(cssRemoveAnimate, endTime);
	}

	function cssAddAnimate() {
		$('.dynAnimate').addClass('animated tada');
	}

	function cssRemoveAnimate() {
		$('.dynAnimate').removeClass('animated tada');
	}

	setCssAnimate(1, 8000);

	/*	GOGO: show/hide all website plans
	--------------------------------------------------*/
	var showHideCounter = 0;
	function showOtherMySites()
	{
		if (showHideCounter == 0) {
			//Show sites
			$('.hideAllMySites').fadeIn(350).removeClass('hidden');
			$('.showAllMySites div:last').css({ 'font-weight':'bold' });

			showHideCounter = 1;
		}else{
			//Hide sites
			$('.hideAllMySites').addClass('hidden');
			$('.showAllMySites div:last').css({ 'font-weight':'normal' });

			showHideCounter = 0;
		}
	}
	$('.showAllMySites').on('click', showOtherMySites);

	/* GOGO:POST: update settings
	--------------------------------------------------*/
	function post_UpdateSettings()
	{
		var btnID = $(this).attr('id');
		var formID = $('#form-'+btnID);
		var modalID = $('#settingsModal').attr('id');

		$('.table-ozgunlestirme tbody').removeClass('animated fadeIn');

		$.ajax({
			url: 'home/update_settings',
			type: 'POST',
			data: formID.serialize(),
			success: function (data) {
				//show success alert
				$('#'+modalID+' .modal-footer .saveChanges').removeClass('hidden').css({ 'display':'block' }).html('<strong>Okay!</strong> Değişiklikler kaydedildi.');
				
				//Refresh replaced keyword list
				$('input[name="text_findkeywords[]"]').each(function(key, index){
					$('.table-ozgunlestirme tbody').load(base_url+'/home/load_get_option_by_group/replaced_keywords').addClass('animated fadeIn');
				});

				//hide success message
				autoHideElement('.autohide', 3000);
			}
		});
	}
	$('#updateSettings').on('click', post_UpdateSettings);

	/* GOGO:POST: delete settings
	--------------------------------------------------*/
	function post_DeleteSettings()
	{
		var result = confirm("Silmek istediğinize emin misiniz?");
		if (result)
		{
			var optionID = $(this).data('id');

			$.post('home/delete_settings',{ opt_name: $(this).data('option') }, function(data, status){	
				$('tr#row-'+optionID).css({ 'background-color':'red', 'color':'white' }).fadeOut(500);
			});
		}
	}
	$('.deleteSettings').on('click', post_DeleteSettings);
	
	/* GOGO:POST: update settings
	--------------------------------------------------*/
	function post_UpdateDefaults()
	{
		var btnID = $(this).attr('id');
		var formID = $('#form-'+btnID);
		var modalID = $('#defaultsModal').attr('id');

		$.ajax({
			url: 'home/update_defaults',
			type: 'POST',
			data: formID.serialize(),
			success: function (data) {
				//show success alert
				$('#'+modalID+' .modal-footer .saveChanges').removeClass('hidden').css({ 'display':'block' }).html('<strong>Okay!</strong> Değişiklikler kaydedildi.');
				
				//Refresh replaced keyword list
				$('input[name="text_findkeywords[]"]').each(function(key, index){
					$('.table-ozgunlestirme tbody').load(base_url+'/home/load_get_option_by_group/replaced_keywords').addClass('animated fadeIn');
				});

				//hide success message
				autoHideElement('.autohide', 3000);
			}
		});
	}
	$('#updateDefaults').on('click', post_UpdateDefaults);
	
	/* GOGO: Add multiple form group
	--------------------------------------------------*/
	$(function () {

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            $(this)
                .toggleClass('btn-success btn-add btn-danger btn-remove')
                .html('–');

            $formGroupClone.find('input').val('');
            $formGroupClone.find('.concept').text('Phone');
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var selectFormGroup = function (event) {
            event.preventDefault();

            var $selectGroup = $(this).closest('.input-group-select');
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();

            $selectGroup.find('.concept').text(concept);
            $selectGroup.find('.input-group-select-val').val(param);

        }

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);
        $(document).on('click', '.dropdown-menu a', selectFormGroup);

    }); //Dynamic form field
	
	/* GOGO: Refresh the page when the window closes
	--------------------------------------------------*/
	$('#settingsModal').on('hidden.bs.modal', function () {
		window.location.href = window.location.href;
	})

});










