<article class="postMain">
  <header class="postHead">
    <h2 class="postTitle"><?php the_title(); ?></h2>
  </header>
  <div class="postContent">
    <?php if (has_post_thumbnail()): ?>
    <figure class="postThumb"><?php the_post_thumbnail(); ?></figure>
    <?php endif; ?>
    
    <?php the_content(); ?>
  </div>
</article>