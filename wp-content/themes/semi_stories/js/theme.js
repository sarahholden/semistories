$(document).ready(function() {


  if ($('.swiper-container-progress-bar').length > 0) {
      const progressBarSwiper = new Swiper('.swiper-container-progress-bar', {
        speed: 600,
        allowTouchMove: true,
        loop: true,
        spaceBetween: 0,
        autoplay: {
          delay: 9000,
          disableOnInteraction: true
        },
        init: false,
      });

      // Had to get three step init to not get error
      progressBarSwiper.on('init', function() {
        animateProgressBar();
      });

      progressBarSwiper.on('slideChangeTransitionStart', function () {
        animateProgressBar();
      });

      // init Swiper
      progressBarSwiper.init();

      function animateProgressBar () {
        var startingSlide = progressBarSwiper.realIndex;
        var currentSlide = progressBarSwiper.realIndex + 1;
        var totalSlides = progressBarSwiper.slides.length - 2;
        var progressStartPercentage = (startingSlide / totalSlides) * 100;
        var progressEndPercentage = (currentSlide / totalSlides) * 100;

        $('.progress-bar .progress')
        .clearQueue()
        .stop()
        .css('width', '0%');

        $('.progress-bar:nth-of-type(' + currentSlide + ') .progress')
        .clearQueue()
        .stop()
        .css('width', '0%')
        .animate({ width: '100%'}, 9300, 'linear' );
        // .css('width', progressStartPercentage + '0%')
        // .animate({ width: progressEndPercentage + '%'}, 4600, 'linear' );
      }
    }


//   /* ---------------------------------------------
//   HAMBURGER MENU
//   ------------------------------------------------ */
  var startingScrollPosition = 0;
  $('.hamburger').on('click', function(e) {
    e.preventDefault();

    if ($('body').hasClass('open-mobile-nav')) {
      $('body').removeClass('open-mobile-nav stop-scroll');
      $(window).scrollTop(startingScrollPosition);
      $('body').addClass('closing-mobile-nav');
      setTimeout(function () {
        $('body').removeClass('closing-mobile-nav');
      }, 1200);
    } else {
      $('body').addClass('open-mobile-nav');
      setTimeout(function () {
        startingScrollPosition = $(window).scrollTop();
        $('body').addClass('stop-scroll');
      }, 1200);
    }
  });

  setTimeout(function () {
    $('.loading-nav').removeClass('loading-nav');
  }, 1200);

  // ADD ICON TO LAST MENU ITEM
  $('.js-nav-icon').appendTo('#menu-top-nav > .menu-item:last-child a');
  $('.js-nav-icon').removeClass('pre-load')

  /* ---------------------------------------------
    SPLIT TEXT / LIST ANIMATIONS
  ------------------------------------------------ */
  var controller = new ScrollMagic.Controller();
  var tl = gsap.timeline();
  document.fonts.ready.then(function () {
    var mySplitText = new SplitText('[data-break="lines"]', {type:"lines", linesClass: 'split-line-++'});
    var splitTextInner = new SplitText('[data-break="lines-inner"] p', {type:"lines", linesClass: 'split-line-++'});
    var splitTextInner = new SplitText('[data-break="lines-inner"] p', {type:"lines", linesClass: 'split-line-mask'});
    var splitTextInner = new SplitText('[data-break="lines-inner"] span', {type:"lines", linesClass: 'split-line-++'});
    var splitTextInner = new SplitText('[data-break="lines-inner"] span', {type:"lines", linesClass: 'split-line-mask'});

    $('.js-loading').removeClass('js-loading')

    // resize function
    $(window).resize(function() {
      tl.progress(1);
      mySplitText.revert();
    });

    $('.list-animation-wrapper').each(function() {
      var scrollOffset = $(this).data('offset') || 0;
      var $thisWrapper = $(this);
      new ScrollMagic.Scene({triggerElement: this, offset: scrollOffset})
        .setClassToggle(this, "scrolled") // add class toggle
        .reverse(false)

        .addTo(controller)
        .on("enter", function (e) {
          if ($thisWrapper.find('.animate-item').length > 0) {
            $listItems = $thisWrapper.find('.animate-item');
          } else {
            $listItems = $thisWrapper.find('li');
          }
          $listItems.each(function(i) {
            var delay = i * 100;
            var self = this;
            setTimeout(function() {
              $(self).addClass('fade-in');
            }, delay);
          });
        });
    });

  // END OF FONT LOADING
  });



  /* ---------------------------------------------
    PARALLAX & SCROLLING ZOOM EFFECTS
  ------------------------------------------------ */
  document.fonts.ready.then(function () {

    $('[data-anim="scroll"]').each(function() {
      var scrollWrapper = this;
      var scrollOffset = $(this).data('offset') || 0;
      new ScrollMagic.Scene({
        triggerElement: this,
        triggerHook: .9
      })
        .setClassToggle(this, 'js-animate') // add class toggle
        .reverse(false)
        // .addIndicators()
        .addTo(controller);


        // SCALE IMAGE UP OR DOWN
        var $imageToScale = $(this).find('[data-anim="scale"]')
        if ($imageToScale.length > 0) {
          var scaleFrom = $imageToScale.data('scale-from') != undefined ? parseFloat($imageToScale.data('scale-from')) : 1.04;
          var scaleTo = $imageToScale.data('scale-to') != undefined ? parseFloat($imageToScale.data('scale-to')) : 1;
          var pointToTrigger = $imageToScale.data('trigger-hook') != undefined ? parseFloat($imageToScale.data('trigger-hook')) : 0.7;
          var dataDuration = $(this).data('duration') != undefined ? $(this).data('duration') : '100%';

          var timelineScale = new TimelineMax();
          var imageToAnimate = $imageToScale;
          timelineScale.fromTo(imageToAnimate, 1, {scale: scaleFrom}, {scale: scaleTo});

          var scaleScene = new ScrollMagic.Scene({
            triggerElement: scrollWrapper,
            triggerHook: pointToTrigger,
            duration: dataDuration
          })
          .setTween(timelineScale)
          .addTo(controller);
        }

        if ($(window).innerWidth() > 768) {
          // PARALLAX EFFECT
          var $itemToTranslate = $(this).find('[data-anim="parallax"]');
          if ($itemToTranslate.length > 0) {
            $itemToTranslate.each(function() {
              var timelineParallax = new TimelineMax();
              var translateFrom = $(this).data('translate-from') != undefined ? parseFloat($(this).data('translate-from')) : 40;
              var translateTo = $(this).data('translate-to') != undefined ? parseFloat($(this).data('translate-to')) : -40;
              var dataDuration = $(this).data('duration') != undefined ? $(this).data('duration') : '100%';
              timelineParallax.fromTo($(this), 1, {y: translateFrom}, {y: translateTo});

              var scene = new ScrollMagic.Scene({
                triggerElement: scrollWrapper,
                triggerHook: 0.4,
                duration: dataDuration
              })
              .setTween(timelineParallax)
              .addTo(controller);
            });
          }
        }

    });

  // END OF FONT LOADING
  });

//   /* ---------------------------------------------
//   Marquee (up up up text)
//   ------------------------------------------------ */
//   $('.marquee').marquee({
//     //If you wish to always animate using jQuery
//     allowCss3Support: true,
//     //works when allowCss3Support is set to true - for full list see http://www.w3.org/TR/2013/WD-css3-transitions-20131119/#transition-timing-function
//     css3easing: 'linear',
//     //'left', 'right', 'up' or 'down'
//     direction: 'right',
//     //true or false - should the marquee be duplicated to show an effect of continues flow
//     duplicated: true,
//     //speed in milliseconds of the marquee in milliseconds
//     duration: 4000,
//     //gap in pixels between the tickers
//     gap: 8,
//     //the marquee is visible initially positioned next to the border towards it will be moving
//     startVisible: true
//   });
//
//   /* ---------------------------------------------
//   SMOOTH SCROLL
//   ------------------------------------------------ */
//   $('.js-scroll-to').on('click', function(e) {
//     smoothScroll(e, this);
//   });
//
//   $('.home-menu a').on('click', function (e) {
//     smoothScroll(e, this);
//   })
//
//
//   function smoothScroll (evt, self) {
//     evt.preventDefault();
//     var thisTarget = $(self).attr('href');
//
//     if (thisTarget == '#bottom') {
//       var targetOffset = $('#top').offset().top + $('#top').outerHeight() - $(window).height();
//     } else {
//       var targetOffset = $(thisTarget).offset().top;
//     }
//
//     $('html, body').animate({
//       scrollTop: $(thisTarget).offset().top
//     }, 400);
//   }
//
//
});
