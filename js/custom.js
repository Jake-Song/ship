jQuery( document ).ready( function($){

    $('.slider').bxSlider({
      auto: true,
      autoControls: true,
      stopAutoOnClick: true,
      pager: true,
      wrapperClass: 'bx-wrapper main'
    });

      $('.notice-slider').bxSlider({
        mode: 'vertical',
        controls: false,
        auto: true,
        autoControls: true,
        pager: false,
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

  $('ul#filter a').click(function() {
     $(this).css('outline','none');
     $('ul#filter .current').removeClass('current');
     $(this).parent().addClass('current');

     var filterVal = $(this).text().toLowerCase().replace(' ','-');

     if(filterVal == 'all') {
       $('ul#portfolio li.hidden').fadeIn('slow').removeClass('hidden');
     } else {
       $('ul#portfolio li').each(function() {
         if(!$(this).hasClass(filterVal)) {
           $(this).fadeOut('normal').addClass('hidden');
         } else {
           $(this).fadeIn('slow').removeClass('hidden');
         }
       });
     }

     return false;
   });

});
