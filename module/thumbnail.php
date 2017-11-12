<?php
  $ship_maker_name = ($ship_maker_terms) ? $ship_maker_terms[0]->name : '';
  $ship_model_name = ($ship_model_terms) ? $ship_model_terms[0]->name : '';
  $ship_location_name = ($ship_location_terms) ? $ship_location_terms[0]->name : '';

?>
<div class="col-sm-6 col-md-3">

  <div class='custom thumbnail'>

      <div class="thumbnail-image-section">
        <?php the_post_thumbnail( 'custom' ); ?>
        <div class="overlay">
          <h2><?php the_title(); ?></h2>
          <p><a href="<?php the_permalink(); ?>">상세 보기<i class="icon-right"></i></a></p>
        </div>
      </div>

      <div class="caption">
        <?php echo get_the_title() . ' / ' .  $ship_maker_name . ' / ' . $ship_model_name . ' / ' . $ship_location_name; ?>
      </div>

  </div>

</div>
