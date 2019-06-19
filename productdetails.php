<?php 
?>
<script src="<?=$frontpath?>/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script>
function get_products(ipp,sortpara,stype)
{
	var itemperpage = ipp;
	var sorts = sortpara; 
	var stype = stype;
	$.ajax({
    url: '<?=$frontpath?>/get_product.php',
    data: {'itemperpage' : itemperpage, 'sorttype' : sorts ,'stype' : stype},
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function changepage(val)
{
	var page = val;
	$.ajax({
    url: '<?=$frontpath?>/get_product.php',
    data: {'page' : page },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function changeitemperpage(val)
{
	var perpage = val;
	$.ajax({
    url: '<?=$frontpath?>/get_product.php',
    data: {'perpage' : perpage },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
function priceSlider()
{
	var mmin = document.getElementById('min').value;
	var mmax = document.getElementById('max').value;
	$.ajax({
    url: '<?=$frontpath?>/get_product.php',
    data: {'min' : mmin, 'max' : mmax },
    type: "POST",
    success: function(json) {
	location.reload(true);
    }
   });
}
</script>