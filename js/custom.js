jQuery( document ).ready( function($){

  // Get all the slides
  var slides = $('.slide');
  var currentIndex = 0;
  var selector = $('.selector');
  var isPlaying = false;

  // Move the last slide before the first so the user is able to immediately go backwards
  slides.first().before(slides.last());
  play();

  function play(){
    if(!isPlaying){
      autoPlay = setInterval(function(){
        slides = $('.slide');
        slides.last().after(slides.first());

        if(currentIndex >= slides.length ){
          currentIndex = 0;
        }

        var activeSlide = $('.active');
        activeSlide.removeClass('active').next('.slide').addClass('active');

        if( currentIndex === slides.length - 1 ){
          selector.removeClass('current');
          $(selector[0]).addClass('current');
        } else {
          selector.removeClass('current');
          $(selector[currentIndex+1]).addClass('current');
        }

        isPlaying = true;
        currentIndex++;
        console.log(currentIndex);
      }, 3000);
    }
  }

  function pause(){
    clearInterval(autoPlay);
    isPlaying = false;
  }

  $('button').on('click', function() {
    // Get all the slides again
    slides = $('.slide');
    // Register button
    var button = $(this);
    // Register active slide
    var activeSlide = $('.active');

    // Next function
    if (button.attr('id') == 'next') {
      if( currentIndex >= slides.length ){
        currentIndex = 0;
      }

      if(isPlaying){
        pause();
        // Move first slide to the end so the user can keep going forward
        slides.last().after(slides.first());
        // Move active class to the right
        activeSlide.removeClass('active').next('.slide').addClass('active');
        selector.removeClass('current');
        if(currentIndex === slides.length -1){
          $(selector[0]).addClass('current');
        }
        $(selector[currentIndex+1]).addClass('current');
        play();
      } else {
        // Move first slide to the end so the user can keep going forward
        slides.last().after(slides.first());
        // Move active class to the right
        activeSlide.removeClass('active').next('.slide').addClass('active');
        selector.removeClass('current');
        if(currentIndex === slides.length -1){
          $(selector[0]).addClass('current');
        }
        $(selector[currentIndex+1]).addClass('current');
      }
      console.log(currentIndex);
      currentIndex++;
    }

    // Previous function
    if (button.attr('id') == 'previous') {

      if( currentIndex <= 0 ){
        currentIndex = slides.length - 1;
      }

      if(isPlaying){
        pause();
        // Move the last slide before the first so the user can keep going backwards
        slides.first().before(slides.last());
        // Move active class to the left
        activeSlide.removeClass('active').prev('.slide').addClass('active');
        play();
      } else {
        // Move the last slide before the first so the user can keep going backwards
        slides.first().before(slides.last());
        // Move active class to the left
        activeSlide.removeClass('active').prev('.slide').addClass('active');
        if(currentIndex === slides.length - 1){
          selector.removeClass('current');
          $(selector[currentIndex]).addClass('current');
        } else {
          selector.removeClass('current');
          $(selector[currentIndex-1]).addClass('current');
        }
      }
      console.log(currentIndex);
      currentIndex--;
    }

    if (button.attr('id') == 'play') { play(); }

    if (button.attr('id') == 'pause') { pause(); }

  });

  function navigate(counter){
    var selector = $('.selector');
    selector.removeClass('current');
    slides.removeClass('active');
    $(slides[counter]).addClass('active');
    $(selector[counter]).addClass('current');

  }

  $('.selector').on('click', function(){
    var count = $(this).data('index');
    navigate(count);
  });

});
