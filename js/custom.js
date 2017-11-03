jQuery( document ).ready( function($){

  $(window).scroll(function(){
    var winTop = $(window).scrollTop();

    if(winTop >= 30){
      $(".site-header").addClass("sticky-header");
    } else {
      $(".site-header").removeClass("sticky-header");
    }
  });

    $('.slider').bxSlider({
      mode: 'fade',
      auto: true,
      autoControls: true,
      stopAutoOnClick: true,
      pager: true,
      startText: '',
      stopText: '',
      prevText: '',
      nextText: '',
      autoStart: false,
      wrapperClass: 'bx-wrapper main'
    });

    $('.notice-slider').bxSlider({
      mode: 'vertical',
      auto: true,
      autoStart: false,
      pager: false,
      startText: '',
      stopText: '',
      prevText: '',
      nextText: '',
      autoHover: true,
      speed: 1500,
      wrapperClass: 'bx-wrapper notice'
    });

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

        $('.image-section .overay').addClass('current').on('transitionend', function(){
          $(this).removeClass('current');
        });
        $('.text-section .overay').addClass('current').on('transitionend', function(){
          $(this).removeClass('current');
          $('.current-slide').text( currentIndex + 1);
        });
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
