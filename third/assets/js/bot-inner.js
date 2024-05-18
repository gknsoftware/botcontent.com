$(function(){
    /*  Bootstrap
    --------------------------------------------------*/
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({
        html : true
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
});