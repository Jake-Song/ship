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
         <h2><?php echo esc_html_e('인사말'); ?></h2>
       </div>
       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>

       <div id="about-us">

          <div id="about-us-content-wrapper">
            <div id="about-us-content">

              <p>안녕하십니까.</p>
              <p>먼저, 저희 홈페이지를 방문해 주셔서 감사드립니다.</p>
              <p>지금까지 선박을 거래할 때 어려움과 고민은 없으셨나요?</p>
              <p>많은 분들께서 "믿고 맡길 만한 곳이 없더라", "인터넷에서 보고 직접 가보니 허위매물이더라", "터무니 없는 수수료를 챙기더라", "문제가 생기니 나몰라라 하더라"등의 불만을 토로하셨습니다.</p>
              <p>저희는 이런 문제들을 해결하고, 거래 당사자들께 서로 이득이 될 수 있도록 하기 위해 한국선박거래소를 시작하게 되었습니다.</p>
              <p><한국선박거래소는 이러한 기업입니다></p>
              <p>1.해양수산부에서 인정한 공식 중개업체입니다. 이제부터 미등록된 중개업자와의 거래는 불법이며, 이를 위반시 법적 제재를 받게 됩니다.</p>
              <p>2.서울보증보험에 가입등록된 업체입니다. 중개업체의 실수로 손실이 발생하면 그 일부를 이제는 보증받으실 수 있습니다.</p>
              <p>3.(사)한국어선중개업협회의 공식 회원사입니다. 해양수산부에서 인가 받은 협회의 구성원으로써 고객분들께서 신뢰할 수 있는 기업입니다.</p>
              <p>4.업계 최고 전문가분들에게 중개, 매매뿐 아니라 선박과 관련된 소소한 민원처리까지 원스톱(one-stop) 서비스를 받으실 수 있습니다.</p>
              <p>앞으로 저희 한국선박거래소를 많이 아껴 주시고, 저희는 여러분들이 하시는 일이 성공할 수 있도록 성공파트너가 되어 드리겠습니다.</p>
              <p>감사합니다.</p>

            </div>
          </div>
       </div>

    </div>

 <?php get_footer(); ?>
