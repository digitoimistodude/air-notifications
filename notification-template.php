<div class="notification" style="background-color:gray; display:block;">
  <?php include plugin_dir_path( __FILE__ ) . '/info-icon.svg'; ?>
  <p>
    <?php echo esc_html( $notification['content'] ) ?>
  </p>

  <?php if ( $notification['is_dismissable'] ) : ?>
    <button type="button" class="notification-close air-notification-close" data-notification-id="notification-' . $guid . '">
      <span class="screen-reader-text">
        <?php echo esc_html( 'Sulje' ) ?>
      </span>
      <span aria-hidden="true">
        <?php echo esc_html( 'Sulje' );
        include plugin_dir_path( __FILE__ ) . '/notification-close.svg'; ?>
      </span>
    </button>
  <?php endif; ?>
</div>