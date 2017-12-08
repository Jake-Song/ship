<div class="recent-ship">
    <div class="title">
      <h3>최근 매물</h3>
    </div>
    <?php
      $args = array(
        'post_type' => 'ship',
        'posts_per_page' => 6,
      );
      $query = new WP_Query( $args );
     ?>

    <?php
        if( $query->have_posts() ) : ?>

          <div class="recent-ship row">

    <?php
          while( $query->have_posts() ) : $query->the_post();
          $ship_maker_terms = get_the_terms( $post->ID, 'ship_maker' );
          $ship_model_terms = get_the_terms( $post->ID, 'ship_model' );
          $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
      ?>

      <?php include( locate_template( '/module/thumbnail.php', false, false ) ); ?>

       <?php
          endwhile;

          wp_reset_postdata();
        ?>
          </div>

      <?php else : ?>

          <p class="not-found-post"><?php esc_html_e( '매물이 아직 등록되지 않았습니다.' ); ?></p>

      <?php endif; ?>

</div>
