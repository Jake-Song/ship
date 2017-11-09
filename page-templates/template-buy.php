<?php
  /*
  Template Name: 삽니다 페이지
  */
  get_header();
?>

  <div class="banner">
    <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
    <div class="title-box">
      <h2><?php the_title(); ?></h2>
    </div>
  </div>

  <div class="content-box">

    <div class="navigation">
      <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="fa fa-external-link" aria-hidden="true"></i>목록보기</a>
      <?php qt_custom_breadcrumbs(); ?>
    </div>

    <div id="market">

      <div id="buy">
        <span class="bk"></span>
        <h3>삽니다</h3>
        <button type="button" id="addBuyContent" name="button">글 작성하기</button>
        <?php if(current_user_can('administrator')) : ?>

          <div class="admin-quick-add">
            <h3>Quick Add Post</h3>
            <input type="text" name="title" placeholder="Title">
            <textarea name="content" placeholder="Content"></textarea>
            <button id="quick-add-button">Create Post</button>
          </div>

        <?php endif; ?>
        <span class="market-icon"><i class="icon-plus-squared-alt"></i></span>
        <div class="bbs-table">
          <ul class="header">
            <li class="bbs-title">제목</li>
            <li class="bbs-user">작성자</li>
            <li class="bbs-date">날짜</li>
            <li class="bbs-view">조회수</li>
          </ul>
          <ul>
            <?php
              $args = array(
                'post_type' => 'ship_selling',
                'post_status' => 'publish',
                'posts_per_page' => 10,
              );
              $query = new WP_Query( $args );

              $item_id = 1;

              if( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post();

                  $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );


                  $test = 0;
                ?>

                  <li>
                    <input type="checkbox" name="buy-check" value="<?php echo $query->post->ID; ?>">
                    <a href="<?php the_permalink(); ?>">
                      <div class="market-image-wrapper"><?php if( has_post_thumbnail($query->post->ID) ) the_post_thumbnail('smallest'); ?></div>
                      <span class="market-location-wrapper">
                        <?php
                          if( $ship_location_terms )
                            echo '[' . $ship_location_terms[0]->name . ']';
                        ?>
                      </span>
                      <span class="market-title-wrapper"><?php the_title(); ?></span>
                    </a>
                    <span class="author"><?php the_author(); ?></span>
                    <span class="date">
                      <?php
                        $ship_date = $query->post->post_date;
                        echo date('Y-n-j', strtotime($ship_date));
                      ?>
                    </span>
                    <span class="view">
                      <?php echo getPostViews($query->post->ID); ?>
                    </span>
                  </li>

              <?php
                $item_id++;
                endwhile;

                wp_reset_postdata();

              endif;

            ?>
          </ul>
        </div>

        <?php if(current_user_can('administrator')) : ?>
          <button type="button" id="delete" name="delete">삭제</button>
        <?php endif; ?>

      </div>

    </div>

</div>

<?php get_footer(); ?>
