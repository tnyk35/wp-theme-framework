<article class="postMain">
  <header class="postHead">
    <div class="postInfo">
      <p class="postDate">
        <time datetime="<?php the_time('c'); ?>"><?php the_time(get_option('date_format')); ?></time>
      </p>
      <?php
      // カテゴリ
      $terms = get_the_terms( get_the_ID(), 'category' );
      if (!(is_wp_error($terms) || empty($terms))) {
        set_query_var('terms', $terms);
        get_template_part('template-parts/parts-postCat');
      }
      ?>
    </div>
    <h2 class="postTitle"><?php the_title(); ?></h2>
  </header>
  <div class="postContent">
    <?php if (has_post_thumbnail()): ?>
    <figure class="postThumb"><?php the_post_thumbnail(); ?></figure>
    <?php endif; ?>
    
    <?php the_content(); ?>
  </div>
  <footer class="postFooter">
    <?php
    $tags = get_the_tags();
    if ($tags):
    ?>
    <ul class="postTag">
      <?php foreach ($tags as $tag): ?>
      <li><a href="<?php echo home_url() . '/tag/' . $tag->slug; ?>"><?php echo $tag->name; ?></a></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <ul class="postPaging1">
    <?php if ($nextPost = get_next_post(true)): ?>
      <li class="next"><a href="<?php echo get_permalink($nextPost->ID); ?>"><span>次の記事</span><?php echo get_the_title($nextPost->ID); ?></a></li>
    <?php endif; ?>
    <?php if ($prevPost = get_previous_post(true)): ?>
      <li class="prev"><a href="<?php echo get_permalink($prevPost->ID); ?>"><span>前の記事</span><?php echo get_the_title($prevPost->ID); ?></a></li>
    <?php endif; ?>
    </ul>
  </footer>
</article>
<div class="postAside">
  <?php related_posts(); ?>
</div>