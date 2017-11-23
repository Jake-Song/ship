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
      <p>(주)인천선박거래소 | 대표자: 진광민 | 사업자 등록 번호: 000 - 00 - 00000</p>
      <p>본사: 인천광역시 중구 연안부두로 9-1, 202호 | T. (032) 881 - 6527 | F. (032) 891 - 6527</p>
      <p>HP. 010 - 4076 - 6527 | Email. yunus82@naver.com</p>
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
