<?php get_header(); ?>

    <div class="content-box">
      <div class="title-box">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="navigation">
        <?php qt_custom_breadcrumbs(); ?>
      </div>

      <?php
        if(have_posts()) :
          while(have_posts()) : the_post(); ?>

            <article class="post page">
               <?php the_content(); ?>
            </article>
    <?php endwhile;
        else :
            echo '포스트가 없습니다.';
        endif;

     ?>

   </div>

 <?php get_footer(); ?>
