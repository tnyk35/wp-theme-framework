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
        
        <?php get_template_part('template-parts/single/content-default'); ?>
      </div>
      <?php else: ?>
      <p>記事がありません。</p>
      <?php endif; ?>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>