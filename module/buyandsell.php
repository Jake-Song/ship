<div id="market">

  <div id="buy">
    <h3>삽니다</h3>
    <span class="market-icon">
      <a href="<?php echo get_post_type_archive_link( 'ship_selling' ); ?>">
        <i class="icon-plus-squared-alt"></i>
      </a>
    </span>

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

          $args = array(
            'post_type' => 'ship_selling',
            'post_status' => 'publish',
            'posts_per_page' => 10,
          );

          $query = new WP_Query( $args );

          if( $query->have_posts() ) :
            while( $query->have_posts() ) : $query->the_post();

              $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );
          ?>
              <tr>
                <td class="number">
                 <?php echo $query->post->ID; ?>
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
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
      </table>

  </div>

  <div id="sell">
    <h3>팝니다</h3>
    <span class="market-icon">
      <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="icon-plus-squared-alt"></i></a>
    </span>

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
      <?php
        $args = array(
          'post_type' => 'ship',
          'post_status' => 'publish',
          'posts_per_page' => 10,
        );
        $query = new WP_Query( $args );
        if( $query->have_posts() ) :
          while( $query->have_posts() ) : $query->the_post();
            $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );
        ?>
            <tr>
              <td class="number">
               <?php echo $query->post->ID; ?>
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

        <?php endwhile;
          wp_reset_postdata();
        endif;
      ?>
    </table>

  </div>

</div>
