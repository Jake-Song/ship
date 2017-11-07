<footer class="site-footer">
  <nav class="site-nav">
        <?php
            $args = array(
              'theme_location' => 'footer'
            );
        ?>
        <?php wp_nav_menu( $args ); ?>
  </nav>
  <div class="footer-content-box">
    <div class="company-info">
      (주)한국선박거래소 | 대표자: OOO | 본사: 인천시 OOO | 지사: 부산시 OOO | 연락처: (051) 000 - 0000
      | 사업자 등록 번호: 000 - 00 - 00000
    </div>
    <div class="social">
      <a href="<?php echo esc_url( get_theme_mod( 'cosmetic_footer_social_url_1' ) ); ?>" target="_blank">
        <i class="<?php echo esc_attr( get_theme_mod( 'cosmetic_footer_social_icon_1' ) ); ?>" aria-hidden="true"></i>
      </a>
      <a href="<?php echo esc_url( get_theme_mod( 'cosmetic_footer_social_url_2' ) ); ?>" target="_blank">
        <i class="<?php echo esc_attr( get_theme_mod( 'cosmetic_footer_social_icon_2' ) ); ?>" aria-hidden="true"></i>
      </a>
      <a href="<?php echo esc_url( get_theme_mod( 'cosmetic_footer_social_url_3' ) ); ?>" target="_blank">
        <i class="<?php echo esc_attr( get_theme_mod( 'cosmetic_footer_social_icon_3' ) ); ?>" aria-hidden="true"></i>
      </a>
    </div>
    <div class="copyright">
      copyright&copy;<?php echo date('Y'); ?> <?php bloginfo('name') ?>
    </div>
  </div>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
