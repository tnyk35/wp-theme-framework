<?php
$posts = get_posts( get_query_var('options') );
if ($posts):
?>
<ul class="linkList">
  <?php foreach($posts as $post): ?>
  <?php
  $postDate = get_the_time('Y/m/d');
  $category = get_the_category();
  $cat_slug = $category[0]->category_nicename;
  $cat_name = $category[0]->cat_name;
  ?>
  <li><a href="<?php the_permalink(); ?>"><?php if (is_new($postDate)): ?><span class="new">NEW</span><?php endif; ?><?php if ($cat_name): ?><span class="cat -<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></span><?php endif; ?><span class="text"><?php echo $postDate; ?>｜<?php echo show_limit_text(get_the_title(), 29); ?></span></a></li>
  <?php endforeach; ?>
</ul>
<?php
endif;
wp_reset_postdata();
?>