$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$(document).ready(function(){

	if ($('.fancybox').length > 0) {
      $('.fancybox').fancybox({
      	loop: true,
    //   	thumbs : {
				// 	autoStart   : true,                  // Display thumbnails on opening
				// 	hideOnClose : true,                   // Hide thumbnail grid when closing animation starts
				// 	parentEl    : '.fancybox-container',  // Container is injected into this element
				// 	axis        : 'y'                     // Vertical (y) or horizontal (x) scrolling
				// },
				buttons : [
	        // 'slideShow',
	        // 'fullScreen',
	        // 'thumbs',
	        // 'share',
	        //'download',
	        //'zoom',
	        'close'
		    ],
			});
  };
  
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
  }, 4000);

  $('.postContent img').each(function(){
  	if ($(this).css('float') == 'left') {
  		$(this).addClass('alignLeft');
  	}
  	if ($(this).css('float') == 'right') {
  		$(this).addClass('alignRight');
  	}
  });

  $(function(){
    $(window).scroll(function() {
      var navHeight = $('.headerNav').height();
      var headerHeight = $('#header').height() - navHeight;
      var top = $(this).scrollTop();
      if (top >= headerHeight) {
        // $('body').addClass('fixedHeader');
        $('.headerNavDubler').css({paddingBottom: navHeight+'px'});
        $('.headerNav').css({
          position: 'absolute',
          top: top+'px',
          opacity: '0.9'
        });
      }else{
        // $('body').removeClass('fixedHeader');
        $('.headerNavDubler').css({paddingBottom: '0px'});
        $('.headerNav').css({
          position: 'relative',
          top: '0px',
          opacity: '1'
        });
      }

    })
  });

  $('.showSpView').click(function(e){
    e.preventDefault();
    if ($(this).hasClass('active')) {
      $('.spView').hide();
      $(this).removeClass('active');
    }else{
      $('.spView').show();
      $(this).addClass('active');
    }
    return false;
  });
  
  $('.spView').click(function(){
    return false;
  });

  $(document).click(function(){
    $('.spView').hide();
    $('.showSpView').removeClass('active');
  });

});