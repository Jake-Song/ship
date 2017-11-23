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
          <p><a href="<?php the_permalink(); ?>">상세 보기</a></p>
        </div>
      </div>

      <div class="caption">
        <?php echo get_the_title(); ?>
      </div>

  </div>

</div>
