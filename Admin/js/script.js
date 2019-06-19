$(function () {
    var items = $('#v-nav>ul>li').each(function () {
        $(this).click(function () {
            //remove previous class and add it to clicked tab
            items.removeClass('current');
            $(this).addClass('current');

            //hide all content divs and show current one
            //$('#v-nav>div.tab-content').hide().eq(items.index($(this))).show();

            //$('#v-nav>div.tab-content').hide().eq(items.index($(this))).fadeIn(100);    

            $('#v-nav>div.tab-content').hide().eq(items.index($(this))).show();
            window.location.hash = $(this).attr('tab');
        });
    });

    if (location.hash) {
        showTab(location.hash);
		var myDiv = document.getElementById('tab-content');
		myDiv.innerHTML = vomit;
		myDiv.scrollTop = 0;
    }
    else {
        showTab("tab1s");
		var myDiv = document.getElementById('tab-content');
		myDiv.innerHTML = vomit;
		myDiv.scrollTop = 0;
    }

    function showTab(tab) {
        $("#v-nav ul li:[tab*=" + tab + "]").click();
    }

    // Bind the event hashchange, using jquery-hashchange-plugin
    $(window).hashchange(function () {
        showTab(location.hash.replace("#", ""));
    })

    // Trigger the event hashchange on page load, using jquery-hashchange-plugin
    $(window).hashchange();
});