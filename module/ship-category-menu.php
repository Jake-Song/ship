<div class="ship-category-navigator">

  <?php
    $terms = get_terms(
      array(
        'taxonomy' => 'ship_category',
        'hide_empty' => 0,
        'orderby' => 'ID',
      ));
  ?>

  <div class="category-content-box">

    <h3>매물 현황</h3>
    <p>각 카테고리 별 선박을 보시거나 상세 검색을 하시려면 해당 아이콘을 선택해 주세요.</p>

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

</div>
