<div class="recent-ship">

    <h3>최근 등록 매물</h3>

    <?php
      $args = array(
        'post_type' => 'ship',
        'posts_per_page' => 6,
      );
      $query = new WP_Query( $args );
     ?>

    <div class="recent-ship row">
      <?php
        if( $query->have_posts() ) :
          while( $query->have_posts() ) : $query->the_post();
      ?>
            <div class="col-sm-6 col-md-3">
              <div class='custom thumbnail'>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'custom' ); ?>
                  <div class="caption">
                    <?php echo get_the_title(); ?>
                  </div>
                </a>
              </div>
            </div>
       <?php
          endwhile;

          wp_reset_postdata();

        else :
       ?>

          <p><?php esc_html_e( '매물이 없습니다.' ); ?></p>

       <?php
        endif;
       ?>

    </div>

</div>
