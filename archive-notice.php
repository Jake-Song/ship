<?php get_header(); ?>

  <div class="content-box">
    <div class="title-box">
      <h2>공지사항</h2>
    </div>
    <div class="navigation">
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <article class="post archive clearfix">

      <?php if( have_posts() ) : ?>
        <table class="table ship-custom market">
          <thead>
            <tr>
              <th>번호</th>
              <th>제목</th>
              <th>날짜</th>
              <th>조회수</th>
            </tr>
          </thead>
      <?php

        $posts_per_page = get_option('posts_per_page');
        $current_page = get_query_var('paged', 1) === 0 ? 1 : get_query_var('paged', 1);
        $number_notice = wp_count_posts( 'notice' );
        $number = $number_notice->publish - ($current_page - 1) * $posts_per_page;

        while( have_posts() ) : the_post();

      ?>

          <tr>
            <td class="number">
              <?php echo $number; ?>
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
                echo date('n-d', strtotime($ship_date));
              ?>
            </td>
            <td class="bbs_count">
              <?php
                echo getPostViews($post->ID);
              ?>
            </td>
          </tr>

        <?php $number--; endwhile; ?>

        </table>

        <?php

          else:

            echo '매물이 아직 등록되지 않았습니다.';

          endif;
        ?>

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

<?php get_footer(); ?>
