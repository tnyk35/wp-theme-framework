<?php get_header(); ?>
<main id="content">
  <div class="inner">
    <div class="colWrap">
    <?php if ( have_posts() ): the_post(); ?>
      <div class="main">
        <ul class="breadcrumb">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><?php show_limit_text(get_the_title(), 29); ?></li>
        </ul>
        <article class="postMain">
          <header class="postHead">
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
            <h2 class="postTitle"><?php the_title(); ?></h2>
          </header>
          <div class="postContent">
            <?php if (has_post_thumbnail()): ?>
            <figure class="postThumb"><?php the_post_thumbnail(); ?></figure>
            <?php endif; ?>
            
            <?php the_content(); ?>
          </div>
          <footer class="postFooter">
            <ul class="postPaging1">
            <?php if ($nextPost = get_next_post(true, '', 'xxxx_cat')): ?>
              <li class="next"><a href="<?php echo get_permalink($nextPost->ID); ?>"><span>次の記事</span><?php echo get_the_title($nextPost->ID); ?></a></li>
            <?php endif; ?>
            <?php if ($prevPost = get_previous_post(true, '', 'xxxx_cat')): ?>
              <li class="prev"><a href="<?php echo get_permalink($prevPost->ID); ?>"><span>前の記事</span><?php echo get_the_title($prevPost->ID); ?></a></li>
            <?php endif; ?>
            </ul>
          </footer>
        </article>
      </div>
      <?php else: ?>
      <p>記事がありません。</p>
      <?php endif; ?>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>