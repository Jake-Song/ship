<?php
  /*
  Template Name: Front Page
  */
  get_header();
?>

     <div class="slider">

        <div class="slide">
          <img src="./wp-content/themes/ship/img/bram-naus-200967.jpg" alt="">
          <div class="slide-text">
            <h3>Slide One</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, fuga itaque commodi. Quidem facere totam perspiciatis voluptatibus harum obcaecati blanditiis itaque in quos libero architecto, ratione tempore necessitatibus alias quam.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/christopher-gower-291246.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Two</h3>
            <p>Illo fugiat earum dicta aliquam eius, iure deserunt neque perspiciatis veniam temporibus unde qui ut voluptates provident dolores nulla, maxime, eveniet quis enim consequatur incidunt cumque cupiditate odio! Cum, praesentium.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/emile-perron-190221.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Three</h3>
            <p>Magnam architecto quisquam recusandae, molestiae rerum, adipisci. Excepturi quo repellendus numquam, nesciunt harum ipsum eaque assumenda dolore, placeat est provident quasi itaque architecto ducimus fugit eveniet eum voluptate rem dolorum.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/ian-schneider-59335.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Four</h3>
            <p>Quis voluptatem voluptas alias numquam, soluta ratione dolorem quibusdam culpa voluptates dicta animi enim accusamus libero doloribus laudantium ipsum est nihil ad minus? Est veniam ipsa, optio quaerat aliquam earum.</p>
          </div>
        </div>
        <div class="slide">
          <img src="./wp-content/themes/ship/img/mark-cruz-230099.jpg" alt="">
          <div class="slide-text">
            <h3>Slide Five</h3>
            <p>Mollitia explicabo obcaecati, voluptate quod, quae debitis delectus! Hic tempore assumenda autem laboriosam aperiam, error deserunt voluptates quos veritatis totam. Excepturi nemo voluptas fugiat incidunt placeat similique aut recusandae asperiores!</p>
          </div>
        </div>

      </div>

    <div class="notice-wrapper">
      <?php
        $args = array(
          'post_type' => 'notice',
          'post_status' => 'publish',
          'order' => 'ASC'
        );
        $query = new WP_Query( $args );
       ?>
       <div class="notice-slider">
         <?php
           if( $query->have_posts() ) :
             while( $query->have_posts() ) : $query->the_post();
         ?>
               <div class="notice-slide">
                 <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
               </div>
          <?php
             endwhile;

             wp_reset_postdata();

           else :
          ?>

             <p><?php esc_html_e( '공지사항이 없습니다.' ); ?></p>

          <?php
           endif;
          ?>

       </div>
    </div>

    <div class="content-box">

      <?php include( locate_template( '/module/ship-category-menu.php', false, false ) ); ?>

      <div class="ship-category">

        <?php

          $args = array(
            'post_type' => 'ship',
            'post_status' => 'publish',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ship_category',
                  'field' => 'slug',
                  'terms' => 'fishing-ship',
                ),
            ),

          );
          $query = new WP_Query( $args );
        ?>

        <?php include( locate_template( '/module/select-box.php', false, false ) ); ?>

        <div class="ajax-container">

            <div class="wrapper-for-ajax">

              <?php
                if( $query->have_posts() ) :
                  while( $query->have_posts() ) : $query->the_post();

                  $ship_maker_terms = get_the_terms( $post->ID, 'ship_maker' );
                  $ship_model_terms = get_the_terms( $post->ID, 'ship_model' );
                  $ship_location_terms = get_the_terms( $post->ID, 'ship_location' );

                ?>
                <div class="col-sm-6 col-md-3">

                  <div class='recent thumbnail'
                    data-maker="<?php echo esc_attr( ($ship_maker_terms) ? $ship_maker_terms[0]->name : ''); ?>"
                    data-model="<?php echo esc_attr( ($ship_model_terms) ? $ship_model_terms[0]->name : ''); ?>"
                    data-location="<?php echo esc_attr( ($ship_location_terms) ? $ship_location_terms[0]->name : ''); ?>">

                    <?php the_post_thumbnail( 'custom' ); ?>
                    <div class="caption">
                      <h3><?php the_title(); ?></h3>
                      <p><a href="<?php the_permalink(); ?>" class="btn btn-transparent" role="button">Button</a></p>
                    </div>
                  </div>

                </div>
              <?php
                  endwhile;

                  wp_reset_postdata();

                endif;
              ?>
            </div>

        </div>

      </div>

      <div class="recent-ship">
        <h3>최근 등록 매물</h3>

        <?php
          $args = array(
            'post_type' => 'ship',
            'posts_per_page' => 6,
          );
          $query = new WP_Query( $args );
         ?>

        <div class="recent-ship row">
          <?php
            if( $query->have_posts() ) :
              while( $query->have_posts() ) : $query->the_post();
          ?>
                <div class="col-sm-6 col-md-4">
                  <div class="recent thumbnail">
                    <?php the_post_thumbnail( 'custom' ); ?>
                    <div class="caption">
                      <h3><?php the_title(); ?></h3>
                      <p><a href="<?php the_permalink(); ?>" class="btn btn-transparent" role="button">Button</a></p>
                    </div>
                  </div>
                </div>
           <?php
              endwhile;

              wp_reset_postdata();

            else :
           ?>

              <p><?php esc_html_e( '매물이 없습니다.' ); ?></p>

           <?php
            endif;
           ?>

        </div>

    </div>

    <div class="info-box">
      <div class="main-box">
        <div class="main-box-text">
          <h4>구입 및 대여 서비스</h4>
          <h2>선박 장비를 대여 받거나 구입하실 분 문의 부탁드립니다.</h2>
          <h2>1588-1588</h2>
        </div>
      </div>
      <div class="sub-box-wrapper">
        <div class="sub-box">sub</div>
        <div class="sub-box">sub</div>
        <div class="sub-box">sub</div>
        <div class="sub-box">sub</div>
      </div>

    </div>

  </div>

<?php get_footer(); ?>
