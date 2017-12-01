<?php get_header(); ?>

  <div class="content-box">
    <div class="title-box">
      <h2>매입 의뢰</h2>
    </div>
    <div class="navigation">
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <div class="ship-category-menu-wrapper">
      <?php include( locate_template( '/module/ship-category-common.php', false, false ) ); ?>
    </div>

    <div class="ajax-container">

       <div class="wrapper-for-ajax">

        <?php include( locate_template( '/module/ajax_preloader.php', false, false ) ); ?>

        <article class="post archive clearfix">

          <div id="buy">

            <h3>삽니다</h3>

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

            if( have_posts() ) :

              $posts_per_page = get_option('posts_per_page');
              $current_page = get_query_var('paged', 1) === 0 ? 1 : get_query_var('paged', 1);

              if( isset( $ship_category ) ) {
                $ship_category_posts = new WP_Query(array(
                  'post_type' => 'ship_buying',
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'ship_category',
                        'field' => 'slug',
                        'terms' => $ship_category
                    )
                  ),
                ));
                $ship_category_posts_count = $ship_category_posts->found_posts;
                $number = $ship_category_posts_count - ($current_page - 1) * $posts_per_page;
              } else {
                $number_ship = wp_count_posts( 'ship_buying' );
                $number = $number_ship->publish - ($current_page - 1) * $posts_per_page;
              }

              while( have_posts() ) : the_post();

                $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
          ?>

              <tr>
                <td class="number">
                 <?php echo $number; ?>
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
                    $ship_date = $post->post_date;
                    echo date('n-j', strtotime($ship_date));
                  ?>
                </td>
                <td class="bbs_count">
                  <?php
                    echo getPostViews($post->ID);
                  ?>
                </td>
              </tr>

                <?php
                  $number--;
                  endwhile;

                else:
                  echo '매물이 없습니다.';

                endif;

               ?>

              </table>

            </div>
            <div class="custom pagination">
              <?php
                global $wp_query;

                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                	'format' => '?paged=%#%',
                	'current' => max( 1, get_query_var('paged') ),
                	'total' => $wp_query->max_num_pages
                ) );
              ?>
            </div>

        </article>

      </div>

  </div>

 </div>

<?php get_footer(); ?>
