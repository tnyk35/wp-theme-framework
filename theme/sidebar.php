<aside class="side">
  <?php if (is_active_sidebar('widget_side_bnr')): ?>
  <div class="sideWidget">
    <?php dynamic_sidebar('widget_side_bnr'); ?>
  </div>
  <?php endif; ?>

  <?php if (is_active_sidebar('widget_side_main')): ?>
    <?php dynamic_sidebar('widget_side_main'); ?>
  <?php endif; ?>
</aside>