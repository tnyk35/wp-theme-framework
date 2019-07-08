<?php get_header(); ?>
<main id="content">
  <div class="inner">
    <div class="colWrap">
      <div class="main">
        <ul class="breadcrumb">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><?php the_archive_title(); ?></li>
        </ul>
        <h2 class="archiveTitle"><?php the_archive_title(); ?><?php echo $paged > 1 ? ' (ページ' . $paged . ')' : ''; ?></h2>
        <div class="archiveMain">
        <?php if ( have_posts() ): ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <article class="archivePost">
            <?php if (has_post_thumbnail()): ?>
            <figure class="archiveThumb"><?php the_post_thumbnail(); ?></figure>
            <?php endif; ?>
            <div class="archiveInfo">
              <div class="postInfo">
                <p class="postDate">
                  <time datetime="<?php the_time('c'); ?>"><?php the_time(get_option('date_format')); ?></time>
                </p>
                <?php
                $terms = get_the_terms( get_the_ID(), 'xxxx_cat' );
                if (!(is_wp_error($terms) || empty($terms))) {
                  set_query_var('terms', $terms);
                  get_template_part('template-parts/parts-postCat');
                }
                ?>
              </div>
              <h3 class="archivePostTitle"><?php show_limit_text(get_the_title(), 23); ?></h3>
              <p class="archiveExcerpt"><?php show_limit_text(get_the_excerpt(), 49); ?></p>
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
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>