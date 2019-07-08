<?php
// 共通で利用できる値を定義
define('NEW_DATE', 7);
define('TODAY', date('Y/m/d'));

// タイトルタグの自動生成対応
add_theme_support( 'title-tag' );

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails');

/*
* Switch default core markup for search form, comment form, and comments
* to output valid HTML5.
*/
add_theme_support( 'html5', array(
  'caption',
) );

/*
* Enable support for Post Formats.
*
* See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array(
  'aside',
  'image',
  'video',
  'quote',
  'link',
  'gallery',
  'audio',
) );

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
  $title = single_cat_title('', false);
  } elseif (is_tag()) {
  $title = single_tag_title('', false);
  } elseif (is_tax()) {
    $title = single_term_title('', false);
  } elseif (is_post_type_archive() ) {
    $title = post_type_archive_title('', false);
  } elseif (is_date()) {
    $title = get_the_time('Y年n月');
  } elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
  } elseif (is_404()) {
    $title = 'ページが見つかりません';
  } else {

  }
  return $title;
});

/* -------------------------- */
/* カスタム投稿タイプ */
/* -------------------------- */
add_action('init', 'create_custom_post_type', 0);
function create_custom_post_type() {
  register_post_type( 'xxxx',
    array(
      'label' => 'ブログ',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 6,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => array(
        'title',  // 記事タイトル
        'editor',  // 記事本文
        'thumbnail',  // アイキャッチ画像
        'revisions'  // リビジョン
      )
    )
  );
  register_taxonomy(
    'xxxx_cat', // タクソノミーの名前
    'xxxx', // 使用するカスタム投稿タイプ名
    array(
      'hierarchical' => true, // trueだと親子関係が使用可能。falseで使用不可
      'label' => 'カテゴリー',
      'singular_label' => 'カテゴリー',
      'public' => true
    )
  );
}
/* -------------------------- */
/* ウィジェットエリア追加 */
/* -------------------------- */
add_action('widgets_init', 'create_custom_widget');
function create_custom_widget() {
  register_sidebar(array(
    'id' => 'widget_gmenu',
    'name' => 'ヘッダーメニュー',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_top_news1',
    'name' => 'トップお知らせ下 左エリア',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_top_footer1',
    'name' => 'トップフッター 左エリア',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_top_footer2',
    'name' => 'トップフッター 中央エリア',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_top_footer3',
    'name' => 'トップフッター 右エリア',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_footer_menu',
    'name' => 'フッターメニュー',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_footer_area1',
    'name' => 'フッター copyright上',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_side_bnr',
    'name' => 'サイドバー バナーエリア',
    'description' => '',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => '',
  ));

  register_sidebar(array(
    'id' => 'widget_side_main',
    'name' => 'サイドバー メイン',
    'description' => '',
    'before_widget' => '<div class="sideWidgetInner">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="sideTitle">',
    'after_title' => '</h3>',
  ));
}

// カテゴリウィジェット
function remove_post_count_parentheses( $output ) {
  $output = preg_replace('/<\/a>.*\((\d+)\)/','<span class="postCount">$1</span></a>',$output);
  return $output;
}
add_filter( 'wp_list_categories', 'remove_post_count_parentheses' );

// アーカイブウィジェット
function my_archives_link($html) {
  $html = preg_replace('@<li>@i', '<li class="archive-item">', $html);
  $html = preg_replace('/<\/a>.*\((\d+)\)/','<span class="postCount">$1</span></a>', $html);
  return $html;
}
add_filter('get_archives_link', 'my_archives_link');

/* -------------------------- */
/* Functions */
/* -------------------------- */
// タイトル文字数制限
function show_limit_text($text = '', $limit = 35) {
  if( mb_strlen( $text, 'UTF-8' ) > $limit) {
    $text = mb_substr( $text, 0, $limit, 'UTF-8' ) ;
    $limitText = $text . '…';
  } else {
    $limitText = $text;
  }

  echo $limitText;
}

// カスタム投稿タイプのタクソノミを指定して表示する
function get_post_top_point($terms) {
  return get_posts(array(
    'posts_per_page' => 1,
    'post_type' => 'xxxx',  // カスタム投稿タイプ名
    'tax_query' => array(
      array(
        'taxonomy' => 'xxxx_cat',
        'terms' => $terms,
        'field' => 'slug',
      )
    )
  ));
}

// トップページの注目ポイントの日付を取得
function get_date_top_point($terms) {
  $posts = get_post_top_point($terms);
  if ($posts) {
    return date('Y/m/d', strtotime($posts[0]->post_date));
  } else {
    return false;
  }
}

// NEWと表示される日付を取得
function get_new_date($postDate) {
  return date('Y/m/d', strtotime(NEW_DATE . ' day', strtotime($postDate)));
}

// NEWかどうか判定
function is_new($postDate) {
  if (!$postDate) return false;

  $newDate = get_new_date($postDate);
  if (strtotime($newDate) >= strtotime(TODAY)) {
    return true;
  } else {
    return false;
  }
}