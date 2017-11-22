<?php get_header(); ?>

  <div class="banner">
    <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
  </div>

  <div class="content-box">

    <div class="navigation">
      <div class="title-box">
        <h2>매물 현황</h2>
      </div>
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <div class="ship-category-menu-wrapper">
      <?php include( locate_template( '/module/ship-category-common.php', false, false ) ); ?>
    </div>

    <div class="ajax-container">

       <div class="wrapper-for-ajax">

        <?php include( locate_template( '/module/ajax_preloader.php', false, false ) ); ?>

        <article class="post archive clearfix">

          <div id="sell">
            <h3>팝니다</h3>

          <?php if( have_posts() ) : ?>

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
              while( have_posts() ) : the_post();
                $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
          ?>

              <tr>
                <td class="number">
                  <?php echo $post->ID; ?>
                </td>
                <td class="img">
                  <?php if( has_post_thumbnail($post->ID) ) the_post_thumbnail('smallest'); ?>
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

            <?php endwhile; ?>

              </table>
            <?php

              else:

                echo '매물이 없습니다.';

              endif;
            ?>

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
