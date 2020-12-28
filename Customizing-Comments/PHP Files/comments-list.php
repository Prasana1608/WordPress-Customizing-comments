<li>
  <?php
  $args = [
    'callback' => 'wptags_comment'
  ];
  wp_list_comments( $args );
  ?>
</li>