<div class="recent-ship">
    <div class="title">
      <h3>최근 등록 매물</h3>
    </div>
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
          $ship_maker_terms = get_the_terms( $post->ID, 'ship_maker' );
          $ship_model_terms = get_the_terms( $post->ID, 'ship_model' );
          $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
      ?>

      <?php include( locate_template( '/module/thumbnail.php', false, false ) ); ?>

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
