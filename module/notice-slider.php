<div class="notice-wrapper">

  <?php

    $args = array(
      'post_type' => 'notice',
      'post_status' => 'publish',
      'order' => 'ASC'
    );
    $query = new WP_Query( $args );
   ?>

   <div class="notice-title">
     공지
   </div>

   <div class="notice-slider">

     <?php
       if( $query->have_posts() ) :
         while( $query->have_posts() ) : $query->the_post();
     ?>
           <div class="notice-slide">
             <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
           </div>
      <?php
         endwhile;

         wp_reset_postdata();

       else :
      ?>

         <p><?php esc_html_e( '공지사항이 없습니다.' ); ?></p>

      <?php
       endif;
      ?>

   </div>
</div>
