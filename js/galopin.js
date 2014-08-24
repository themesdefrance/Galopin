(function($){
$(function(){
	//menu toggle on mobile view
	$('.menu-toggle').click(function(){
		$('.content-wrapper').toggleClass('menu-open');
	});
	
	//top bar search form
	$('.search-wrapper .form-toggle').click(function(){
		$(this).toggle();
		$('.search-wrapper .search-form').toggle();
		$('.search-wrapper .search-field').focus();
		
		$('.search-wrapper .search-field').blur(function(){
			$('.search-wrapper .search-form').toggle();
			$('.search-wrapper .form-toggle').toggle();
		});
	});
});
})(jQuery);