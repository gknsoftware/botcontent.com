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
	#	PAGE: CUSTOMER
	#
	############################################################*/
	var row_id;
	var item_id;

	$('table[data-toggle="selectable-rows"] tbody tr')
		.click(function () 
		{
			//customer id assigned
	        $('#businessCard .modal-body').data('id', $(this).data('id'));
	        $('.cedit').data('id', $(this).data('id'));

			row_id = $('.cedit').data('id');
			item_id = $(this).attr('id');
		});

	/*	POST: delete customer
	--------------------------------------------------*/
	$('#deletecustomers')
		.click(function () 
		{
			//show loader
			$('#modal-bodytext').addClass('hidden');
			$('#loader').removeClass('hidden').addClass('show');

			$.post("supervisor/delete_customer",
			{
				member_id: row_id
			},
			function(data, status){
				$('#deleteItemModal').modal('hide');
				$('#modal-bodytext').removeClass('hidden').addClass('show');
				$('#loader').removeClass('show').addClass('hidden');

				$('table[data-toggle="selectable-rows"] tbody tr#'+item_id).removeClass('info').addClass('danger').fadeOut(1000);
			});
		});

	/*	POST: editable customer
	 *	Input değerlerini mevcut müşteri bilgileriyle değiştir
	--------------------------------------------------*/
	$('#editableCustomer')
		.click(function () 
		{
			$.post("supervisor/editable_customer",
			{
				member_id: row_id
			},
			function(data, status){
				$('#editCustomerModal .modal-body-content').html(data);
				$('#editCustomerModal').modal('show');

				//change modal subtitle
				$('#editCustomerModal .modal-title span').html($('.customer_company').html());

				//change modal form value
				$('#editCustomerModal form input[name="member_id"]').val($('.member_id').html());
				$('#editCustomerModal form input[name="customer_company"]').val($('.customer_company').html());
				$('#editCustomerModal form input[name="customer_name"]').val($('.customer_name').html());
				$('#editCustomerModal form input[name="customer_surname"]').val($('.customer_surname').html());
				$('#editCustomerModal form input[name="customer_email"]').val($('.customer_email').html());
				$('#editCustomerModal form input[name="customer_password"]').val('');
				$('#editCustomerModal form input[name="customer_phone"]').val($('.customer_phone').html());
				$('#editCustomerModal form select[name="member_group"]').val($('.customer_group').html());
				$('#editCustomerModal form select[name="customer_payment"]').val($('.customer_payment').html());
			});
		});

	/*	POST: edit customer
	 *	Input değerlerini gönder ve müşteriyi güncelle
	--------------------------------------------------*/
	$('#editCustomer')
		.click(function () 
		{
			var formID = $('#form-editCustomer').attr('id');
			var modalID = $('#editCustomerModal').attr('id');

			$.ajax({
				url: 'supervisor/edit_customer',
				type: 'POST',
				data: $('#'+formID).serialize(),
				enctype: 'multipart/form-data',
				async: false,
				success: function (data) {
					//updated customer info
					$('#'+modalID+' .modal-body-content').html(data);

					//refresh customer list
					$('table[data-toggle="selectable-rows"] tbody tr#'+item_id+' td a').eq(0).html( $('#'+formID+' input[name="customer_company"]').val() );
					$('table[data-toggle="selectable-rows"] tbody tr#'+item_id+' td').eq(1).html( $('#'+formID+' input[name="customer_name"]').val()+' '+$('#'+formID+' input[name="customer_surname"]').val() );
					$('table[data-toggle="selectable-rows"] tbody tr#'+item_id+' td').eq(2).html( $('#'+formID+' input[name="customer_email"]').val() );
					$('table[data-toggle="selectable-rows"] tbody tr#'+item_id+' td').eq(3).html( $('.customer_payment_text').html() );

					$('table[data-toggle="selectable-rows"] tbody tr#'+item_id).slideUp(300, function () {
						$('table[data-toggle="selectable-rows"] tbody tr#'+item_id).removeClass('info').addClass('success');
					}).delay( 200 ).fadeIn(300, function () {
						$('table[data-toggle="selectable-rows"] tbody tr#'+item_id).removeClass('success').addClass('info');
					});

					//hide success message
					autoHideElement('.autohide', 4000);
				}
			});
		});

	/*	POST: business card
	--------------------------------------------------*/
	$('#businessCard')
		.click(function () 
		{
			var modal = $('#businessCardModal');
			var modalBodyContent = $('#businessCardModal .modal-body-content');

			$.post("supervisor/business_card",
			{
				member_id: row_id
			},
			function(data, status){
				modalBodyContent.html(data);
				modal.modal('show');
			});
		});

	/*############################################################
	#
	#	PAGE: SECTOR
	#
	############################################################

	POST: delete sector
	--------------------------------------------------*/
	$('#deletesector')
		.click(function () 
		{
			//show loader
			$('#modal-bodytext').addClass('hidden');
			$('#loader').removeClass('hidden').addClass('show');

			$.post("supervisor/delete_sector",
			{
				sector_id: row_id
			},
			function(data, status){
				$('#deleteItemModal').modal('hide');
				$('#modal-bodytext').removeClass('hidden').addClass('show');
				$('#loader').removeClass('show').addClass('hidden');

				$('table[data-toggle="selectable-rows"] tbody tr#'+item_id).removeClass('info').addClass('danger').fadeOut(1000);
			});
		});

});