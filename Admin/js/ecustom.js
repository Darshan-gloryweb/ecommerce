(function($) { 
"use strict";

// update Bulk Order Status
$('.up-btn').click(function(){

    var ustatus = $(".updatestatus").val();
	var bulkorderid = $(".bulkorderid").val();
	var isbusiness = $(".isbusiness").val()
	$('.overlay').css('display','block');
 setTimeout(function() 
                {
    $.ajax
    ({ 
        url: 'updateostatus.php',
        data: {"ordertype": "bulkorder","status":ustatus, "id" : bulkorderid , "isbusiness" : isbusiness },
        type: 'post',
        success: function(result)
        {
        	$('.overlay').css('display','none');
        	alert(result);
            /*$('.modal-box').text(result).fadeIn(700, function() 
            {
                setTimeout(function() 
                {
                    $('.modal-box').fadeOut();
                }, 2000);
            });*/
        }
    });
}, 2000);
});
/*
var oTable;

     
		oTable = $('.data_order').dataTable();*/
		
		var data = Array();
			
			$("#dropdown1").change(function() {

			data[0] = $("#dropdown1").val();
			
			data[1] = $("#order_filter").val();

			
			$.fn.dataTableExt.search.push(
				function(oSettings, aData, iDataIndex) {
					var engineColumn = aData[0];
					
					if (engineColumn.indexOf(data[0]) != -1 && engineColumn.indexOf(data[1]) != -1) {
						return true;
					} else {
						return false;
					}
				}
			);
			$('.data_order').dataTable().fnDraw();
		});


})(jQuery);