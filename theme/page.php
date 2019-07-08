<?php get_header(); ?>
<main id="content">
  <div class="mv2">
    <?php if (has_post_thumbnail()): ?>
    <p class="img"><?php the_post_thumbnail(); ?></p>
    <?php else: ?>
    <p class="img -default"><img src="<?php echo home_url(); ?>/assets/images/mv_page1.jpg" alt=""></p>
    <?php endif; ?>
    <div class="textBox">
      <ul class="breadcrumb">
        <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
        <li><?php show_limit_text(get_the_title(), 29); ?></li>
      </ul>
      <h2 class="title"><?php the_title(); ?></h2>
    </div>
  </div>
  <div class="inner">
    <div class="colWrap">
      <?php if ( have_posts() ): the_post(); ?>
      <div class="main">
        <article class="postMain">
          <div class="postContent">
            <?php the_content(); ?>
          </div>
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