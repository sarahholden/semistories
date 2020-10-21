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
    // if ($('[data-break="lines-inner"] p') != null) {
    //   var splitTextInner = new SplitText('[data-break="lines-inner"] p', {type:"lines", linesClass: 'split-line-++'});
    //   var splitTextInner = new SplitText('[data-break="lines-inner"] p', {type:"lines", linesClass: 'split-line-mask'});
    // }
    // if ($('[data-break="lines-inner"] span') != null) {
    //   var splitTextInner = new SplitText('[data-break="lines-inner"] span', {type:"lines", linesClass: 'split-line-++'});
    //   var splitTextInner = new SplitText('[data-break="lines-inner"] span', {type:"lines", linesClass: 'split-line-mask'});
    // }

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
  function setUpScrollMagic (self) {

    var scrollWrapper = self;
    var scrollOffset = $(self).data('offset') || 0;
    new ScrollMagic.Scene({
      triggerElement: self,
      triggerHook: .9
    })
      .setClassToggle(self, 'js-animate') // add class toggle
      .reverse(false)
      // .addIndicators()
      .addTo(controller);


      // SCALE IMAGE UP OR DOWN
      var $imageToScale = $(self).find('[data-anim="scale"]')
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
        var $itemToTranslate = $(self).find('[data-anim="parallax"]');
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
  }




  document.fonts.ready.then(function () {
    $('[data-anim="scroll"]').each(function() {
      setUpScrollMagic(this);
    });
  });
  // END OF FONT LOADING

  /* ---------------------------------------------
  Newsletter Popup
  ------------------------------------------------ */
  /* ---------------------------------------------
  COOKIES
  ------------------------------------------------ */
   // GET COOKIE -------------
   function getCookie(name) {
     const dc = document.cookie;
     const prefix = `${name}=`;
     let begin = dc.indexOf(`; ${prefix}`);
     if (begin == -1) {
       begin = dc.indexOf(prefix);
       if (begin != 0) return null;
     } else {
       begin += 2;
       var end = document.cookie.indexOf(';', begin);
       if (end == -1) {
         end = dc.length;
       }
     }

     return decodeURI(dc.substring(begin + prefix.length, end));
   }

 // SET COOKIE -------------
 function setCookie (cookieName) {
   const date = new Date();
   const days = 30;

  // Get unix milliseconds at current time plus number of days
   date.setTime(+date + days * 86400000); // 24 * 60 * 60 * 1000
   window.document.cookie = `${cookieName +
     '=' +
     'no' +
     '; expires='}${date.toGMTString()}; path=/`;
 }


  /* ---------------------------------------------
  EMAIL POPUP
  ------------------------------------------------ */

  const queryString = window.location.search;

  if (queryString.includes('preview')) {
    // Get cookies on load;
    const hasVisited = getCookie('email-popup-dismissed');

    // if (true) {
    if (hasVisited === null) {
      setTimeout(function () {
        $('body').addClass('show-email-popup');
        $('.js-email-popup').addClass('js-animate');
      }, 7000);
    }
  }

  // CLOSE POPUP AND SET COOKIE
  $('.js-close-email-popup').on('click', function () {
    $('body').removeClass('show-email-popup');
    setCookie('email-popup-dismissed');
  });


  // VALIDATE EMAIL
  function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  // SUBMIT EMAIL
  $('#bronto-form, #bronto-popup-form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    var $formWrapper = $form.closest('.js-bronto-parent');
    var email = $form.find('.js-email').val();
    if (validateEmail(email)) {
      $('body').append('<img src="https://app.bronto.com/public/?q=direct_add&fn=Public_DirectAddForm&id=bhalawrxtqrpufsoyqpdbbtnrwexbch&email='+ email + '&list2=c7eeb3ec-36ce-4d6f-b3a0-1d740e380c83&list3=0bc103ec0000000000000000000000159110" width="0" height="0" border="0" alt=""/>');

      $formWrapper.find('.js-form-outer-wrapper').hide();
      $formWrapper.find('.js-thank-you').fadeIn();

      setTimeout(function () {
        $('body').removeClass('show-email-popup');
        setCookie('email-popup-dismissed');
      }, 3000);
    } else {
      $formWrapper.find('.error').html('Please enter a valid email address');
    }

  });


  /* ---------------------------------------------
  AJAX PAGINATION
  ------------------------------------------------ */
  function loadPosts (self, query) {

    var pageNumber = $(self).data('page-number') ? parseInt($(self).data('page-number')) : 0;
    var ppp = $(self).data('ppp') ? parseInt($(self).data('ppp')) : 10;
    var postType = $(self).data('post-type') ? $(self).data('post-type') : 'post';
    var loadType = $(self).data('load-type') ? $(self).data('load-type') : 'more';
    var categoryFilter = $(self).data('category') ? $(self).data('category') : '';
    var newHeading = query ? query : $(self).data('category-text');
    pageNumber++;

    var queryData = {
      pageNumber: pageNumber,
      ppp: ppp,
      postType: postType,
      categoryFilter: categoryFilter,
      query: query,
      action: 'more_post_ajax'
    }


    $.ajax({
      type: 'POST',
      dataType: 'html',
      url: ajaxpagination.ajaxurl,
      data: queryData,
      success: function(data){
        var $data = $(data);

        if ($data.length) {

          // EMPTY DATA IF FILTER OR SEARCH
          $(self).data('page-number', pageNumber);

          // If this is the last page, remove the +More Stories section
          if ($(self).data('total-post-count') <= (pageNumber * ppp)) {
            $('.js-more-section').remove();
          }

          // UPDATE DATA
          $('#ajax-posts').append($data);
          $(self).attr('disabled', false);

          $(self).find('.btn-text').text(originalButtonText);
          $(self).find('.icon').fadeIn();

        } else {
          $(self).attr('disabled', true);
        }

        // SET UP SCROLL ANIMATIONS FOR NEW ITEMS
        $('[data-anim="scroll"]:not(.js-animate)').each(function() {
          setUpScrollMagic(this);
        });

      },
      error : function(jqXHR, textStatus, errorThrown) {
        $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
      }

    });
    return false;
  }

  var originalButtonText = '';

  $('.js-load-more').on('click',function(){ // When btn is pressed.
    var buttonTextEl = $(this).find('.btn-text');
    $(this).attr('disabled',true);
    originalButtonText = $(buttonTextEl).text();
    $(buttonTextEl).text('Loading more posts...');
    $(this).find('.icon').hide();
    loadPosts(this);
  });


});
