jQuery( document ).ready(function($) {
	var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=1';
    window.history.pushState({path:newurl},'',newurl);
	$('.clear-div').click(function(){
		var clearfilter = 'allclear'
		$.ajax({
                url:"http://glorywebsdev.com/ecommerce/ajax-search.php",
				dataType: "JSON",
                type:'POST',
				data:{clearfilter:clearfilter},
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
	
	function doSomething(){
			
			
			
			
			$('#loder_img').show();
			$('.filter-value_div').html('');
			//alert('hiii');
			
			//$('.popularity').addClass('active');
//			$('.lowest_price').removeClass('active');
//			$('.height_price').removeClass('active');
//            $('#target-content').html('<div id="loaderpro" style="" ></div>');
        	
             
             
			 var search_keyword1 = $("input[name=search_keyword]").val();
	var search_keyword = $.trim(search_keyword1);
			 
			
			
			 var catid = $("input[name=categoryid]").val();
             var brand  = multiple_values('brand');
			 var attr_var  = multiple_values('attr_var');
			 var stock = multiple_values('stock');
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
                url:"http://glorywebsdev.com/ecommerce/ajax-search.php",
				dataType: "JSON",
                type:'POST',
				data:{search_keyword:search_keyword,brand:brand,attr_var:attr_var,stock:stock,minprice:minprice,maxprice:maxprice,mindiscount:mindiscount,maxdiscount:maxdiscount,page:pageNum,sorting:sorting},
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
					
                    $('.count_pro strong').html(result.count_pro);
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
	$(window).load(doSomething);
	
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
	
	
	
	
	
	
	//var search_keyword1 = $("input[name=search_keyword]").val();
//	var search_keyword = $.trim(search_keyword1);
//	//alert(search_keyword);
//	$.ajax({
//                url:"http://glorywebsdev.com/ecommerce/ajax-search.php",
//				dataType: "JSON",
//                type:'POST',
//				data:{search_keyword:search_keyword},
//                success:function(result){
//					$('#loder_img').hide();
//					if(result.product_list != ''){
//						$('#target-content').html(result.product_list);
//					}else{
//						$('#target-content').html('No Product Found');
//					}
//					$('.count_pro strong').html(result.count_pro);
//					$(".paginationhtml").html(result.filterdiv_7);
//					
//				}
//	});
});