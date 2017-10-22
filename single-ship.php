<?php get_header(); ?>

  <div class="banner">
    <img src="../../wp-content/themes/ship/img/bram-naus-200967.jpg" alt="">
  </div>

  <div class="content-box">

    <div class="title-box">
      <h2><?php echo ucfirst($pagename); ?></h2>
    </div>

    <?php
      if(have_posts()) :
          while(have_posts()) : the_post(); ?>
          <?php

          $ship_information = array(
            'seller' => '판매자',
            'ship_category' => '선박유형',
            'tons' => '톤수',
            'made_date' => '진수년월일',
            'measure' => '주요치수',
            'certificate' => '허가사항',
            'sale_location' => '판매정박지',
            'forward_parts' => '추진기관',
            'made_location' => '조선지',
            'commit_name' => '담당자이름',
            'commit_contact' => '연락처',
          );

          $ship_option_basic = array(
            'gps' => 'GPS',
            'detecter' => '어군탐지기',
            'rader' => '레이더',
            'ssb' => 'SSB무전기',
            'generator' => '발전기',
            'kitchen' => '주방',
            'toilet' => '화장실'
          );

          foreach ($ship_information as $key => $value) {
              $$key = get_post_meta( get_the_ID(), $key, true );
              echo $$key;
          }

          $content = '';

          foreach ($ship_option_basic as $key => $value) {
              $test = 0;
              $$key = get_post_meta( get_the_ID(), $key, true );
              $key_attr = !empty($$key) ? ' checked' : "";
              $content .= $value . "<input type='checkbox' value='{$value}' {$key_attr} onclick='return false;' />";

          }

          echo $content;

          ?>
              <article class="post tips clearfix">

                  <div class="post-image">

                      <?php if( has_post_thumbnail() ) : ?>
                          <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'custom' ); ?>
                          </a>
                      <?php endif; ?>

                  </div>
                  <div class="post-content">

                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <?php the_excerpt(); ?>
                  </div>
                  <div class="post-meta-box">
                    <p class="post-info">By
                      <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?></a> | <?php the_time('F jS, Y'); ?> | 카테고리

                      <?php
                          $categories = get_the_category();
                          $separator = ", ";
                          $output = '';

                          if( $categories ) :
                              foreach( $categories as $category ) :
                                  $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $separator;
                              endforeach;
                              echo trim( $output, $separator );
                          endif;
                       ?>
                    </p>
                    <a href="<?php echo esc_url( the_permalink() ); ?>">
                      <span class="read-more">Read More &gt;</span>
                    </a>
                  </div>

              </article>
    <?php endwhile;
      else :
          echo 'There is no post here.';
      endif;
   ?>

   </div>

<?php get_footer(); ?>
