<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta type="description" content="<?php bloginfo('description'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?php echo home_url(); ?>/assets/css/style.css">
    <script src="<?php echo home_url(); ?>/assets/js/jquery-3.4.1.js"></script>
    <script src="<?php echo home_url(); ?>/assets/js/common.js"></script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="wrap">
      <header id="header">
        <div class="headerInner">
          <h1 class="siteTitle"><a href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/assets/images/logo.png" alt=""></a></h1>
          <!-- ウィジェットエリア-->
          <nav class="gnav">
          <?php
          if (is_active_sidebar('widget_gmenu')) {
            dynamic_sidebar('widget_gmenu');
          }
          ?>
          </nav>
        </div>
      </header>
      <div class="spNav">
        <ul class="spNavList">
          <li class="spNavHome"><a href="<?php echo home_url(); ?>">トップページ</a></li>
          <li class="spNavTop"><a href="#header">上に行く</a></li>
          <li class="spNavEvent"><a href="<?php echo home_url(); ?>/category/event">イベント</a></li>
          <li class="spNavMenu js-openSpMenu"><a href="javascript:void(0);"><span class="bar"><span></span><span></span><span></span></span><span class="text">メニュー</span></a></li>
        </ul>
      </div>