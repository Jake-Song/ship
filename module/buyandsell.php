<div id="market">

  <div id="buy">
    <h3>삽니다</h3>
    <span class="market-icon">
      <a href="<?php echo get_post_type_archive_link( 'ship_buying' ); ?>">
        <i class="icon-plus-squared-alt"></i>
      </a>
    </span>

        <?php

          $args = array(
            'post_type' => 'ship_buying',
            'post_status' => 'publish',
            'posts_per_page' => 10,
          );

          $query = new WP_Query( $args );

          if( $query->have_posts() ) :

          ?>

            <table class="table ship-custom market">
              <thead>
                <tr>
                  <th>번호</th>
                  <th>지역</th>
                  <th>제목</th>
                  <th>날짜</th>
                  <th>조회수</th>
                </tr>
              </thead>

        <?php
            $posts_per_page = get_option('posts_per_page');
            $current_page = get_query_var('paged', 1) === 0 ? 1 : get_query_var('paged', 1);
            $number_ship_buying = wp_count_posts( 'ship_buying' );
            $number = $number_ship_buying->publish - ($current_page - 1) * $posts_per_page;

            while( $query->have_posts() ) : $query->the_post();

              $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );
          ?>
              <tr>
                <td class="number">
                  <?php
                    $test = 0;
                    echo $number;
                  ?>
                </td>
                <td class="location">
                  <?php
                    if( $ship_location_terms ){
                      echo '[' . $ship_location_terms[0]->name . ']';
                    }
                  ?>
                </td>
                <td class="name">
                  <a href="<?php the_permalink(); ?>">
                    <?php
                      echo get_the_title();
                    ?>
                  </a>
                </td>
                <td class="date">
                  <?php
                    $ship_date = $query->post->post_date;
                    echo date('n-j', strtotime($ship_date));
                  ?>
                </td>
                <td class="bbs_count">
                  <?php
                    echo getPostViews($query->post->ID);
                  ?>
                </td>
              </tr>

          <?php
              $number--;
            endwhile;
            wp_reset_postdata();
          ?>
            </table>
        <?php
          else:
            echo "매물이 아직 등록되지 않았습니다.";
          endif;
        ?>

  </div>

  <div id="sell">
    <h3>팝니다</h3>
    <span class="market-icon">
      <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="icon-plus-squared-alt"></i></a>
    </span>

      <?php
        $args = array(
          'post_type' => 'ship',
          'post_status' => 'publish',
          'posts_per_page' => 10,
        );
        $query = new WP_Query( $args );
        if( $query->have_posts() ) :
      ?>

      <table class="table ship-custom market">
        <thead>
          <tr>
            <th>번호</th>
            <th>이미지</th>
            <th>지역</th>
            <th>제목</th>
            <th>날짜</th>
            <th>조회수</th>
          </tr>
        </thead>
        <tbody>
          
        <?php
          $posts_per_page = get_option('posts_per_page');
          $current_page = get_query_var('paged', 1) === 0 ? 1 : get_query_var('paged', 1);
          $number_ship = wp_count_posts( 'ship' );
          $number = $number_ship->publish - ($current_page - 1) * $posts_per_page;

          while( $query->have_posts() ) : $query->the_post();
            $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );
        ?>
            <tr>
              <td class="number">
               <?php echo $number; ?>
              </td>
              <td class="img">
                <?php if( has_post_thumbnail($query->post->ID) ) the_post_thumbnail('smallest'); ?>
              </td>
              <td class="location">
                <?php
                  if( $ship_location_terms ){
                    echo '[' . $ship_location_terms[0]->name . ']';
                  }
                ?>
              </td>
              <td class="name">
                <a href="<?php the_permalink(); ?>">
                  <?php
                    echo get_the_title();
                  ?>
                </a>
              </td>
              <td class="date">
                <?php
                  $ship_date = $query->post->post_date;
                  echo date('n-j', strtotime($ship_date));
                ?>
              </td>
              <td class="bbs_count">
                <?php
                  echo getPostViews($query->post->ID);
                ?>
              </td>
            </tr>

        <?php $number--; endwhile;
          wp_reset_postdata();
        ?>
          </tbody>
        </table>
      <?php
        else:
          echo "매물이 아직 등록되지 않았습니다.";
        endif;
      ?>

  </div>

</div>
