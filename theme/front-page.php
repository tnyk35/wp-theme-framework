<?php get_header(); ?>
      <main id="content">
        <div id="news">
          <?php
          set_query_var('options', array(
            'posts_per_page' => 6,
          ));
          get_template_part('template-parts/parts-newsList');
          ?>
          <?php
          $posts = get_posts(array(
            'posts_per_page' => 5,
            'post_type' => 'xxxx',  // カスタム投稿タイプ名
            'tax_query' => array(
              array(
                'taxonomy' => 'xxxx_cat',
                'terms' => 'breeding-diary', // カテゴリ（ターム）のスラッグ
                'field' => 'slug',
              )
            )
          ));
          if ($posts):
          ?>
          <ul class="eventList">
            <?php foreach($posts as $idx => $post): ?>
            <li><a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()): ?>
              <p class="eventThumb"><?php the_post_thumbnail(); ?></p>
              <?php endif; ?>
              <p class="eventText"><span class="sub"><?php the_field('sub'); ?></span><?php echo show_limit_text(get_the_title(), 35); ?></p></a></li>
            <?php endforeach; ?>
          </ul>
          <?php
          endif;
          wp_reset_postdata();
          ?>
          </div>

          <!-- ウィジェットエリア-->
          <?php if (is_active_sidebar('widget_top_news1')): ?>
          <div class="bnrAreaBody">
          <?php dynamic_sidebar('widget_top_news1'); ?>
          </div>
          <?php endif; ?>
          <!-- /ウィジェットエリア-->
        </div>
      </main>
<?php get_footer(); ?>