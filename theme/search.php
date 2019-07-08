<?php get_header(); ?>
<main id="content">
  <div class="inner">
    <div class="colWrap">
      <div class="main">
        <ul class="breadcrumb">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li>検索結果：<?php echo get_search_query(); ?></li>
        </ul>
        <h2 class="archiveTitle">検索結果：<?php echo get_search_query(); ?><?php echo $paged > 1 ? ' (ページ' . $paged . ')' : ''; ?></h2>
        <?php get_template_part('template-parts/archive/content-default'); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>