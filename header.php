<!DOCTYPE html>
<html <?php language_attributes(); ?> class="my-theme">
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="container">

            <header class="site-header">

                <div class="site-title">
                  <?php
                      if( get_theme_mod('logo_settings', '') !== '' ){
                      $logo_id = get_theme_mod('logo_settings');
                  ?>
                      <a href="<?php echo home_url(); ?>">
                        <img class="sticky-logo" src="<?php echo site_url('/') ?>wp-content/themes/ship/img/logo-light-transparent.png" alt="한국선박거래소">
                        <?php echo wp_get_attachment_image( $logo_id, array( '270', '45' ) ); ?>

                        <h2>한국선박거래소</h2>
                      </a>

                  <?php  } else { ?>
                      <img src="<?php echo site_url('/') . 'wp-content/themes/ship/img/home.svg'; ?>" alt="한국선박거래소">
                      <a href="<?php echo home_url(); ?>">

                        <h2>한국선박거래소</h2>
                      </a>

                <?php  } ?>

                </div>

                <nav class="navbar navbar-default">

                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#primary-menu" aria-expanded="false">
                      <span class="sr-only">전체 메뉴보기</span>
                      <div class="hamburger-menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </div>
                    </button>
                  </div>

                        <?php
                          $args = array(
                            'theme_location' => 'primary',
                            'depth' => 3,
                            'container' => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'primary-menu',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker(),
                          );
                         ?>

                        <?php wp_nav_menu( $args ); ?>

              <div class="mobile-close">&times;</div>

              </nav>

              <button id="back-top" title="맨 위로"><i class="icon-upload"></i>맨 위로</button>

              <div id="buyandsell-wrapper">
                <a class="ship-sell"href="<?php echo site_url('/'); ?>ship">팝니다</a><a class="ship-buy" href="<?php echo site_url('/'); ?>ship_buying">삽니다</a>
              </div>

          </header>
          <?php if( !is_front_page() ) : ?>
            <div class="banner">
              <?php
                  if( get_theme_mod("page_banner_settings", '') !== '' ){
                    $page_banner_id = get_theme_mod("page_banner_settings");
                    echo wp_get_attachment_image( $page_banner_id, 'full' );
                  }
              ?>
            </div>
          <?php endif; ?>
