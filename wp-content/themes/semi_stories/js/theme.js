// $(document).ready(function() {
//
//   /* ---------------------------------------------
//   CURSOR
//   ------------------------------------------------ */
//   // set the starting position of the cursor outside of the screen
//   let clientX = -300;
//   let clientY = -300;
//   const cursorEl = document.querySelector('#cursor');
//
//   const initCursor = () => {
//
//     // add listener to track the current mouse position
//     document.addEventListener('mousemove', e => {
//       clientX = e.clientX - 25;
//       clientY = e.clientY - 25;
//     });
//
//     $('.js-cursor, a, button').on('mouseenter', e => {
//       if ($(window).innerWidth() > 768) {
//         var $targetEl = $(e.target).closest('.js-cursor') ? $(e.target).closest('.js-cursor') : $(e.target);
//         var cursorType = $targetEl.data('cursor-type') ? 'is-' + $targetEl.data('cursor-type') : 'is-click';
//         var cursorColor = $targetEl.data('cursor-theme') ? 'is-' + $targetEl.data('cursor-theme') : '';
//         var cursorText = '';
//
//         if ($targetEl.data('cursor-text')) {
//           cursorText = $targetEl.data('cursor-text');
//         } else if (cursorType == 'is-click') {
//           cursorText = 'click';
//         }
//
//         $('.cursor__label').text(cursorText);
//
//         $(cursorEl).removeClass().addClass(cursorType + " " + cursorColor);
//       }
//     });
//
//     $('.js-cursor, a, button').on('mouseleave', e => {
//       if ($(window).innerWidth() > 768) {
//         var $targetEl = $(e.relatedTarget).closest('.js-cursor') ? $(e.relatedTarget).closest('.js-cursor') : $(e.relatedTarget);
//         var cursorType = $targetEl.data('cursor-type') ? 'is-' + $targetEl.data('cursor-type') : '';
//         var cursorText = $targetEl.data('cursor-text') ? $targetEl.data('cursor-text') : '';
//
//         $('.cursor__label').text(cursorText);
//
//         $(cursorEl).removeClass().addClass(cursorType);
//
//       }
//     });
//
//
//
//     // transform the cursorEl to the current mouse position
//     // use requestAnimationFrame() for smooth performance
//     const render = () => {
//       // cursorEl.style.transform = `translate(${clientX}px, ${clientY}px)`;
//       // if you are already using TweenMax in your project, you might as well
//       // use TweenMax.set() instead
//       if ($(window).innerWidth() > 768) {
//         TweenMax.set(cursorEl, {
//           x: clientX,
//           y: clientY
//         });
//       }
//
//       requestAnimationFrame(render);
//     };
//     requestAnimationFrame(render);
//   };
//
//   initCursor();
//
//
//
// // var cursor = $("#cursor");
// // function t(t) {
// //     function n() {
// //         cursor.find(".cursor__label").text("")
// //     }
// //     TweenMax.to(cursor, .2, {
// //         left: t.clientX - cursor.width() / 2,
// //         top: t.clientY - cursor.height() / 2
// //     }),
// //     "medium" == $(t.target).data("cursor-type") ? (cursor.removeClass().addClass("is-medium"),
// //     n()) : "big" == $(t.target).data("cursor-type") ? "btn-play" == $(t.target).data("cursor-text") ? (cursor.removeClass().addClass("is-play").addClass("is-big"),
// //     n()) : "btn-pause" == $(t.target).data("cursor-text") ? (cursor.removeClass().addClass("is-pause").addClass("is-big"),
// //     n()) : (cursor.removeClass().addClass("is-view").addClass("is-big"),
// //     cursor.find(".cursor__label").text($(t.target).data("cursor-text"))) : (cursor.removeClass(),
// //     n())
// // }
// // $("body, #app, .app-container, a").css("cursor", "none");
// // var n = function() {
// //     isMobile.any ? ($(window).off("mousemove", t),
// //     cursor.remove()) : $(window).on("mousemove", t)
// // };
// // n(),
// // $(window).resize(n)
//
//
//   /* ---------------------------------------------
//   HAMBURGER MENU
//   ------------------------------------------------ */
//   var startingScrollPosition = 0;
//   $('.hamburger').on('click', function(e) {
//     e.preventDefault();
//
//     if ($('body').hasClass('open-mobile-nav')) {
//       $('body').removeClass('open-mobile-nav stop-scroll');
//       $(window).scrollTop(startingScrollPosition);
//       $('body').addClass('closing-mobile-nav');
//       setTimeout(function () {
//         $('body').removeClass('closing-mobile-nav');
//       }, 1200);
//     } else {
//       $('body').addClass('open-mobile-nav');
//       setTimeout(function () {
//         startingScrollPosition = $(window).scrollTop();
//         $('body').addClass('stop-scroll');
//       }, 1200);
//     }
//   });
//
//   setTimeout(function () {
//     $('.loading-nav').removeClass('loading-nav');
//   }, 1200);
//
//
//
//   /* ---------------------------------------------
//     SPLIT TEXT / LIST ANIMATIONS
//   ------------------------------------------------ */
//   var controller = new ScrollMagic.Controller();
//   var tl = gsap.timeline();
//   document.fonts.ready.then(function () {
//     var mySplitText = new SplitText('[data-break="lines"]', {type:"lines", linesClass: 'split-line-++'});
//     // var splitTextInner = new SplitText('[data-break="lines-inner"] p', {type:"lines", linesClass: 'split-line-++'});
//
//     // resize function
//     $(window).resize(function() {
//       tl.progress(1);
//       mySplitText.revert();
//     });
//
//     $('.list-animation-wrapper').each(function() {
//       var scrollOffset = $(this).data('offset') || 0;
//       var $thisWrapper = $(this);
//       new ScrollMagic.Scene({triggerElement: this, offset: scrollOffset})
//         .setClassToggle(this, "scrolled") // add class toggle
//         .reverse(false)
//
//         .addTo(controller)
//         .on("enter", function (e) {
//           if ($thisWrapper.find('.animate-item').length > 0) {
//             $listItems = $thisWrapper.find('.animate-item');
//           } else {
//             $listItems = $thisWrapper.find('li');
//           }
//           $listItems.each(function(i) {
//             var delay = i * 100;
//             var self = this;
//             setTimeout(function() {
//               $(self).addClass('fade-in');
//             }, delay);
//           });
//         });
//     });
//
//   // END OF FONT LOADING
//   });
//
//
//
//
//
//   /* ---------------------------------------------
//     BREEZY
//   ------------------------------------------------ */
//   $('.js-breezy').on('click', function () {
//     $('.breezy-gurl').addClass('has-zoomies');
//   });
//
//
//   $('[class*="project-wrapper"] a').on('click', function (e) {
//     e.preventDefault();
//   });
//
//   /* ---------------------------------------------
//     PARALLAX & SCROLLING ZOOM EFFECTS
//   ------------------------------------------------ */
//   document.fonts.ready.then(function () {
//
//     $('[data-anim="scroll"]').each(function() {
//       var scrollWrapper = this;
//       var scrollOffset = $(this).data('offset') || 0;
//       new ScrollMagic.Scene({triggerElement: this, offset: scrollOffset})
//         .setClassToggle(this, "js-animate") // add class toggle
//         .reverse(false)
//         .addTo(controller);
//
//
//         // SCALE IMAGE UP OR DOWN
//         var $imageToScale = $(this).find('[data-anim="scale"]')
//         if ($imageToScale.length > 0) {
//           var scaleFrom = $imageToScale.data('scale-from') != undefined ? parseFloat($imageToScale.data('scale-from')) : 1.12;
//           var scaleTo = $imageToScale.data('scale-to') != undefined ? parseFloat($imageToScale.data('scale-to')) : 1;
//           var pointToTrigger = $imageToScale.data('trigger-hook') != undefined ? parseFloat($imageToScale.data('trigger-hook')) : 0.4;
//           var dataDuration = $(this).data('duration') != undefined ? $(this).data('duration') : '100%';
//
//           var timelineScale = new TimelineMax();
//           var imageToAnimate = $imageToScale;
//           timelineScale.fromTo(imageToAnimate, 1, {scale: scaleFrom}, {scale: scaleTo});
//
//           var scaleScene = new ScrollMagic.Scene({
//             triggerElement: scrollWrapper,
//             triggerHook: pointToTrigger,
//             duration: dataDuration
//           })
//           .setTween(timelineScale)
//           .addTo(controller);
//         }
//
//         if ($(window).innerWidth() > 768) {
//           // PARALLAX EFFECT
//           var $itemToTranslate = $(this).find('[data-anim="parallax"]');
//           if ($itemToTranslate.length > 0) {
//             $itemToTranslate.each(function() {
//               var timelineParallax = new TimelineMax();
//               var translateFrom = $(this).data('translate-from') != undefined ? parseFloat($(this).data('translate-from')) : 40;
//               var translateTo = $(this).data('translate-to') != undefined ? parseFloat($(this).data('translate-to')) : -40;
//               var dataDuration = $(this).data('duration') != undefined ? $(this).data('duration') : '100%';
//               timelineParallax.fromTo($(this), 1, {y: translateFrom}, {y: translateTo});
//
//               var scene = new ScrollMagic.Scene({
//                 triggerElement: scrollWrapper,
//                 triggerHook: 0.4,
//                 duration: dataDuration
//               })
//               .setTween(timelineParallax)
//               .addTo(controller);
//             });
//           }
//         }
//
//     });
//
//   // END OF FONT LOADING
//   });
//
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
// });
