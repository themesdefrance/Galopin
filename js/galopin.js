(function($){
$(function(){
	
	//initmasonry
	
	$(document).ready(function(){
		if ($('.masonry').length){
			$('.masonry').imagesLoaded(function(){
				//if ($('.masonry').length){
					var masonry = new Masonry($('.masonry')[0], {
						itemSelector: '.brick',
						columnWidth: '.masonry .brick',
						transitionDuration: '0.3s',
						gutter: 30
					});
				//}
			});
		}
	});
	
	//menu toggle on mobile view
	$('.menu-toggle').click(function(){
		$('.content-wrapper').toggleClass('menu-open');
	});
	
	//menu aim
	var useJsMenu = ($('.menu-wrapper .sub-menu').css('position') === 'absolute');
	$('.main-menu').menuAim({
		activate: function(row){
			if (useJsMenu) $(row).find('> .sub-menu').show();
		},
		deactivate: function(row){
			if (useJsMenu) $(row).find('> .sub-menu').hide();
		},
		exitMenu: function(){
			if (useJsMenu) return true;
		},
		submenuDirection: 'below',
		rowSelector: '> ul >li'
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
	
	 $(document).ready(function(){
	    $('.post-video, .widget-video').fitVids();
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
	
	//things dependant on window size
	var resizeTimeout;
	
	function windowSizeChanged(){
		var previousState = useJsMenu;
		useJsMenu = ($('.menu-wrapper .sub-menu').css('position') === 'absolute');
		
		if (previousState != useJsMenu){
			(useJsMenu) ? $('.menu-wrapper .sub-menu').hide() : $('.menu-wrapper .sub-menu').show();
		}
	}
	
	$(window).resize(function(){
		if (resizeTimeout) clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(windowSizeChanged, 100);
	});
});
})(jQuery);