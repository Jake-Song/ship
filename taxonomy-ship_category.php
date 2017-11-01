<?php get_header(); ?>

    <div class="banner">
      <img src="../../wp-content/themes/ship/img/page-banner.jpg" alt="">
      <div class="title-box">
        <h2><?php echo esc_html_e('선박매물'); ?></h2>
      </div>
    </div>

     <div class="content-box">

       <div class="navigation">
         <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="fa fa-external-link" aria-hidden="true"></i>목록보기</a>
         <?php qt_custom_breadcrumbs(); ?>
       </div>

       <?php include( locate_template( '/module/ship-category-menu.php', false, false ) ); ?>

       <?php include( locate_template( '/module/select-box.php', false, false ) ); ?>

       <div class="ajax-container">

          <div class="wrapper-for-ajax">

              <article class="post tax clearfix">

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

                  else:
                    echo '아직 매물이 없습니다.';

                  endif;
                 ?>

              </article>

          </div>

       </div>
   </div>
 <?php get_footer(); ?>
