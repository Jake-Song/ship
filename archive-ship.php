<?php get_header(); ?>

  <div class="banner">
    <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/sub-banner.jpg" alt="">
    <div class="title-box">
      <h2>매물 현황</h2>
    </div>
  </div>

  <div class="content-box">

    <div class="navigation">
      <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="fa fa-external-link" aria-hidden="true"></i>목록보기</a>
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <div class="ship-category-menu-wrapper">
      <?php include( locate_template( '/module/ship-category-common.php', false, false ) ); ?>
    </div>

    <div class="ajax-container">

       <div class="wrapper-for-ajax">

        <article class="post archive clearfix">

          <?php
            if( have_posts() ) :
              while( have_posts() ) : the_post();

              $ship_maker_terms = get_the_terms( $post->ID, 'ship_maker' );
              $ship_model_terms = get_the_terms( $post->ID, 'ship_model' );
              $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );

          ?>
              <div class="col-sm-6 col-md-3"
                data-maker="<?php echo esc_attr( ($ship_maker_terms) ? $ship_maker_terms[0]->name : ''); ?>"
                data-model="<?php echo esc_attr( ($ship_model_terms) ? $ship_model_terms[0]->name : ''); ?>"
                data-location="<?php echo esc_attr( ($ship_location_terms) ? $ship_location_terms[0]->name : ''); ?>"
              >

                <div class='custom thumbnail'>

                  <div class='custom thumbnail'>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'custom' ); ?>
                      <div class="caption">
                        <?php the_title(); ?>
                      </div>
                    </a>
                  </div>

                </div>

              </div>

           <?php
              endwhile;

              wp_reset_postdata();

            else:
              echo '매물이 없습니다.';

            endif;
           ?>

        </article>

      </div>

  </div>

 </div>

<?php get_footer(); ?>
