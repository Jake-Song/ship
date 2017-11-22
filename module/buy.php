<div id="buy">
  <h3>삽니다</h3>
  <span class="market-icon"><i class="icon-plus-squared-alt"></i></span>

    <table class="table ship-custom market">
      <?php
        $args = array(
          'post_type' => 'ship_buying',
          'post_status' => 'publish',
          'posts_per_page' => 10,
        );
        $query = new WP_Query( $args );
        if( $query->have_posts() ) :
          while( $query->have_posts() ) : $query->the_post();
            $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );
        ?>
            <tr>
              <td class="img">
               <i class="icon-right-circled"></i>
              </td>
              <td class="name">
                <a href="<?php the_permalink(); ?>">
                  <?php
                    if( $ship_location_terms ){
                      echo '[' . $ship_location_terms[0]->name . ']' . " " . get_the_title();
                    } else {
                      echo get_the_title();
                    }
                  ?>
                </a>
              </td>
              <td class="date">
                <?php
                  $ship_date = $query->post->post_date;
                  echo date('Y-n-j', strtotime($ship_date));
                ?>
              </td>
            </tr>

        <?php endwhile;
          wp_reset_postdata();
        endif;
      ?>
    </table>

</div>
