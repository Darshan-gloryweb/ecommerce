$(document).ready(function () {
$('#submitbutton').click(function() { 

	$("#newslatterform").validate({ 
	 errorElement: "label", // default is 'label'

    errorPlacement: function(error, button) {

        error.insertAfter("#submitbutton");

    },

		rules: {           
			newslater_email: {
				required: true,
			},
		},
		submitHandler: function() {
			
			//Your code for AJAX starts       
			values = $("#newslatterform").serialize();
			jQuery.ajax({
				url:'http://glorywebsdev.com/ecommerce/newsletteremail.php',
				type: "post",
				data: values,
				success: function(res){
					//alert('hii');
					$('.msg-display').html(res.msg);
				},
			
			//Your code for AJAX Ends
			});       
		}
	});
	
});


    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            } else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        //var msg = "";
        $("#rating_star").val(ratingValue);
        // msg = "Thanks! You rated this " + ratingValue + " stars.";

        responseMessage(msg);

    });


});

function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
if (typeof window !== "undefined") {
    window.prerenderReady = false;
}
if (typeof window !== "undefined") {
    var gtmKey = "GTM-5FG68Q5"; //Qa Key
    if (window.location.hostname == "www.moglix.com" || window.location.hostname == "moglix.com")
        gtmKey = "GTM-PMPXQQ";
    (function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);

    })(window, document, 'script', 'dataLayer', gtmKey);
}
/* End Google Tag Manager */
/*Start Q Graph*/
! function (q, g, r, a, p, h, js) {
    if (q.qg) return;
    js = q.qg = function () {
        js.callmethod ? js.callmethod.call(js, arguments) : js.queue.push(arguments);
    };
    js.queue = [];
    p = g.createElement(r);
    p.async = !0;
    p.src = a;
    h = g.getElementsByTagName(r)[0];
    h.parentNode.insertBefore(p, h);
}(window, document, 'script', '//cdn.qgr.ph/qgraph.cb66621a955aeac723d9.js');
/*End Q Graph*/
if (typeof window !== "undefined") {
    window.criteo_q = window.criteo_q || [];
    window.criteo_q.push({
        event: "setAccount",
        account: 45514
    }, {
        event: "setEmail",
        email: ""
    }, {
        event: "setSiteType",
        type: window.innerWidth >= 768 ? "d" : "m"
    });
}
if (typeof window !== "undefined") {
    var myExtObject = (function () {
        return {
            cs: function (s, ce) { //s: src, ce: createElement, at: appendTo
                var ce = document.createElement(ce);
                ce.setAttribute('type', 'text/javascript');
                ce.setAttribute('src', s);
                document.body.appendChild(ce);
            },
            cns: function (e) {
                var ce = document.createElement('noscript');
                var i = document.createElement(e.ce);
                i.setAttribute('src', e.src);
                ce.appendChild(i);
                document.body.appendChild(ce);
            }
        }
    })(myExtObject || {})
}
jQuery(document).ready(function ($) {
    /*** Top to bottom ***/
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 500) {
            jQuery('.back-to-top').fadeIn(500);
        } else {
            jQuery('.back-to-top').fadeOut(500);
        }
    });
    jQuery('.back-to-top').click(function (event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, 500);
        return false;
    })
    $('.home_banner_caption a').on('mouseover', function () {
        $(this).trigger('click');
    });
    /*** Feature Product slider ***/
    var slider = $(".owl-stage").lightSlider({
        loop: true,
        item: 8,
        slideMargin: 0,
        controls: true,
        pager: false,
		prevHtml:'<div class="category-btns"> <a class="prev-btn" id="prev_btn11"><i class="fa fa-chevron-left"></i></a>',
		nextHtml:'<a class="next-btn" id="next_btn11"><i class="fa fa-chevron-right"></i></a></div>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    item: 7,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
			 {
                breakpoint: 1025,
                settings: {
                    item: 7,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 993,
                settings: {
                    item: 5,
                    slideMove: 1,
                    slideMargin: 6,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    item: 4,
                    slideMove: 1
                }
            },
			{
                breakpoint: 481,
                settings: {
                    item: 2,
                    slideMove: 1
                }
            },
            {
                breakpoint: 460,
                settings: {
                    item: 2,
                    slideMove: 1,
                    slideMargin: 6,
                }
            }
        ],
        onBeforeNextSlide: function (el) {},
        onBeforePrevSlide: function (el) {},

    }); 
var slider = $(".owl-stage1").lightSlider({

        loop: true,

        item: 2,

        slideMargin: 0,

        controls: true,

        pager: false,

        responsive: [

            {

                breakpoint: 1202,

                settings: {

                    item: 2,

                    slideMove: 1,

                    slideMargin: 6,

                }

            },

			 {

                breakpoint: 1025,

                settings: {

                    item: 2,

                    slideMove: 1,

                    slideMargin: 6,

                }

            },

            {

                breakpoint: 993,

                settings: {

                    item: 2,

                    slideMove: 1,

                    slideMargin: 6,

                }

            },

            {

                breakpoint: 769,

                settings: {

                    item: 2,

                    slideMove: 1

                }

            },

			{

                breakpoint: 481,

                settings: {

                    item: 1,

                    slideMove: 1

                }

            },

            {

                breakpoint: 460,

                settings: {

                    item: 1,

                    slideMove: 1,

                    slideMargin: 6,

                }

            }

        ],

        onBeforeNextSlide: function (el) {},

        onBeforePrevSlide: function (el) {},



    }); 
//var slider1 = $(".owl-stage").lightSlider();
	 /* $('.category-btns #prev_btn11').click(function () {
				//alert('yy');
       $(".owl-stage").lightSlider().goToPrevSlide();
    });
    $('#next_btn11').click(function () {
        $(".owl-stage").lightSlider().goToNextSlide();
    });*/

/*$( "p:last" ).text( "left: " + position.left + ", top: " + position.top );*/
$('#prev_btn11').on('click', function () {
	    slider.goToPrevSlide();
	});
	$('#next_btn11').on('click', function () {
	    slider.goToNextSlide();
	});

/* 20180711 */
$(document).ready(function () {
    /* $('.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1').mouseup(
     function(){
    	 $('.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1:firstChild').addClass('active');
    }); */

    $('.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1').hover(
        function () {
            $('.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1').removeClass('active');
            $(this).addClass('active');

        }
        /*   function(){ 
	    $(this).removeClass('active');
	   if($( '.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1').hasClass( 'active' )){
		
		}else{
			 $('.navbar-nav ul.mega-dropdown-menu[_ngcontent-c3] > li[_ngcontent-c3] .child-cl-1:firstChild').addClass('active');
		}
	   
		} */
    )
});


});