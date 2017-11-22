<?php
  /*
  Template Name: About Page
  */
  get_header();
?>

    <div class="banner">
      <img src="<?php echo site_url('/') ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
    </div>

     <div class="content-box">
       <div class="title-box">
         <h2><?php echo esc_html_e('회사소개'); ?></h2>
       </div>
       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>

       <div id="about-us">

          <div id="about-us-content-wrapper">
            <div id="about-us-content">
              <h3>인사말</h3>
              <p>안녕하십니까.</p>

              <p>먼저, 저희 사이트를 방문해 주셔서 감사드립니다.</p>

              <p>지금까지 어선, 선박 등을 거래할 실 때 어려움은 없으셨나요?</p>

              <p>많은 분들이 "믿고 맡길 곳이 없다", "인터넷에 보고 가보니 허위매물이더라", "터무니 없이 수수료를 챙긴다"
                등의 말씀을 해주셨습니다.</p>

              <p>그래서 저희는 이런 문제점들을 해결하고, 서로에게 득이 될 수 있도록 이 업을 시작하게 되었습니다.</p>

              <p>한국선박거래소는 해양수산부에 등록된 공식 중개업체입니다. 이젠 공식업체가 아닌 중개업자와 거래는 불법이며,
                법에 제재를 당하게 됩니다.</p>

              <p>한국선박거래소는 보증보험에 가입된 업체로서 고객분들께 혹시 손실이 나더라도 그 부분을 보증받으실 수 있게
                되었습니다.</p>

              <p>한국선박거래소는 어선, 선박의 중개와 매매 뿐 아니라 관련 민원처리 서비스도 제공하고 있습니다.</p>

              <p>앞으로 저희 한국선박거래소를 통해 하시는 일이 성공하시길 기원드립니다.</p>

              <p>감사합니다.</p>

            </div>
          </div>
       </div>

    </div>

 <?php get_footer(); ?>
