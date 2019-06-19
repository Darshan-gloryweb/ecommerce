jQuery( document ).ready(function($) {
	
	//var geturl = window.location.protocol + "//" + window.location.host + window.location.pathname;
//	alert(window.location.pathname);
	
	
	var catid = $("input[name=categoryid]").val();
	$('.filter-attribute-div').css('display','none');

	var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=1';
    window.history.pushState({path:newurl},'',newurl);
	var pathArray = window.location.pathname.split( 'brand-' );
	var brandname = pathArray[1];
	
	if(!brandname == ""){
		var brandid = $("input[name=brandid]").val();
		$.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
				dataType: "JSON",
                type:'POST',
				data:{catid:catid,brandid:parseInt(brandid)},
           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
                success:function(result){
					$('#loder_img').hide();
                    if(result.product_list != ''){
						$('#target-content').html(result.product_list);
					}else{
						$('#target-content').html('No Product Found');
					}
					$(".paginationhtml").html(result.filterdiv_7);
					$('.filter-value_div').html(result.filterdiv_1);
					//alert(response.filterdiv);
                	
				}
            });
			
		$('.filter-attribute-div').css('display','block');
		$('.subcat-list-div').css('display','none');
		
	}
	
	var brandid = parseInt($("input[name=brandid]").val());
	$('.brand-filter').each(function () {
		var brandval =parseInt($(this).find('input[type="checkbox"]').val());
		if(brandval == brandid){
			
			$('#aaqwqw-'+brandval).prop('checked', true);
			
		}
		
	});
	
	
	var prpathArray = window.location.pathname.split( 'price-' );
	var priceval = prpathArray[1];
	
	if(!priceval == ""){
		var mixpriceval = prpathArray[1].split( '-' );
		var menumin = mixpriceval[0];
		var menumax = mixpriceval[1];
		
		var minpriceval = $("input[name=priceval]").attr("data-min-value");
		var maxpriceval = $("input[name=priceval]").attr("data-max-value");
		if(maxpriceval !== ''){
			var maxpriceval = parseInt(maxpriceval);
		}else{
			var maxpriceval = '';
		}
		//alert(maxpriceval);
		
		$.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
				dataType: "JSON",
                type:'POST',
				data:{catid:catid,menuminprice:parseInt(minpriceval),menumaxprice:maxpriceval,page:1},
           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
                success:function(result){
					
					$('#loder_img').hide();
                    if(result.product_list != ''){
						$('#target-content').html(result.product_list);
					}else{
						$('#target-content').html('No Product Found');
					}
					$(".paginationhtml").html(result.filterdiv_7);
					$('.filter-value_div').append(result.filterdiv_3);
                	
				}
            });
		$('.filter-attribute-div').css('display','block');
		$('.subcat-list-div').css('display','none');
	
	}
	
	$('.price-filter').each(function () {
		var minpriceval =parseInt($(this).find('input[type="checkbox"]').attr("data-min-value"));
		var maxpriceval =parseInt($(this).find('input[type="checkbox"]').attr("data-max-value"));
		
		if(menumin == minpriceval && menumax == maxpriceval){
			
			$('#qwwqwqw-'+minpriceval+'-'+maxpriceval).prop('checked', true);
			
		}
		
	});
	
	$('.clear-div').click(function(){
		var clearfilter = 'allclear'
		$.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
				dataType: "JSON",
                type:'POST',
				data:{catid:catid,clearfilter:clearfilter},
           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
                success:function(result){
					//alert(result);
					$('#loder_img').hide();
                    $('#target-content').html(result.product_list);
					$('.item_filter').prop('checked', false);
					$('.filter-value_div').html('');
                	
				}
            });
		
	});

	
	if (typeof(brandname) == "undefined" && typeof(priceval) == "undefined" ){
		
		$.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
				dataType: "JSON",
                type:'POST',
				data:{catid:catid,page:1},
           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
                success:function(result){
					//alert(result);
					$(".paginationhtml").html(result.filterdiv_7);
					$('#loder_img').hide();
                    $('#target-content').html(result.product_list);
					
                	
				}
      });
	}
	
	
	
	
	
	
	
    //var colour,brand,size;
    	function doSomething(){
			
			
			
			
			$('#loder_img').show();
			$('.filter-value_div').html('');
			//alert('hiii');
			
			//$('.popularity').addClass('active');
//			$('.lowest_price').removeClass('active');
//			$('.height_price').removeClass('active');
//            $('#target-content').html('<div id="loaderpro" style="" ></div>');
        	
             
             
			 
			 if(!brandname == ""){
				var brandid = $("input[name=brandid]").val();
				if(brandid !== ''){
					var brand = parseInt(brandid);
				}else{
					var brand = '';
				}
			}
			if(!priceval == ""){
				var mixpriceval = prpathArray[1].split( '-' );
				var menumin = mixpriceval[0];
				var menumax = mixpriceval[1];
				
				var minpriceval = $("input[name=priceval]").attr("data-min-value");
				if(minpriceval !== ''){
					var minprice = parseInt(minpriceval);
				}else{
					var minprice = '';
				}
				var maxpriceval = $("input[name=priceval]").attr("data-max-value");
				if(maxpriceval !== ''){
					var maxprice = parseInt(maxpriceval);
				}else{
					var maxprice = '';
				}
			}
			
			 var catid = $("input[name=categoryid]").val();
             var brand  = multiple_values('brand');
			 var stock = multiple_values('stock');
			 var attr_var  = multiple_values('attr_var');
			 var minprice  = minprice_multiple_values('sprice');
			 var maxprice  = maxprice_multiple_values('sprice');
			 var mindiscount  = minprice_multiple_values('sdiscount');
			 var maxdiscount  = maxprice_multiple_values('sdiscount');
			 
			 if ($(this).hasClass("popularity")) {
				  		//sorting.push($(this).attr('data-value'));
						$(this).addClass('active');
						$('.lowest_price').removeClass('active');
						$('.height_price').removeClass('active');
						var sorting = '';
				 
			 }
		     if ($(this).hasClass("lowest_price")) {
				 
				  		//sorting.push($(this).attr('data-value'));
						$(this).addClass('active');
						$('.popularity').removeClass('active');
						$('.height_price').removeClass('active');
						var sorting = $(this).attr('data-value');
				 
			 }
			 
			 if ($(this).hasClass("height_price")) {
				  		//sorting.push($(this).attr('data-value'));
						$(this).addClass('active');
						$('.popularity').removeClass('active');
						$('.lowest_price').removeClass('active');
						var sorting = $(this).attr('data-value');
				 
			 }
			 
			 if ($(this).hasClass('item_page')){
				var pageNum = this.id;
				 
				 if($('.lowest_price').attr('data-value') == 'low'){
				 	if ($('.lowest_price').hasClass('active')){
						var sorting = 'low';
					}
				 }
				 
				
				
			}
			if ($(this).hasClass('item_page')){
				var pageNum = this.id;
				 
				 if($('.height_price').attr('data-value') == 'heigh'){
				 	if ($('.height_price').hasClass('active')){
						var sorting = 'heigh';
					}
				 }
				 
				
				
			}
			
			if(pageNum == ''){
				var pageNum = 1;
			}
			 //var sorting = 'low';
			 ///alert(sorting);
            $.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
				dataType: "JSON",
                type:'POST',
				data:{catid:catid,brand:brand,attr_var:attr_var,stock:stock,minprice:minprice,maxprice:maxprice,mindiscount:mindiscount,maxdiscount:maxdiscount,page:pageNum,sorting:sorting},
           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
                success:function(result){
					//alert(result);
					$('#loder_img').hide();
					if(result.product_list != ''){
						$('#target-content').html(result.product_list);
					}else{
						$('#target-content').html('No Product Found');
					}
					
					$(".paginationhtml").html(result.filterdiv_7);	
					
                    
					if(result.filterdiv_1 != ''){
						//alert('filterdiv_1');
						$('.filter-value_div').append(result.filterdiv_1);
					}
					if(result.filterdiv_2 != ''){
						//alert('filterdiv_2');
						$('.filter-value_div').append(result.filterdiv_2);
					}
					if(result.filterdiv_8 != ''){
						//alert('filterdiv_3');
						$('.filter-value_div').append(result.filterdiv_8);
					}
					if(result.filterdiv_3 != ''){
						//alert('filterdiv_3');
						$('.filter-value_div').append(result.filterdiv_3);
					}
					if(result.filterdiv_4 != ''){
						//alert('filterdiv_3');
						$('.filter-value_div').append(result.filterdiv_4);
					}
					if(result.filterdiv_5 != ''){
						//alert('filterdiv_3');
						$('.filter-value_div').append(result.filterdiv_5);
					}
					if(result.filterdiv_6 != ''){
						//alert('filterdiv_3');
						$('.filter-value_div').append(result.filterdiv_6);
					}
					
					//if($(".item_filter:checked")){
//						$('.popularity').addClass('active');
//						$('.lowest_price').removeClass('active');
//						$('.height_price').removeClass('active');
//					}
				
					
				}
            });
			$('.filter-attribute-div').css('display','block');
        
		}
        $('.item_filter').click(doSomething);
        
    
    	$(".paginationhtml").on("click","#pagination li", doSomething);
		
   
    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
			
        });
		
        return val;
    }
	function minprice_multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).attr("data-min-value"));
        });
        return val;
    }
	function maxprice_multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).attr("data-max-value"));
        });
        return val;
    }
	
	
   	
	
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;
	
		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');
	
			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
	
    
	//$('#shorting-pagi li').each(function(){
//					if ($(this).hasClass("active")) {
//				  		sorting.push($(this).attr('data-value'));    
//				 
//					}
//					       
//				});
	
	//$('.lowest_price').click(function(){
//		$('#loder_img').show();
//		
//		$(this).addClass('active');
//		$('.popularity').removeClass('active');
//		$('.height_price').removeClass('active');
//		var catid = $("input[name=categoryid]").val();
//		var low = 'low';
//		var pagenum = getUrlParameter('page');
//		if(!brandname == ""){
//			var brandid = $("input[name=brandid]").val();
//			if(brandid !== ''){
//				var brandid = parseInt(brandid);
//			}else{
//				var brandid = '';
//			}
//		}
//		if(!priceval == ""){
//			var mixpriceval = prpathArray[1].split( '-' );
//			var menumin = mixpriceval[0];
//			var menumax = mixpriceval[1];
//			
//			var minpriceval = $("input[name=priceval]").attr("data-min-value");
//			if(minpriceval !== ''){
//				var minpriceval = parseInt(minpriceval);
//			}else{
//				var minpriceval = '';
//			}
//			var maxpriceval = $("input[name=priceval]").attr("data-max-value");
//			if(maxpriceval !== ''){
//				var maxpriceval = parseInt(maxpriceval);
//			}else{
//				var maxpriceval = '';
//			}
//		}
//		$.ajax({
//                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
//				dataType: "JSON",
//                type:'POST',
//				data:{catid:catid,sorting:low,menuminprice:minpriceval,menumaxprice:maxpriceval,brandid:brandid,page:pagenum},
//                success:function(result){
//					//alert(result);
//					$('#loder_img').hide();
//                    $('#target-content').html(result.product_list);
//					//$('.filter-value_div').append(result.filterdiv_3);
//                	
//				}
//            });
//		});
	
	//$('.height_price').click(function(){
//		$('#loder_img').show();
//		
//		$(this).addClass('active');
//		$('.popularity').removeClass('active');
//		$('.lowest_price').removeClass('active');
//		var catid = $("input[name=categoryid]").val();
//		var heigh = 'heigh';
//		var pagenum = getUrlParameter('page');
//		if(!brandname == ""){
//			var brandid = $("input[name=brandid]").val();
//			if(brandid !== ''){
//				var brandid = parseInt(brandid);
//			}else{
//				var brandid = '';
//			}
//		}
//		if(!priceval == ""){
//			var mixpriceval = prpathArray[1].split( '-' );
//			var menumin = mixpriceval[0];
//			var menumax = mixpriceval[1];
//			
//			var minpriceval = $("input[name=priceval]").attr("data-min-value");
//			if(minpriceval !== ''){
//				var minpriceval = parseInt(minpriceval);
//			}else{
//				var minpriceval = '';
//			}
//			var maxpriceval = $("input[name=priceval]").attr("data-max-value");
//			if(maxpriceval !== ''){
//				var maxpriceval = parseInt(maxpriceval);
//			}else{
//				var maxpriceval = '';
//			}
//		}
//		$.ajax({
//                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
//				dataType: "JSON",
//                type:'POST',
//				data:{catid:catid,sorting:heigh,menuminprice:minpriceval,menumaxprice:maxpriceval,brandid:brandid,page:pagenum},
//           		//data:{brand:brand,minprice:minprice,maxprice:maxprice},
//                success:function(result){
//					//alert(result);
//					$('#loder_img').hide();
//                    $('#target-content').html(result.product_list);
//					//$('.filter-value_div').append(result.filterdiv_3);
//                	
//				}
//            });
//		
//	});
	
	//$(".popularity").on('click',function(){
//		
//		$(this).addClass('active');
//		$('.lowest_price').removeClass('active');
//		$('.height_price').removeClass('active');
//		$("#pagination li").removeClass('active');
//		
//		$("#pagination li").removeClass('current');
//		$.ajax({
//                url:"http://glorywebsdev.com/ecommerce/ajax-filter.php",
//				dataType: "JSON",
//                type:'POST',
//				data:{catid:catid},
//                success:function(result){
//					$('#loder_img').hide();
//                    $('#target-content').html(result.product_list);
//                	
//				}
//            });
//
//	});

	


/*
	Load more content with jQuery - May 21, 2013
	(c) 2013 @ElmahdiMahmoud
*/   

$(function () {
    $(".sub_category_Div").slice(0, 2).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".sub_category_Div:hidden").slice(0, 2).slideDown();
    });
	
	
});




});

jQuery( document ).ready(function($) {
});

