<?php
  /*
  Template Name: Location Page
  */
  get_header();
?>

    <div class="banner">
      <img src="<?php echo site_url('/') ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
      <div class="title-box">
        <h2><?php echo esc_html_e('오시는 길'); ?></h2>
      </div>
    </div>

     <div class="content-box">

       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>
       <div class="map-wrapper">
         
         <div id="head-office">
           <div class="map-text">
             <h3>인천 선박거래소</h3>
             <p>주소: </p>
             <p>연락처: </p>
             <p>교통편: </p>
           </div>
           <div class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25303.929961668786!2d127.0078127!3d37.555270050000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sko!2skr!4v1509689477720"
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
           <div id="branch-office" class="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d25303.929961668786!2d127.0078127!3d37.555270050000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sko!2skr!4v1509689477720"
                     width="500" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
         </div>

     </div>

      <article class="post location clearfix">

        <?php
          if( have_posts() ) :
            while( have_posts() ) : the_post();
        ?>

         <?php
            endwhile;

          else:
            echo '아직 매물이 없습니다.';

          endif;
         ?>

      </article>

    </div>

 <?php get_footer(); ?>
