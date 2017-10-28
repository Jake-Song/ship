<?php
/*
Template Name: Test
*/
?>
<?php get_header(); ?>

<ul id="filter">
  <li class="current"><a href="#">All</a></li>
  <li><a href="#">Design</a></li>
  <li><a href="#">Development</a></li>
  <li><a href="#">CMS</a></li>
  <li><a href="#">Integration</a></li>
  <li><a href="#">Information Architecture</a></li>
</ul>

<ul id="portfolio">
  <li class="cms integration">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />A List Apart</a>
  </li>
  <li class="integration design">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Apple</a>
  </li>
  <li class="design development">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />CNN</a>
  </li>
  <li class="cms">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Digg</a>
  </li>
  <li class="design cms integration">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />ESPN</a>
  </li>
  <li class="design integration">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Facebook</a>
  </li>
  <li class="cms information-architecture">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Google</a>
  </li>
  <li class="integration development">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Netflix</a>
  </li>
  <li class="information-architecture">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />NETTUTS</a>
  </li>
  <li class="design information-architecture cms">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />Twitter</a>
  </li>
  <li class="development">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />White House</a>
  </li>
  <li class="cms design">
    <a href="#"><img src="<?php echo site_url('/'); ?>/wp-content/themes/ship/img/bram-naus-200967.jpg" alt="" height="115" width="200" />YouTube</a>
  </li>
</ul>

<?php get_footer(); ?>
