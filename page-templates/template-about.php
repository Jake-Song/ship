<?php
  /*
  Template Name: About Page
  */
  get_header();
?>

    <div class="banner">
      <img src="<?php echo site_url('/') ?>wp-content/themes/ship/img/page-banner.jpg" alt="">
      <div class="title-box">
        <h2><?php echo esc_html_e('회사소개'); ?></h2>
      </div>
    </div>

     <div class="content-box">

       <div class="navigation">
         <?php qt_custom_breadcrumbs(); ?>
       </div>

       <div id="about-us">

          <div id="about-us-content-wrapper">
            <div id="about-us-content">
              <h3>인사말</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro repellendus unde voluptates distinctio quos. Nostrum perferendis tempore nam delectus officiis officia labore, saepe repellendus reprehenderit magnam, reiciendis nobis sequi consectetur.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro repellendus unde voluptates distinctio quos. Nostrum perferendis tempore nam delectus officiis officia labore, saepe repellendus reprehenderit magnam, reiciendis nobis sequi consectetur.</p>
            </div>
          </div>
       </div>

    </div>

 <?php get_footer(); ?>
