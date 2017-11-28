<?php get_header(); ?>

    <div class="banner">
      <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/page-banner.jpg" alt="">

    </div>

    <div class="content-box">
      <div class="navigation">
        <a href="<?php echo get_post_type_archive_link( 'ship_buying' ); ?>"><i class="icon-th"></i>목록보기</a>
        <?php qt_custom_breadcrumbs(); ?>
      </div>

    <?php
      if(have_posts()) :
          while(have_posts()) : the_post();

              setPostViews($post->ID); ?>

              <article class="post single-selling clearfix">

                <h4><?php the_title(); ?></h4>

                <p class="post-info"><?php the_time('Y년 n월 j일'); ?> | 카테고리

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

                <div class="go-list-button">
                  <a href="<?php echo get_post_type_archive_link( 'ship_buying' ); ?>" class="btn-diagonal-swipe">목록 보기</a>
                </div>

            </article>



    <?php endwhile;
      else :
          echo 'There is no post here.';
      endif;
   ?>

   </div>

<?php get_footer(); ?>
