<div class="news-wrapper">

  <?php

    $args = array(
      'post_type' => 'news',
      'post_status' => 'publish',
      'order' => 'ASC'
    );
    $query = new WP_Query( $args );
   ?>

   <div class="news-title">
     해양수산 소식
   </div>

   <div id="news-slider">

     <?php
       if( $query->have_posts() ) :
         while( $query->have_posts() ) : $query->the_post();
     ?>
           <div class="news-slide">
             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
           </div>
      <?php
         endwhile;

         wp_reset_postdata();

       else :
      ?>

         <p><?php esc_html_e( '소식이 없습니다.' ); ?></p>

      <?php
       endif;
      ?>

   </div>
</div>
