<div class="ship-category-menu">

  <?php
    $terms = get_terms(
      array(
        'taxonomy' => 'ship_category',
        'hide_empty' => 0,
        'orderby' => 'ID',
      ));
  ?>
  <ul>
    <?php foreach ($terms as $key => $term) : ?>
      <?php if( !( $term->parent ) ) : ?>

        <li>
          <a href="<?php echo esc_url( home_url( '/' ) . $term->taxonomy . '/' . $term->slug); ?>">
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
