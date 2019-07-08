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

        <?php if (is_category('event')) {
            get_template_part('template-parts/archive/content-event');
          } else {
            get_template_part('template-parts/archive/content-default');
          }
        ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>