<div class="ship-category-menu">

  <?php
    $test = 0;
    $terms = get_terms(
      array(
        'taxonomy' => 'ship_category',
        'hide_empty' => 0,
        'orderby' => 'ID',
      ));
  ?>
  <ul>

    <li>
      <a href="<?php
                  if( is_front_page() ){
                    echo esc_url( home_url() );
                  } elseif( (is_archive() || is_tax()) && $post->post_type === 'ship' ){
                    echo site_url() . '/ship';
                  } elseif( (is_archive() || is_tax()) && $post->post_type === 'ship_selling' )
                    echo site_url() . '/ship_selling';
                ?>">
        <div class="ship-category-item all-item">
          <i class="icon-th"></i>
          <div class="ship-category-name">
            전체보기
          </div>
        </div>
      </a>
    </li>

    <?php foreach ($terms as $key => $term) : ?>
      <?php if( !( $term->parent ) ) : ?>

        <li>
          <?php
            if( is_front_page() ){
          ?>
              <a href="<?php echo esc_url( home_url( '/' ) . $term->taxonomy . '/' . $term->slug ); ?>">
          <?php
            } elseif( is_archive() || is_tax() && ( $post->post_type === 'ship' || $post->post_type === 'ship_selling' ) ){
          ?>
            <a href="<?php echo esc_url( home_url( '/' ) . $post->post_type . '/' . 'category/' . $term->slug ); ?>">

     <?php  } ?>

            <div class="ship-category-item">
                <i class="icon-<?php echo esc_attr( $term->slug ); ?>"></i>
                <div class="ship-category-name">
                  <?php echo $term->name; ?>
                </div>
            </div>
          </a>
        </li>

      <?php endif; ?>
    <?php endforeach; ?>
  </ul>

</div>
