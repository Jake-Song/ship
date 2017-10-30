<?php get_header(); ?>

  <div class="banner">
    <img src="../../wp-content/themes/ship/img/bram-naus-200967.jpg" alt="">
    <div class="title-box">
      <h2><?php echo the_title(); ?></h2>
    </div>
  </div>

  <div class="content-box">

    <div class="navigation">
      <a href="#"><i class="fa fa-external-link" aria-hidden="true"></i>목록보기</a>
      <?php qt_custom_breadcrumbs(); ?>
    </div>

      <?php
        if(have_posts()) :
            while(have_posts()) : the_post(); ?>

                <article class="post single clearfix">

                  <div class="image-wrapper">

                    <div class="single-post-images">

                      <?php
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

                    <div class="additional-image-wrapper">
                        <?php

                          $single_post_images = get_post_meta( get_the_ID(), 'custom_image_data', true );
                          if( !empty($single_post_images) ) :

                              if( has_post_thumbnail() ){
                                the_post_thumbnail( 'full', array( 'class' => 'additional-image order-0' ) );
                              }

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
                      'sale_location' => '판매정박지',
                      'forward_parts' => '추진기관',
                      'made_location' => '조선지',
                      'commit_name' => '담당자이름',
                      'commit_contact' => '연락처',
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
                          <h3><?php the_title(); ?></h3>
                      </div>

                      <?php
                        $current_index = 0;
                        $content = '
                          <table class="ship-custom table table-bordered">
                            <tr colspan="4"><th>선박기본정보</th><th></th><th></th><th></th></tr>
                        ';

                        foreach ($ship_information as $key => $value) :
                          $$key = get_post_meta( get_the_ID(), $key, true );

                          if( $current_index % 2 === 0 ){
                            $content .=
                              "<tr><td class='value'>$value</td><td>{$$key}</td>";
                          } else {
                            $content .=
                              "<td class='value'>$value</td><td>{$$key}</td></tr>";
                          }

                          $current_index++;

                        endforeach;

                        $content .= '</table>';

                        echo $content;

                      ?>
                      <div class="button-wrapper">
                        <button type="button" name="button">전화 문의하기</button>
                        <button type="button" name="button">메일 문의하기</button>
                      </div>
                    </div>

                    <div class="ship-option-wrapper">

                      <div class="title">
                        <h3>선박 상세정보</h3>
                      </div>

                      <div class="ship-option-basic">
                        <?php

                        $content = '<ul>';

                        foreach ($ship_option_basic as $key => $value) {

                            $$key = get_post_meta( get_the_ID(), $key, true );
                            $key_attr = !empty($$key) ? ' checked' : "";
                            $content .= "<li>{$value}<input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></li>";

                        }

                        $content .= '</ul>';

                        echo $content;

                        ?>
                      </div>

                      <div class="ship-option-additional">
                        <?php

                        $content = '<ul>';

                        foreach ($ship_option_addtional as $key => $value) {

                            $$key = get_post_meta( get_the_ID(), $key, true );
                            $key_attr = !empty($$key) ? ' checked' : "";
                            $content .= "<li>{$value}<input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' /></li>";

                        }

                        $content .= '</ul>';

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
                      <a href="#">목록보기</a>
                    </div>

                </article>
      <?php endwhile;
        else :
            echo 'There is no post here.';
        endif;
     ?>

     </div>

<?php get_footer(); ?>
