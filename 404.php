<?php
/*
 * The template for displaying 404 pages (Not Found)
 *
 */
get_header(); ?>

  <div class="content-box">

    <div class="navigation">
      <?php qt_custom_breadcrumbs(); ?>
    </div>

      <article class="post page 404">
         <p><i class="icon-exclamation"></i>페이지를 찾을 수 없습니다. 주소를 잘 못 입력하신 것 같습니다.</p>
         <p>홈페이지<a href="<?php echo site_url(); ?>">(koreaships.com)</a>로 돌아가 주세요!</p>
      </article>
   </div>

<?php get_footer(); ?>
