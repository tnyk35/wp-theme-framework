<?php
/**
 * Template Name: 1カラムテンプレート
 */
?>
<?php get_header(); ?>
<main id="content">
<?php if ( have_posts() ): the_post(); ?>
  <?php the_content(); ?>
<?php else: ?>
  <p>記事がありません。</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>