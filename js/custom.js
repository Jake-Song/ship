jQuery( document ).ready( function($){

  $('.ship-custom.basic.table td input').prop('checked', true);

  // Mobile menu
  $('.navbar-toggle').on('click', function(e){
    e.stopImmediatePropagation();
    $('.navbar.navbar-default').toggleClass('show-menu');
    $(this).hide();
    var that = this;

    $('.mobile-close').on('click', function(e){
      $('.navbar.navbar-default').removeClass('show-menu');
      $(that).show();
    });

  });

  // Rest API Handling
  var addBuyContentBtn = $('#addBuyContent');
  if( addBuyContentBtn ){
    addBuyContentBtn.on('click', function(){
      $('.add-post-box').toggle();
    });
  }

  // Back to the top
  var offset = 250;
  var duration = 600;

  jQuery(window).scroll(function() {

  if ($(this).scrollTop() > offset) {

    $('#back-top').fadeIn(duration);

  } else {

    $('#back-top').fadeOut(duration);

  }

  });

  $('#back-top').click(function(event) {

    event.preventDefault();

  $('html, body').animate({scrollTop: 0}, duration);

    return false;

  });

  // Current Menu Color Changing
  $('.ship-category-menu > ul > li > a').each( function(){
    var href = $(this).attr('href');
    var location = window.location.href.replace(/\/$/, "");

    if( href == location ){
      $(this).addClass('active');
    } else {
      $(this).removeClass('active');
    }
  } );

  $(document).on('ajaxComplete', function(e){
    $('.ship-category-menu > ul > li > a').each( function(){
      var href = $(this).attr('href');
      var location = window.location.href.replace(/\/$/, "");

      if( href == location ){
        $(this).addClass('active');
      } else {
        $(this).removeClass('active');
      }
    } );
  });

  $(window).scroll(function(){
    var winTop = $(window).scrollTop();

    if(winTop >= 30){
      $(".site-header").addClass("sticky-header");
    } else {
      $(".site-header").removeClass("sticky-header");
    }
  });

  // Sliders
  if( $('#main-slider') !== 'undefined' ){
    var test = 0;
    var main = $('#main-slider').bxSlider({
      mode: 'fade',
      speed: 1000,
      pause: 4000,
      auto: true,
      autoControls: false,
      stopAutoOnClick: true,
      pager: false,
      startText: '',
      stopText: '',
      prevText: '',
      nextText: '',
      autoStart: true,
      wrapperClass: 'bx-wrapper main'
    });
  }
  if( $('.recent-ship.row') !== 'undefined' ){
    var recent = $('.recent-ship.row').bxSlider({
      auto: false,
      speed: 1500,
      slideWidth: 290,
      maxSlides: 4,
      moveSlides: 1,
      pager: false,
      prevText: '',
      nextText: '',
      wrapperClass: 'bx-wrapper recent-ship'
    });
  }
  if( $('#notice-slider') !== 'undefined' ){
    var notice = $('#notice-slider').bxSlider({
      mode: 'vertical',
      auto: true,
      autoStart: true,
      pager: false,
      startText: '',
      stopText: '',
      prevText: '',
      nextText: '',
      autoHover: true,
      speed: 1500,
      controls: false,
      wrapperClass: 'bx-wrapper notice'
    });
  }
  if( $('#news-slider') !== 'undefined' ){
    var news = $('#news-slider').bxSlider({
      mode: 'vertical',
      auto: true,
      autoStart: true,
      pager: false,
      startText: '',
      stopText: '',
      prevText: '',
      nextText: '',
      autoHover: true,
      speed: 1500,
      controls: false,
      wrapperClass: 'bx-wrapper notice'
    });
  }
  if( $('#partners-slider') !== 'undefined' ){
    var partners = $('#partners-slider').bxSlider({
      auto: false,
      speed: 1500,
      slideWidth: 150,
      maxSlides: 6,
      moveSlides: 1,
      pager: false,
      slideMargin: 30,
      prevText: '',
      nextText: '',
      wrapperClass: 'bx-wrapper partners'
    });
  }

  // Sliders function with matchMedia
  if( recent ){
    enquire.register("screen and (max-width:360px)", {

      // OPTIONAL
      // If supplied, triggered when a media query matches.
      match : function() {
        if( recent )
          recent.reloadSlider({
            auto: false,
            speed: 1500,
            slideWidth: 500,
            maxSlides: 1,
            moveSlides: 1,
            pager: false,
            prevText: '',
            nextText: '',
            wrapperClass: 'bx-wrapper recent-ship'
          });
      },

      // OPTIONAL
      // If supplied, triggered when the media query transitions
      // *from a matched state to an unmatched state*.
      unmatch : function() {
        if(recent)
          recent.reloadSlider({
            auto: false,
            speed: 1500,
            slideWidth: 250,
            maxSlides: 4,
            moveSlides: 1,
            pager: false,
            prevText: '',
            nextText: '',
            wrapperClass: 'bx-wrapper recent-ship'
          });
      },

      // OPTIONAL
      // If supplied, triggered once, when the handler is registered.
      setup : function() {

      },

      // OPTIONAL, defaults to false
      // If set to true, defers execution of the setup function
      // until the first time the media query is matched
      deferSetup : true,

      // OPTIONAL
      // If supplied, triggered when handler is unregistered.
      // Place cleanup code here
      destroy : function() {}

  });
  }



// Load Contents with ajax

  var newLocation = '',
  firstLoad = false,
  isLoading = false;

  $('.ship-category-menu').on('click', 'ul li a', function(e){
    e.preventDefault();
    var newPage = $(this).attr('href');
    var test = 0;
    if(!isLoading) changePage( newPage, true );
    firstLoad = true;
  });

  $(window).on('popstate', function() {
    if( firstLoad ) {
      /*
      Safari emits a popstate event on page load - check if firstLoad is true before animating
      if it's false - the page has just been loaded
      */
      var newPage = location.href;

      if( !isLoading  &&  newLocation != newPage ) changePage(newPage, false);

    }
    firstLoad = true;
  });

  function changePage( url, bool ) {
    isLoading = true;
    loadContent( url, bool);
    newLocation = url;
  }

  function loadContent( url, bool ){

    $.ajax({
      url: url,
      beforeSend: function(){
        $('article').hide();
        $('.ajax-preloader').show();
      },
      success: function( response ){

        var content = $(response).find('.wrapper-for-ajax > *');
        var section = $('<div class="wrapper-for-ajax"></div>');

        section.html(content);
        $('.ajax-container').html(section);
        isLoading = false;

        if(url!=window.location && bool){
          //add the new page to the window.history
          //if the new page was triggered by a 'popstate' event, don't add it
          window.history.pushState({path: url},'',url);
        }
      },
      error: function(error){
        console.log(error);
      }
    });

  }

  // Image slide for ship single
  var singleImages = $('.single-post-images .single-image');
  var addImages = $('.additional-image');
  var currentImage = singleImages[0];
  var currentAddImage = addImages[0];

  function navigate( counter ){
    $(currentImage).removeClass('current');
    $(currentAddImage).removeClass('current');

    currentImage = singleImages[counter];
    currentAddImage = addImages[counter];

    $(currentImage).addClass('current');
    $(currentAddImage).addClass('current');

  }

  var firstBtn = $('.additional-image.order-0');
  var secondBtn = $('.additional-image.order-1');
  var thirdBtn = $('.additional-image.order-2');
  var fourthBtn = $('.additional-image.order-3');

  firstBtn.on( 'click', function(e){
    e.preventDefault();
    navigate(0);
  });
  secondBtn.on( 'click', function(e){
    e.preventDefault();
    navigate(1);
  });
  thirdBtn.on( 'click', function(e){
    e.preventDefault();
    navigate(2);
  });
  fourthBtn.on( 'click', function(e){
    e.preventDefault();
    navigate(3);
  });
  navigate(0);

  // 베스트 선박
  var bestImgs = $('.image-section > img');
  var bestTexts = $('.text-section > .text');
  var currentBestImg = bestImgs[0];
  var currentBestText = bestTexts[0];
  var currentIndex = 0;

  function goTo(index){
    if( index < 0 || index > bestImgs.length - 1 ){
      return;
    }

    $(currentBestImg).removeClass('current');
    currentBestImg = bestImgs[index];
    $(currentBestImg).addClass('current');

    $(currentBestText).removeClass('current');
    currentBestText = bestTexts[index];
    $(currentBestText).addClass('current');

    currentIndex = index;

    $('.current-slide').text( currentIndex + 1);

  }
  function goToPrev(){
    goTo(currentIndex - 1);
  }
  function goToNext(){
    goTo(currentIndex + 1);
  }

  $('body').on('click', '.left-btn', function(){
    goToPrev();
  });
  $('body').on('click', '.right-btn',function(){
    goToNext();
  });

});
