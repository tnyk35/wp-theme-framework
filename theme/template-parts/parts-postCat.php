<ul class="postCat">
  <?php
  $links = array();
  foreach (get_query_var('terms') as $term ) {
    $link = get_term_link( $term );
    if ( !is_wp_error( $link ) ) {
      echo '<li><a href="' . esc_url( $link ) . '" rel="category tag">' . $term->name . '</a></li>';
    }
  }
  ?>
</ul>