(function () {
  var $window = $(window);
  var prevNewsUrl;
  var newsIndex = 0;
  var newsImageCount = $('.js-placeholder-img').length;
  var newsLoaded = false;
  var prevWindowWidth;
  var newsInterval;


  function resetNewsStyles () {
    $('.js-placeholder-img').eq(0).siblings().removeClass('current-news-img');
    $('.js-placeholder-img').eq(0).addClass('current-news-img');
    $('.js-show-hover-img').eq(0).siblings().removeClass('active-news-link');
    $('.js-show-hover-img').eq(0).addClass('active-news-link');
  }

  function displayNewsImgOnHover (self) {
    var selectedArticle = $(self).data('article-handle');
    if (selectedArticle != prevNewsUrl) {
      $('.js-placeholder-img').removeClass('current-news-img');
      $('#' + selectedArticle).addClass('current-news-img');
      $('.active-news-link').removeClass('active-news-link');
      $(self).addClass('active-news-link');
      prevNewsUrl = selectedArticle;
    }
  }

  function newsCarousel () {
    $('.js-placeholder-img').removeClass('current-news-img');
    $('.js-placeholder-img').eq(newsIndex).addClass('current-news-img');
    $('.js-show-hover-img').removeClass('active-news-link');
    $('.js-show-hover-img').eq(newsIndex).addClass('active-news-link');

    if (newsIndex < newsImageCount - 1) {
      newsIndex++;
    } else {
      newsIndex = 0;
    }
  }

  function newsModuleSetup () {
    var windowWidth = $window.innerWidth();

    // Only run when initializing or when switching from tablet to mobile, or vice versa
    if (newsLoaded == false || windowWidth <= 768 && prevWindowWidth > 768 || windowWidth > 768 && prevWindowWidth <= 768) {

      resetNewsStyles();

      // If mobile, load news autoplay carousel
      if (windowWidth <= 768 && (prevWindowWidth > 768 || newsLoaded == false)) {
        // Remove mouseover image reveal
        $('.js-show-hover-img').off('mouseenter.showNewsHover');
        // Reveal on timer
        newsInterval = setInterval(function () {
          newsCarousel();
        }, 4000);
      } else {
        // If desktop, show image on hover
        // Clear timer if it exists
        clearInterval(newsInterval);
        // Add mouseover event to links
        $('.js-show-hover-img').on('mouseenter.showNewsHover', function (e) {
          displayNewsImgOnHover(this);
        });
      }

      prevWindowWidth = $window.innerWidth();
      newsLoaded = true;
    }

  }

  $window.on('resize', function () {
    newsModuleSetup();
  });

  newsModuleSetup();

})();
