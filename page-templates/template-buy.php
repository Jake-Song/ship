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

        <h3>삽니다</h3>
        <button type="button" id="addBuyContent" name="button">글 작성하기</button>
        <?php if(current_user_can('administrator')) : ?>

          <div class="add-post-box">
            <h3>글 작성하기</h3>
            <input type="text" name="title" placeholder="제목">
            <textarea name="content" placeholder="내용"></textarea>
            <button id="add-post-button">추가</button>
          </div>

        <?php endif; ?>
        <span class="market-icon"><i class="icon-plus-squared-alt"></i></span>
        <div class="bbs-table">
          <ul class="header">
            <li class="bbs-checkbox"><input type="checkbox" name="all-checked" value="all-checked"></li>
            <li class="bbs-title">제목</li>
            <li class="bbs-user">작성자</li>
            <li class="bbs-date">날짜</li>
            <li class="bbs-view">조회수</li>
          </ul>
          <ul class="list">
            <?php

              $current_page = get_query_var("paged");

              $args = array(
                'post_type' => 'ship_buying',
                'post_status' => 'publish',
                'posts_per_page' => 10,
                'paged' => $current_page
              );
              $query = new WP_Query( $args );

              $item_id = 1;

              if( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post();

                  $ship_location_terms = get_the_terms( $query->post->ID, 'ship_location' );

                ?>

                  <li id="item-<?php echo $query->post->ID; ?>">
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
                    <div class="read-post-box">
                      <h3>글 보기</h3>
                      <input type="text" name="title" placeholder="제목">
                      <textarea name="content" placeholder="내용"></textarea>
                      <button class="update-post-button">수정</button>
                      <button class="close-post-button">닫기</button>
                    </div>
                  </li>

              <?php
                $item_id++;
                endwhile;

                wp_reset_postdata();

                echo paginate_links(
                  array(
                    'total' => $query->max_num_pages
                  )
                );

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
