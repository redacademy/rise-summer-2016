(function($) {
//Script to open nav menu on mobile
	$('.hamburger, .close-nav').click( function(e){
		$('.main-navigation').toggleClass('open');
	});
//Script to show/hide people groups
	$('.about-nav-link').click(function(){
		var contentToOpen = $(this).data('about-nav');

		console.log(contentToOpen);
		$('div').removeClass('show');
		$(this).addClass('show').data('about-nav');

		$('ul').hide();

		$('.'+ contentToOpen).show();
	})

//Script to show/hide resources
	$('.resource-button').click(function(){
		var rangeToOpen = $(this).data('alpha');
		
		$('button').removeClass('active');
		$(this).addClass('active').data('alpha');

		$('ul').hide();

		$('.'+ rangeToOpen).show();

	});



})(jQuery);
