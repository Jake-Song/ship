<?php
  /*
  Template Name: Location Page
  */
  get_header();
?>

    <div class="banner">
      <img src="<?php echo site_url('/') ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
    </div>

     <div class="content-box">
       <div class="title-box">
         <h2><?php echo esc_html_e('오시는 길'); ?></h2>
       </div>
       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>
       <div class="map-wrapper">

         <div id="head-office">
           <div class="map-text">
             <h3>인천 선박거래소</h3>
             <p><strong>주소:</strong> 인천광역시 중구 연안부두로 9-1, 202호</p>
             <p><strong>연락처:</strong> T. 032.881.6527 / F. 032.891.6527</p>
             <p><strong>이메일:</strong> yunus82@naver.com</p>
           </div>
           <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3167.1829131863983!2d126.60243491460712!3d37.45640297981866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357b829c0345e547%3A0x64d03f66ffec31ad!2z7J247LKc6rSR7Jet7IucIOykkeq1rCDsl7DslYjrtoDrkZDroZwgOS0x!5e0!3m2!1sko!2skr!4v1510905169919"
                     width="500" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

           </div>
         </div>
         <div id="branch-office">
           <div class="map-text">
             <h3>부산 선박거래소</h3>
             <p>주소: </p>
             <p>연락처: </p>
             <p>교통편: </p>
           </div>
           <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3263.6594449880918!2d129.04007021452063!3d35.115213780330194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3568ebd863d51aab%3A0x298bea7fa62a04e!2z67aA7IKw7Jet!5e0!3m2!1sko!2skr!4v1510905747434"
                     width="500" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
         </div>

     </div>

    </div>

 <?php get_footer(); ?>
