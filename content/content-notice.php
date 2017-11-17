<h2><?php the_title(); ?></h2>

<p class="post-info">
  <span>번호 <?php echo $post->ID; ?></span>
  <span>글쓴이 <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php the_author(); ?></a></span>
  <span><?php the_time('Y년 n월 j일 a g:i'); ?></span>
  <span>조회수 <?php echo getPostViews( $post->ID ); ?></span>
</p>
<div class="post-content">
  <?php the_content(); ?>
</div>
<div class="go-list-button">
  <a href="<?php echo get_post_type_archive_link( get_post_type() ); ?>" class="btn-diagonal-swipe">목록 보기</a>
</div>
