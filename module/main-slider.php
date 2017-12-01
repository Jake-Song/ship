<div id="main-slider">

  <?php for( $i = 1; $i < 5; $i++ ) : ?>

   <div class="main-slide">
     <?php
         if( get_theme_mod("main_slider_settings_$i", '') !== '' ){
           $main_slider_id = get_theme_mod("main_slider_settings_$i");
           echo wp_get_attachment_image( $main_slider_id, 'full' );
         }
     ?>
    </div>

  <?php endfor; ?>

 </div>

 <div class="bg"></div>
