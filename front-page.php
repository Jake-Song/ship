<?php
  /*
  Template Name: Front Page
  */
  get_header();
?>

 <?php include( locate_template( '/module/main-slider.php', false, false ) ); ?>

 <?php include( locate_template( '/module/notice-slider.php', false, false ) ); ?>

    <div class="content-box">

      <div class="best-ship">

        <div class="image-section">

        <?php
          $featured_args = array(
            'post_type' => 'ship',
            'post_status' => 'publish',
            'meta_query' => array(
          		array(
                'key'   => 'best_featured',
                'value' => 'best_featured'
          		),
          	),
          );

          $featured_query = new WP_Query( $featured_args );

          if($featured_query->have_posts()) :

            $current_index = 0;

            while($featured_query->have_posts()) : $featured_query->the_post();
            $test = 0;
              if($current_index === 0){
                if( has_post_thumbnail() ){
                  the_post_thumbnail( 'full', array( 'class' => ' current' ) );
                }
              } else {
                if( has_post_thumbnail() ){
                  the_post_thumbnail( 'full' );
                }
              }

              $current_index++;

            endwhile;

            wp_reset_postdata();

          endif;
         ?>
         <div class="overay">
           <i class="icon-ship"></i>
         </div>
       </div>

        <div class="text-section">

          <?php

            if($featured_query->have_posts()) :

              $current_index = 0;
              $content = '';

              $ship_information = array(
                'seller' => '판매자',
                'ship_category' => '선박유형',
                'tons' => '톤수',
                'made_date' => '진수년월일',
                'measure' => '주요치수',
                // 'certificate' => '허가사항',
                // 'sale_location' => '판매정박지',
                // 'forward_parts' => '추진기관',
                // 'made_location' => '조선지',
                // 'commit_name' => '담당자이름',
                // 'commit_contact' => '연락처',
              );

              while($featured_query->have_posts()) : $featured_query->the_post();

                if($current_index === 0) :

                  echo "<div class='text current'>";

                else :

                  echo "<div class='text'>";

                endif;

                ?>
                <h4>베스트 선박</h4>
                <h2><?php the_title(); ?></h2>

                <div class="best-ship-info">

                  <?php
                    $li_index = 0;
                    $content = '<ul>';
                    foreach ($ship_information as $key => $value) :
                      $$key = get_post_meta( get_the_ID(), $key, true );

                      if( $li_index <= (count($ship_information) - 1) / 2 ){
                        $content .= "<li class='left'>{$value} : {$$key}</li>";
                      } else {
                        $content .= "<li class='right'>{$value} : {$$key}</li>";
                      }

                      $li_index++;
                    endforeach;
                    $content .= '</ul>';
                    echo $content;
                   ?>

                 </div>

                <div class="best-ship-content">
                  <?php the_excerpt(); ?>
                </div>

                <div class="best-btn-wrapper">
                  <a href="#">상세 보기</a>
                </div>
                <div class="best-nav">
                  <span class="left-btn"><i class="icon-left-open-big"></i></span>
                  <span class="right-btn"><i class="icon-right-open-big"></i></span>
                  <div class="count">1/5</div>
                </div>
              </div>

          <?php

                $current_index++;

              endwhile;

              wp_reset_postdata();

            endif;

          ?>

          <div class="overay">
            <i class="icon-doc-text"></i>
          </div>

        </div>

          <!-- <div class="text current">
            <h4>선박 상세 정보1</h4>
            <h2>챔피언</h2>
            <table class="table best-ship">
              <tr>
                <td>판매자:</td><td>000</td><td>선박유형:</td><td>000</td>
              </tr>
              <tr>
                <td>판매자:</td><td>000</td><td>선박유형:</td><td>000</td>
              </tr>
              <tr>
                <td>판매자:</td><td>000</td><td>선박유형:</td><td>000</td>
              </tr>
              <tr>
                <td>판매자:</td><td>000</td><td>선박유형:</td><td>000</td>
              </tr>
            </table>
            <p>상세 정보입니다. 상세 정보입니다. 상세 정보입니다. 상세 정보입니다.</p>

            <div class="best-btn-wrapper">
              <a href="#">상세 보기</a>
            </div>
            <div class="best-nav">
              <span class="left-btn"><i class="icon-left-open-big"></i></span>
              <span class="right-btn"><i class="icon-right-open-big"></i></span>
              <div class="count">1/5</div>
            </div>
          </div> -->

      </div>

      <div class="ship-category clearfix">

        <?php include( locate_template( '/module/ship-category-menu.php', false, false ) ); ?>

      </div>

      <div class="info-container">
        <h3>해양 & 수산정보</h3>
        <div class="sea-info">
          <div class="sea-info-content">
            <i class="icon-anchor"></i>해양 정보
          </div>
        </div>
        <div class="fishing-info">
          <div class="fishing-info-content">
            <i class="icon-doc-text"></i>수산 정보
          </div>
        </div>
      </div>

      <div class="recent-ship">
        <h3>최근 등록 매물</h3>

        <?php
          $args = array(
            'post_type' => 'ship',
            'posts_per_page' => 6,
          );
          $query = new WP_Query( $args );
         ?>

        <div class="recent-ship row">
          <?php
            if( $query->have_posts() ) :
              while( $query->have_posts() ) : $query->the_post();
          ?>
                <div class="col-sm-6 col-md-3">
                  <div class='custom thumbnail'>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'custom' ); ?>
                      <div class="caption">
                        <?php echo get_the_title(); ?>
                      </div>
                    </a>
                  </div>
                </div>
           <?php
              endwhile;

              wp_reset_postdata();

            else :
           ?>

              <p><?php esc_html_e( '매물이 없습니다.' ); ?></p>

           <?php
            endif;
           ?>

        </div>

    </div>

    <div class="info-box">
      <div class="main-box">
        <div class="main-box-text">
          <h4>구입 및 대여 서비스</h4>
          <h2>선박 장비를 대여 받거나 구입하실 분 문의 부탁드립니다.</h2>
          <h2>1588-1588</h2>
        </div>
      </div>
      <div class="sub-box-wrapper">
        <div class="sub-box">sub</div>
        <div class="sub-box">sub</div>
      </div>

    </div>

  </div>

<?php get_footer(); ?>
