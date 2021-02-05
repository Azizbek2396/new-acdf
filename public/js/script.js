(function($) {
	$.fn.tabs = function( body , colback = false){
		var boddy = $(body);
		var navs = $(this).find('a');
		navs.click(function(e){
			e.preventDefault();
			var id = $(this).attr('href');
			$(this).parent().addClass('active').parent().find('li').not($(this).parent()).removeClass('active');
			boddy.each(function(){
				$(this).hide();
			});
			$(body+id).show();
      if (colback) {
        colback();
      }
		});
	}
})(jQuery);



$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

function showModal(modal) {
		modal.fadeIn();
		$('body').addClass('openModal');
	}
function hideModal(modal) {
	modal.fadeOut();
	$('body').removeClass('openModal');
}

$(document).ready(function(){

	$('a, button').click(function(e){
		if ($(this).hasAttr('data-modal')) {
			e.preventDefault();
			var modal = $(this).attr('data-modal');
			if ($(modal).length > 0) {
				showModal($(modal));
			}else{
				console.log('Объект не найден!')
			}
		}
	});

	$('.modalWindowMask, .modalWindowClose').click(function(){
		hideModal($(this).parents('.modalWindow'));
	});
	
	$('.gallerySlider').owlCarousel({
    items:1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
		smartSpeed: 800,
		dots: false,
		nav: true,
		animateOut: 'fadeOut',
    animateIn: 'fadeIn',
		navText: [ '<i class="sliderArrow sliderArrowLeft"></i>', '<i class="sliderArrow sliderArrowRight"></i>' ],
  });

	$('.btnSearch').click(function(e){
		e.preventDefault();
		if ($('#header').hasClass('openSearch')) {
			if($('.searchField').val().length > 0){
				$('.searchForm form').submit();
			}else{
				$('#header').removeClass('openSearch')
			}
		}else{
			$('#header').addClass('openSearch')
			$('.searchField').focus();
		}
	});

	$('.btnNav').click(function(e){
		e.preventDefault();
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$('body').addClass('openMenu');
			$('#maska').fadeIn();
		}else{
			$(this).removeClass('active');
			$('body').removeClass('openMenu');
			$('#maska').fadeOut();
		}
	});

	$('#maska').click(function(){
		$('.btnNav').removeClass('active');
		$('body').removeClass('openMenu');
		$(this).fadeOut();
	});

	$('.headerNav li .subMenu, .mobHeaderNavBarInner li .subMenu').prev('a').click(function(e){
		if (!$(this).parent().hasClass('subMenuItem')) {
			e.preventDefault();
			return false;
		}
	});	

});