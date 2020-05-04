(function () {
  // ----------------------------
  // VIMEO PLAYER WITH OVERLAY
  // ----------------------------

  var videoHeader = $('.video-header').find('.js-video-autoplay');
  playVimeoVideo(videoHeader, 'bg');

  var bgVideoPlayer;
  var fullScreenPlayer;


  function playVimeoVideo (videoWrapper, mode) {

    // NOTE: The "un"muted property was not working with the player.js library, so added in an iframe and then used the player.js api to control the video
    var vimeoId = videoWrapper.data('video-id');
    var iframe = '<iframe src="https://player.vimeo.com/video/' + vimeoId + '?background=1&autoplay=1&loop=1&byline=0&title=0&muted=1&controls=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
    videoWrapper.find('.vimeo-player').html(iframe);

    // Instantiate the player.js API for events like end, pause, and slide change.
    var iframe = document.querySelector('iframe');

    if (mode == 'full') {
      fullScreenPlayer = new Vimeo.Player(iframe);
    } else {
      bgVideoPlayer = new Vimeo.Player(iframe);
    }

    // Fade out placeholder image and overlay
    videoWrapper.addClass('playing');
  }


  $('.js-show-full-video').on('click', function () {
    var $fullVideoWrapper = $(this).closest('.video-header').find('.js-full-video');
    playVimeoVideo($fullVideoWrapper, 'full');
    // Pause Background Video
    bgVideoPlayer.pause();
  });

  $('.js-close-full-screen-video').on('click', function () {
    var $fullVideoWrapper = $(this).closest('.video-header').find('.js-full-video');
    $fullVideoWrapper.removeClass('playing');
    fullScreenPlayer.pause();
    bgVideoPlayer.play();

  });


  // Start and stop videos on scroll
  var videoController = new ScrollMagic.Controller();
  // build scene
  var videoScene = new ScrollMagic.Scene({triggerElement: ".video-header", duration: '100%'})
  .addTo(videoController)
  .on("enter leave", function (e) {
		if (e.type == "enter") {
      if (bgVideoPlayer != undefined) {
        bgVideoPlayer.play();
      }
    } else {
      $('.js-full-video').removeClass('playing');
      if (fullScreenPlayer != undefined) {
        fullScreenPlayer.pause();
      }
      if (bgVideoPlayer != undefined) {
        bgVideoPlayer.pause();
      }
    }
	})


})();
