<div class="select-box">

  <?php

    $taxonomy_names = get_object_taxonomies( 'ship', 'objects' );

    $current_index = 0;

    foreach ($taxonomy_names as $key=>$taxonomy_name) :

      if($taxonomy_name->name === 'ship_category') continue;

        $taxonomy_terms[$key] = get_terms(
          array(
            'taxonomy' => $taxonomy_name->name,
            'hide_empty' => 0,
            'orderby' => 'ID',
          ));

   ?>
   
  <div class="select-wrapper">

  <select class="<?php echo esc_attr($taxonomy_name->name); ?>">

    <option selected="selected"><?php echo esc_html_e($taxonomy_name->label) . ($current_index === 0) ? '를' : '을'; ?> 선택해주세요.</option>

    <?php foreach($taxonomy_terms[$key] as $taxonomy_term[$key]) : ?>

        <option value="<?php echo esc_attr($taxonomy_term[$key]->slug); ?>"><?php echo esc_html($taxonomy_term[$key]->name); ?></option>

    <?php endforeach; ?>

  </select>

  </div>

  <?php $current_index++; ?>

<?php endforeach; ?>

</div>
