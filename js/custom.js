jQuery( document ).ready( function($){

    $('.slider').bxSlider({
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
      autoControls: true,
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

      $('.ship-category-navigator').on('click', 'ul li a', function(e){
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

      $('.nav-tabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
      });

      // Image slide for cosmetic single
      var singleImages = $('.single-post-images .single-image');
      var currentImage = singleImages[0];
      var test = 0;
      function navigate( counter ){
        $(currentImage).removeClass('current');

        currentImage = singleImages[counter];

        $(currentImage).addClass('current');
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

  // $('ul#filter a').click(function() {
  //    $(this).css('outline','none');
  //    $('ul#filter .current').removeClass('current');
  //    $(this).parent().addClass('current');
  //
  //    var filterVal = $(this).text().toLowerCase().replace(' ','-');
  //
  //    if(filterVal == 'all') {
  //      $('ul#portfolio li.not-showing').addClass('showing').removeClass('not-showing').css('display', 'inline-block');
  //    } else {
  //      $('ul#portfolio li').each(function() {
  //        if(!$(this).hasClass(filterVal)) {
  //          $(this).addClass('not-showing').removeClass('showing').css('display', 'none');
  //        } else {
  //          $(this).addClass('showing').removeClass('not-showing').css('display', 'inline-block');
  //        }
  //      });
  //    }
  //
  //    return false;
  //  });

});
