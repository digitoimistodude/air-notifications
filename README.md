# Air notifications

You need Advanced Custom Fields PRO plugin installed to use this plugin.

Creates a custom post type for notifications and adds following ACF fields for it:
* Start time
* End time
* Content of the notification
* Allow closing ( used to check if closing button needs to be added )
* Location ( to have different locations for the notifications on the same page )
* Show on page ( specifying certain pages to show the notification on. Notification will be shown on all pages if nothing is selected )

## Registering a notification locations

By default Air notifications has one default notification locations set. You might want to change its name, since most likely wont match your use case( using Finnish and location at top of the page ). You can also add more locations if you need them. 

Adding/modifying notification locations is done using filter `air_notifications_content`.
```php
  add_filter( 'air_notifications_locations', function( $locations ) {
    $locations['your-location'] = 'Your location';

    return $locations;
  } );
```

## Adding notifications to templates

In order to show notifications on your page, you need to call them in your template. This is done by adding the following action to your template. The action takes notification location as a parameter.

```php
  do_action( 'air_notifications_show_notifications', 'your-location' );
```

## Disabling default notification css

If you want to use the default notification template, but dont want to load its css, you can disable it.

```php
  add_filter( 'air_notifications_disable_css', '__return_true' );
```

### Custom notification templates

Default notification template can be replaced by your own custom one. You will need to name it like `notification-template-your-location.php`. So if you are replacing the default location you will need to create file `notification-template-default.php`. These templates need to be saved in the bese of your theme.

In these templates you have access to the notification data by `$notification` variable.

If you want to add the ability to dismiss the notification you will need to make sure you do 3 things.
* Make sure your main wrapper by default has `display: none`, this to prevent the notification from appearing and then disappearing if it had already been closed before.
* Add class `air-notification` to your main wrapper
* Add data attribute `data-notification-id` to your main wrapper and your button. Value for this should be unique since it will be saved in the users localstorage, when closing a notification. `$notification['guid']` is created just for this use.

Also note that the notifications have and option `is_dismissable`, this can be used to check if your notification needs the button at all.
