      <footer id="footer">
        <nav class="fnav">
          <?php
          if (is_active_sidebar('widget_footer_menu')):
            dynamic_sidebar('widget_footer_menu');
          endif;
          ?>
        </nav>
        <div id="footerBottom">
          <!-- ウィジェットエリア-->
          <div class="widgetArea">
            <?php if (is_active_sidebar('widget_footer_area1')): ?>
            <?php dynamic_sidebar('widget_footer_area1'); ?>
            <?php endif; ?>
          </div>
          <p class="copyright"><small>Copyright &copy; 2019 tnyk.jp All Rights Reserved.</small></p>
        </div>
      </footer>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>