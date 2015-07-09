jQuery(document).ready(function($) {
	$(window).scroll(function() {
		if ($(this).scrollTop() > 1){ 
		    $('header#masthead').addClass("scroll");
		    //$('#wpadminbar').addClass("sticky");
		}
		else{
			$('header#masthead').removeClass("scroll");
			//$('#wpadminbar').removeClass("sticky");
		}
	});
})