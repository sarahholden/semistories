var currentStepIndex = 1;

var stepsTimer;
var initialLoad = true;
var previousWindowWidth = $(window).innerWidth();

$(window).on('resize', function () {
  setUpStepCarousel();
});

// init controller
var talentController = new ScrollMagic.Controller();

// build scene
var scene = new ScrollMagic.Scene({triggerElement: '.js-steps-carousel', duration: '100%'})
  .addTo(talentController)
  .on("enter leave", function (e) {
    if (e.type == "enter") {
      setUpStepCarousel();
    }
  })


// Carousel for Desktop up
function setUpStepCarousel () {
  var currentWindowWidth = $(window).innerWidth();

  if (currentWindowWidth > 1024 && initialLoad || currentWindowWidth > 1024 && previousWindowWidth <= 1024) {
    currentStepIndex = 0;
    switchSteps();
    clearInterval(stepsTimer);
    stepsTimer = setInterval(switchSteps, 5000);
    $('.step').on('click', switchStepsOnClick);
    initialLoad = false;
  }  else if (currentWindowWidth <= 1024 && previousWindowWidth > 1024) {
    // Remove interval if switching from desktop to mobile
    clearInterval(stepsTimer);
  }
  resumingAfterPause = false;

  previousWindowWidth = currentWindowWidth;
}

function switchStepsOnClick () {
  var $selectedStep = $(this);
  if ($selectedStep.hasClass('active') == false) {
    currentStepIndex = parseInt($selectedStep.data('step-index')) - 1 ;

    switchSteps();
    clearInterval(stepsTimer);
    stepsTimer = setInterval(switchSteps, 5000);
  }
}

function switchSteps () {
  if (currentStepIndex < 3) {
    currentStepIndex += 1;
  } else {
    currentStepIndex = 1;
  }

  $('.step').removeClass('active');
  $('[data-step-index="' + currentStepIndex + '"]').addClass('active');
}
