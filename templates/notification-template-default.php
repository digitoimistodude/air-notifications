<div class="air-notification" data-notification-id="notification-<?php echo esc_html( $notification['guid'] ) ?>">
  <div class="container">
    <?php include plugin_dir_path( __FILE__ ) . '../assets/info-icon.svg'; ?>
    <div>
      <?php echo wp_kses_post( wpautop( $notification['content'] ) ) ?>
    </div>

    <?php if ( $notification['is_dismissable'] ) : ?>
      <button type="button" class="notification-close air-notification-close" data-notification-id="notification-<?php echo esc_html( $notification['guid'] ) ?>">
        <span class="screen-reader-text">
          <?php echo esc_html( 'Sulje' ) ?>
        </span>
        <span aria-hidden="true">
          <?php echo esc_html( 'Sulje' );
          include plugin_dir_path( __FILE__ ) . '../assets/notification-close.svg'; ?>
        </span>
      </button>
    <?php endif; ?>
  </div>
</div>
