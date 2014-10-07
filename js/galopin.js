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
	});
	
	$('.search-wrapper .search-field').blur(function(event){
		$('.search-wrapper .search-field').val('');
		$('.search-wrapper .search-form').toggle();
		$('.search-wrapper .form-toggle').toggle();
	});
	
	//fix the menu in hero mode
	if ($('.content-wrapper.cover').length){
		var $menu =$('.menu-wrapper'),
			top = $menu.position().top;
				
		$(document).on('scroll', function(event){
			var scroll = $(window).scrollTop();
				
			if (top-scroll <= 0) $menu.addClass('stuck');
			else if ($menu.hasClass('stuck')) $menu.removeClass('stuck');
		});
	}
	
	//initmasonry
	$('.masonry').imagesLoaded(function(){
	
		if ($('.masonry').length){
			var masonry = new Masonry($('.masonry')[0], {
				itemSelector: '.brick',
				columnWidth: '.masonry .brick',
				gutter: 30
			});
		}
	});
	
	//back to top button
	var $toTop = $('#back-to-top');
	if ($(window).scrollTop() <= $(window).height()) $toTop.hide();
	
	$toTop.on('click', function(){
		$('html,body').animate({
			scrollTop: 0
		}, 400);
	});
	
	$(document).on('scroll', function(event){
		if ($(window).scrollTop() > $(window).height()) $toTop.fadeIn();
		else $toTop.fadeOut();
	});
});
})(jQuery);