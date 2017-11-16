<?php get_header(); ?>

    <div class="banner">
      <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/bram-naus-200967.jpg" alt="">
      <div class="title-box">
        <h2>삽니다</h2>
      </div>
    </div>

    <div class="content-box">

      <div class="navigation">
        <a href="<?php echo get_post_type_archive_link( 'ship_selling' ); ?>"><i class="icon-th"></i>목록보기</a>
        <?php qt_custom_breadcrumbs(); ?>
      </div>

    <?php
      if(have_posts()) :
          while(have_posts()) : the_post();

              setPostViews($post->ID); ?>

              <article class="post single-selling clearfix">

                <h2><?php the_title(); ?></h2>

                <p class="post-info"><?php the_time('Y년 n월 j일 a g:i'); ?> | 카테고리

                  <?php
                    $ship_categories = get_the_terms( $post->ID, 'ship_category');
                    $separator = ", ";
                    $output = '';
                    $test = 0;
                    if( $ship_categories ) :
                        foreach( $ship_categories as $ship_category ) :
                            $output .= '<a href="' . esc_url( home_url( '/' ) . $ship_category->taxonomy . '/' . $ship_category->slug) . '">' . $ship_category->name . '</a>' . $separator;
                        endforeach;
                        echo trim( $output, $separator );
                    endif;
                   ?>
                </p>
                <div class="content-wrapper">
                  <?php the_content(); ?>
                </div>
            </article>

    <?php endwhile;
      else :
          echo 'There is no post here.';
      endif;
   ?>

   </div>

<?php get_footer(); ?>
