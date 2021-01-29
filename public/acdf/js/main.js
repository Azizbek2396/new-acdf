$(document).ready(function() {

	var onClickBurgerButton = function(e) {
        $('#mobile-burger').hide();
        $('#mobile-close').show();
        $('.m-bottom-header').addClass('open');
        $('body').addClass('m-open');
        $('#mmenu-block').show();
    };

	var onClickMenuCloseButton = function (e) {
        $('#mobile-close').hide();
        $('#mobile-burger').show();
        $('#mmenu-block').hide();
        $('.m-bottom-header').removeClass('open');
        $('body').removeClass('m-open');
    };

    var navText = [
        '<svg class="bi bi-chevron-compact-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd"/></svg>',
        '<svg class="bi bi-chevron-compact-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 01.671.223l3 6a.5.5 0 010 .448l-3 6a.5.5 0 11-.894-.448L9.44 8 6.553 2.224a.5.5 0 01.223-.671z" clip-rule="evenodd"/></svg>'
    ];

    $(".slider-main").owlCarousel({
        items               : 1,
        loop                : true,
        autoplay            : true,
        autoplayTimeout     : 5000,
        smartSpeed          : 250,
        dots                : false,
        nav                 : true,
        animateOut          : 'fadeOut',
        animateIn           : 'fadeIn',
        navText             : navText
    });

    var gallerySelector = ".gallery-carousel .owl-item:not(.cloned) a";

    var fancyBoxInit = function(e) {
         $().fancybox({
            selector        : gallerySelector,
            backFocus       : false,
            hash            : false,
            thumbs: {
                autoStart   : true
            },
            buttons : [
                'zoom',
                'close'
            ]
        });
    };

    var galleryOptions = {
        loop        : true,
        autoplay    : false,
        margin      : 10,
        smartSpeed  : 250,
        nav         : true,
        animateOut  : 'fadeOut',
        animateIn   : 'fadeIn',
        navText     : navText,
        dots        : false,
        center      : true,
        autoHeight  : true,
        responsive :{
            0:{
                autoWidth   : false,
                items       : 1
            },
            768:{
                autoWidth   : true,
                items       : 3
            }
        },
        onInitialized       : fancyBoxInit
    };

    var gallery = $('.gallery-carousel');
    gallery.owlCarousel(galleryOptions);

    var onClickGalleryFancyItem = function(e) {
        e.preventDefault();
        $(gallerySelector)
            .eq(( $(e.currentTarget).attr("data-index") || 0))
            .click();
        return false;
    };

    var onClickEmptyLinkItem = function (e) {
        e.preventDefault();
        return false;
    };

    var onShownBsCollapse = function (e) {
        e.preventDefault();
        $(e.target).parent().addClass('active');
        return false;
    };

    var onHiddenBsCollapse = function (e) {
        e.preventDefault();
        $(e.target).parent().removeClass('active');
        return false;
    };

    $(document)
        .on('click', '.gallery-carousel .owl-item.cloned a', onClickGalleryFancyItem)
        .on('click', 'a[href="#"]', onClickEmptyLinkItem)
        .on('click', '#mobile-burger', onClickBurgerButton)
        .on('click', '#mobile-close, #mmenu-block', onClickMenuCloseButton)
        .on('shown.bs.collapse', '.accordion', onShownBsCollapse)
        .on('hidden.bs.collapse', '.accordion', onHiddenBsCollapse)
    ;

    // $(window).on('resize', function () {
    //     gallery.trigger('destroy.owl.carousel');
    //     gallery.owlCarousel(galleryOptions);
    // });
});