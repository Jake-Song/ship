<?php
  /*
  Template Name: Front Page
  */
  get_header();
?>

 <?php include( locate_template( '/module/main-slider.php', false, false ) ); ?>

    <div class="content-box">

      <div class="ship-category clearfix">

        <?php include( locate_template( '/module/ship-category-common.php', false, false ) ); ?>

        <?php
          $args = array(
            'post_type' => 'ship',
            'post_status' => 'publish',
          );
          $query = new WP_Query( $args );
        ?>

        <div class="ajax-container">

            <div class="wrapper-for-ajax">

              <?php include( locate_template( '/module/ajax_preloader.php', false, false ) ); ?>

              <article class="post front clearfix">

                <?php include( locate_template( '/module/buyandsell.php', false, false ) ); ?>

              </article>

            </div>
        </div>
  </div>

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
              'certificate' => '허가사항',
              'sale_location' => '판매정박지',
              'forward_parts' => '추진기관',
              'made_location' => '조선지',
              'commit_name' => '담당자이름',
              'commit_contact' => '연락처',
            );

            while($featured_query->have_posts()) : $featured_query->the_post();

              if($current_index === 0) :

                echo "<div class='text current'>";

              else :

                echo "<div class='text'>";

              endif;

              ?>
              <h4>프리미엄 선박</h4>
              <h2><?php the_title(); ?></h2>

              <div class="best-ship-info">

                <?php
                  $li_index = 0;
                  $content = '<table class="best-ship-table">';

                  foreach ($ship_information as $key => $value) :
                    $$key = get_post_meta( get_the_ID(), $key, true );

                    if( $li_index % 2 === 0 ){
                      if( $li_index === count($ship_information) - 1 ){
                        $content .=
                          "<tr><th>$value</th><td>{$$key}</td><td></td><td></td></tr>";
                      } else {
                        $content .=
                          "<tr><th>$value</th><td>{$$key}</td>";
                      }
                    } elseif( $li_index % 2 === 1 ) {
                      $content .=
                        "<th>$value</th><td>{$$key}</td></tr>";
                    }

                    $li_index++;

                  endforeach;

                  $content .= '</table>';

                  echo $content;
                 ?>

               </div>

              <div class="best-ship-content">
                <?php the_excerpt(); ?>
              </div>

              <div class="best-btn-wrapper">
                <a href="<?php the_permalink(); ?>" class="btn btn-common-1 best"><span class="text">상세 보기</span></a>
              </div>
              <div class="best-nav">
                <span class="left-btn"><i class="icon-left"></i></span>
                <div class="count">
                  <span class="current-slide">1</span> / <span class="total-slide"><?php echo count( $featured_query->posts ); ?></span>
                </div>
                <span class="right-btn"><i class="icon-right"></i></span>
              </div>
            </div>

        <?php

              $current_index++;

            endwhile;

            wp_reset_postdata();

          endif;

        ?>

      </div>

    </div>

   <?php //include( locate_template( '/module/notice-slider.php', false, false ) ); ?>

   <?php include( locate_template( '/module/recent-ship.php', false, false ) ); ?>

   <div id="notice-box">
     <div class="notice-content">
       <h3>공지</h3>
       <span>공지 사항입니다.</span>
       <div class="notice-icon">
         <a href="<?php echo site_url('/') . '공지사항'; ?>"><i class="icon-plus-squared-alt"></i></a>
       </div>
     </div>
     <div class="notice-content">
       <h3>해양/수산 소식</h3>
       <span>해양/수산 소식입니다.</span>
       <div class="notice-icon">
         <a href="<?php echo site_url('/') . '해양-수산-소식'; ?>"><i class="icon-plus-squared-alt"></i></a>
       </div>
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
        <div class="sub-box">
          <h3>질문과 답변</h3>
          <?php echo do_shortcode('[mb_latest name="qanda" title="qanda" list_size="5" style=""]'); ?>
        </div>
        <div class="sub-box">
          <div id="sub-box-content">
            <div id="sub-box-icon">
              <i class="icon-anchor"></i>
            </div>
            <div id="sub-box-text">
              지점 안내
            </div>
          </div>
        </div>
      </div>

    </div>

    <div id="partners">

      <div id="partners-content">

        <div id="partners-slider">

          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>
          <div class="partners-slide">
            <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/amazon-logo.png" alt="">
          </div>

        </div>
      </div>
    </div>

  </div>

<?php get_footer(); ?>
