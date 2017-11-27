<?php get_header(); ?>

  <div class="banner">
    <img src="<?php echo site_url('/'); ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
  </div>

  <div class="content-box">
    <div class="title-box">
      <h2>팝니다 - 상세 정보</h2>
    </div>
    <div class="navigation">
      <?php qt_custom_breadcrumbs(); ?>
    </div>

      <?php
        if(have_posts()) :
            while(have_posts()) : the_post();

              setPostViews($post->ID);
      ?>

                <article class="post single clearfix">

                  <div class="image-wrapper">

                    <div class="single-post-images">

                      <?php
                      $post_date = $post->post_date;
                      $current_time = current_time( 'Y-m-d' );
                      $test = 0;
                        if( has_post_thumbnail() ){
                            the_post_thumbnail( 'full', array( 'class' => 'single-image current' ) );
                        }

                        $single_post_images = get_post_meta( get_the_ID(), 'custom_image_data', true );

                        if( !empty($single_post_images) ) :

                            foreach ($single_post_images as $key => $image) {
                       ?>
                              <img class="single-image" src="<?php echo esc_url($image['url']); ?>" alt="">
                       <?php
                            }
                        endif;
                       ?>

                    </div>

                    <div class="additional-image-wrapper clearfix">
                        <?php

                          $single_post_images = get_post_meta( get_the_ID(), 'custom_image_data', true );
                          if( !empty($single_post_images) ) :
                        ?>

                            <div class="additional-image order-0 current">
                              <?php
                                if( has_post_thumbnail() ){
                                  the_post_thumbnail( 'full' );
                                }
                              ?>
                            </div>

                        <?php

                              foreach ($single_post_images as $key => $image) {
                            ?>

                              <div class="additional-image order-<?php echo (int)$key + 1 ?>">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="">
                              </div>

                            <?php
                              }
                          endif;
                         ?>
                     </div>

                  </div>

                    <?php

                    $ship_information = array(
                      'seller' => '판매자',
                      'ship_category' => '선박유형',
                      'tons' => '톤수',
                      'made_date' => '진수년월일',
                      'measure' => '주요치수',
                      'certificate' => '허가사항',
                      'sale_location' => '판매지역',
                      'forward_parts' => '추진기관',
                      'made_location' => '조선지',
                      'price' => '매매가',
                      'commit_name' => '담당자',
                      'commit_contact' => '연락처'
                    );

                    $ship_option_basic = array(
                      'gps' => 'GPS',
                      'detecter' => '어군탐지기',
                      'rader' => '레이더',
                      'ssb' => 'SSB무전기',
                      'generator' => '발전기',
                      'kitchen' => '주방',
                      'toilet' => '화장실'
                    );

                    $ship_option_addtional = array(
                      'aircon' => '에어컨',
                      'hitting' => '난방시설',
                      'elect_real' => '전동릴공급장치',
                      'cctv' => '감시카메라',
                      'satelite_phone' => '위성전화기',
                      'refridge' => '냉장고',
                      'roller' => '해수롤러'
                    );
                    ?>

                    <div class="ship-information">

                      <div class="ship-title">
                          <h3>
                            <?php
                              the_title();
                              ?>
                          </h3>
                      </div>

                      <?php
                        $current_index = 0;
                        $content = '
                          <table class="ship-custom table">
                          <caption>선박 기본정보</caption>
                        ';

                        foreach ($ship_information as $key => $value) :
                          $$key = get_post_meta( get_the_ID(), $key, true );

                          if( $current_index % 2 === 0 ){
                            if( $current_index === count($ship_information) - 1 ){
                              $content .=
                                "<tr><th>$value</th><td>{$$key}</td><td></td><td></td></tr>";
                            } else {
                              $content .=
                                "<tr><th>$value</th><td>{$$key}</td>";
                            }
                          } elseif( $current_index % 2 === 1 ) {
                            if( $key === 'price' ){
                              $content .=
                                "<th class='price'>$value</th><td class='price'>{$$key}</td></tr>";
                            } else {
                              $content .=
                                "<th>$value</th><td>{$$key}</td></tr>";
                            }
                          }

                          $current_index++;

                        endforeach;

                        $content .= '</table>';

                        echo $content;

                      ?>
                      <div class="button-wrapper">
                        <?php
                          $test = 0;
                          $contact = get_post_meta( get_the_ID(), 'commit_contact', true );
                        ?>
                        <a href="tel:<?php echo $contact; ?>" id="phone" class="btn btn-common-1"><span class="text">전화 문의하기</span></a>
                      </div>
                    </div>

                    <div class="ship-option-wrapper">

                      <div class="title">
                        <h3>선박 상세정보</h3>
                      </div>

                      <div class="ship-option-basic">
                        <?php

                        $content = '<table class="ship-custom basic table"><caption>기본 사양</caption>';

                        $current_index = 0;

                        foreach ($ship_option_basic as $key => $value) {

                            $$key = get_post_meta( get_the_ID(), $key, true );
                            $key_attr = !empty($$key) ? 'checked' : "";

                            if( $current_index % 2 === 0 ){
                              if( $current_index === count($ship_option_basic) - 1 ){
                                $content .=
                                  "<tr><td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td><td></td><td></td></tr>";
                              } else {
                                $content .=
                                  "<tr><td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td>";
                              }
                            } elseif( $current_index % 2 === 1 ) {
                              $content .=
                                "<td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td></tr>";
                            }

                            $current_index++;

                        }

                        $content .= '</table>';

                        echo $content;

                        ?>
                      </div>

                      <div class="ship-option-convenient">

                        <?php

                        $content = '<table class="ship-custom convenient table"><caption>편의 사양</caption>';

                        $current_index = 0;

                        foreach ($ship_option_addtional as $key => $value) {

                            $$key = get_post_meta( get_the_ID(), $key, true );
                            $key_attr = !empty($$key) ? ' checked' : "";

                            if( $current_index % 2 === 0 ){
                              if( $current_index === count($ship_option_addtional) - 1 ){
                                $content .=
                                  "<tr><td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td><td></td><td></td></tr>";
                              } else {
                                $content .=
                                  "<tr><td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td>";
                              }
                            } elseif( $current_index % 2 === 1 ) {
                              $content .=
                                "<td class='value'>$value</td><td><input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></td></tr>";
                            }

                            $current_index++;

                        }

                        $content .= '</table>';

                        echo $content;

                        ?>

                      </div>

                    </div>

                    <div class="ship-desc-wrapper">
                      <div class="title">
                        <h3>상세 설명</h3>
                      </div>
                      <div class="ship-desc">
                        <?php the_content(); ?>
                      </div>
                    </div>
                    <div class="go-list-button">
                      <a href="<?php echo get_post_type_archive_link( 'ship' ); ?>" class="btn-diagonal-swipe">목록 보기</a>
                    </div>

                </article>
      <?php endwhile;
        else :
            echo 'There is no post here.';
        endif;
     ?>

     </div>

<?php get_footer(); ?>
