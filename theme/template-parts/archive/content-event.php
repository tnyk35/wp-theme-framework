<div class="archiveMain">
<?php if ( have_posts() ): ?>
  <?php while ( have_posts() ) : the_post(); ?>
  <article class="archivePost">
    <?php if (has_post_thumbnail()): ?>
    <figure class="archiveThumb"><?php the_post_thumbnail(); ?></figure>
    <?php endif; ?>
    <div class="archiveInfo">
      <h3 class="archivePostTitle"><?php show_limit_text(get_the_title(), 23); ?></h3>
    </div><a class="archiveLink" href="<?php the_permalink(); ?>"></a>
  </article>
  <?php endwhile; ?>
  <div class="paging">
    <?php //the_posts_pagination(); ?>
    <?php wp_pagenavi(); ?>
  </div>
<?php else: ?>
<p>記事がありません。</p>
<?php endif; ?>
</div>
