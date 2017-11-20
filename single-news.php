<?php get_header(); ?>

    <div class="banner">
      <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
      <div class="title-box">
        <h2>해양/수산 소식</h2>
      </div>
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
