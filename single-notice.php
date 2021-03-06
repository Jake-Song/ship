<?php get_header(); ?>

    <div class="title-box">
      <h2>공지사항</h2>
    </div>

    <div class="content-box">

      <div class="navigation">
        <?php qt_custom_breadcrumbs(); ?>
      </div>

    <?php
      if(have_posts()) :
          while(have_posts()) : the_post();
            setPostViews($post->ID);
    ?>

            <article class="post clearfix">

              <?php get_template_part( 'content/content', 'notice' ); ?>

            </article>

    <?php endwhile;
      else :
          echo 'There is no post here.';
      endif;
   ?>

   </div>

<?php get_footer(); ?>
