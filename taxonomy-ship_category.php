<?php get_header(); ?>

     <div class="content-box">
       <div class="title-box">
         <h2>
           <?php
            echo esc_html_e('매물현황');
            $test = 0;
           ?>
         </h2>
       </div>
       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>

       <?php include( locate_template( '/module/ship-category-common.php', false, false ) ); ?>

       <div class="ajax-container">

          <div class="wrapper-for-ajax">

              <?php include( locate_template( '/module/ajax_preloader.php', false, false ) ); ?>

              <article class="post tax clearfix">

                <div id="market">

                  <div id="buy">

                    <h3>삽니다</h3>
                    <span class="market-icon">
                      <a href="
                        <?php
                          $ship_term = get_term_by( "slug", $ship_category, $taxonomy );
                          if( !$ship_term ){
                            echo get_post_type_archive_link( 'ship_buying' );
                          } else {
                            echo site_url('/') . 'ship_buying/category/' . $ship_term->slug;
                          }

                        ?>">
                        <i class="icon-plus-squared-alt"></i>
                      </a>
                    </span>

                  <?php if( have_posts() ) : ?>

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
                      $test = 0;
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
                      $ship_buying_number = $ship_category_posts_count - ($current_page - 1) * $posts_per_page;
                      $test = 0;
                      while( have_posts() ) : the_post();

                        if($post->post_type === "ship_buying") :

                        $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
                  ?>

                      <tr>
                        <td class="number">
                          <?php echo $ship_buying_number; ?>
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
                            $ship_buying_number--;

                            endif;

                          endwhile;
                        ?>

                        </table>

                      <?php
                        else:
                          echo '매물이 아직 등록되지 않았습니다.';

                        endif;

                        rewind_posts();
                       ?>

                    </div>

                   <div id="sell">

                     <h3>팝니다</h3>
                     <span class="market-icon">

                       <a href="
                         <?php
                           $ship_term = get_term_by( "slug", $ship_category, $taxonomy );
                           if( !$ship_term ){
                             echo get_post_type_archive_link( 'ship_buying' );
                           } else {
                             echo site_url('/') . 'ship/category/' . $ship_term->slug;
                           }
                          ?>">
                         <i class="icon-plus-squared-alt"></i>
                       </a>

                     </span>

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
                       $posts_per_page = get_option('posts_per_page');
                       $current_page = get_query_var('paged', 1) === 0 ? 1 : get_query_var('paged', 1);
                       $test = 0;
                       $ship_category_posts = new WP_Query(array(
                         'post_type' => 'ship',
                         'tax_query' => array(
                           array(
                               'taxonomy' => 'ship_category',
                               'field' => 'slug',
                               'terms' => $ship_category
                           )
                         ),
                       ));
                       $ship_category_posts_count = $ship_category_posts->found_posts;
                       $ship_number = $ship_category_posts_count - ($current_page - 1) * $posts_per_page;
                       $test = 0;
                       while( have_posts() ) : the_post();
                         if($post->post_type === "ship") :
                           $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
                   ?>

                   <tr>
                     <td class="number">
                       <?php echo $ship_number; ?>
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

                     <?php

                       $ship_number--;

                        endif;
                     ?>

                      </table>

                    <?php
                       endwhile;

                     else:
                       echo '매물이 아직 등록되지 않았습니다.';

                     endif;
                    ?>

                  </div>

                </div>

              </article>

          </div>

       </div>
   </div>
 <?php get_footer(); ?>
