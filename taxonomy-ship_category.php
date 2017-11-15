<?php get_header(); ?>

    <div class="banner">
      <img src="../../wp-content/themes/ship/img/page-banner.jpg" alt="">
      <div class="title-box">
        <h2><?php echo esc_html_e('선박매물'); ?></h2>
      </div>
    </div>

     <div class="content-box">

       <div class="navigation">
         <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>"><i class="icon-th"></i>목록보기</a>
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
                    <span class="market-icon"><i class="icon-plus-squared-alt"></i></span>

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
                  $test = 0;
                    if( have_posts() ) :
                      while( have_posts() ) : the_post();

                        if($post->post_type === "ship_selling") :

                        $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
                  ?>

                      <tr>
                        <td class="img">
                          <i class="icon-right-circled"></i>
                        </td>
                        <td class="name">
                          <a href="<?php the_permalink(); ?>">
                            <?php
                              if( $ship_location_terms )
                                echo '[' . $ship_location_terms[0]->name . ']' . " " . get_the_title();
                            ?>
                          </a>
                        </td>
                        <td class="date">
                          <?php
                            $ship_date = $post->post_date;
                            echo date('Y-n-j', strtotime($ship_date));
                          ?>
                        </td>
                      </tr>

                        <?php
                            endif;

                          endwhile;

                        else:
                          echo '매물이 없습니다.';

                        endif;

                        rewind_posts();
                       ?>

                      </table>

                    </div>

                   <div id="sell">

                     <h3>팝니다</h3>
                     <span class="market-icon"><i class="icon-plus-squared-alt"></i></span>

                     <table class="table ship-custom market">
                       <thead>
                         <tr>
                           <th></th>
                           <th>지역</th>
                           <th>제목</th>
                           <th>날짜</th>
                           <th>조회수</th>
                         </tr>
                       </thead>
                   <?php
                    $test = 0;
                     if( have_posts() ) :
                       while( have_posts() ) : the_post();
                         if($post->post_type === "ship") :
                           $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );
                   ?>

                       <tr>
                         <td class="img">
                           <?php if( has_post_thumbnail($post->ID) ) the_post_thumbnail('smallest'); ?>
                         </td>
                         <td class="name">
                           <a href="<?php the_permalink(); ?>">
                             <?php
                               if( $ship_location_terms )
                                 echo '[' . $ship_location_terms[0]->name . ']' . " " . get_the_title();
                             ?>
                           </a>
                         </td>
                         <td class="date">
                           <?php
                             $ship_date = $post->post_date;
                             echo date('Y-n-j', strtotime($ship_date));
                           ?>
                         </td>
                       </tr>

                     <?php
                        endif;

                       endwhile;

                     else:
                       echo '매물이 없습니다.';

                     endif;
                    ?>

                    </table>

                  </div>

                </div>

              </article>

          </div>

       </div>
   </div>
 <?php get_footer(); ?>
