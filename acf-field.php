<?php

namespace Air_Notifications;

add_filter( 'air_helper_acf_groups_to_warn_about', function( $groups ) {
  foreach ( $groups as $k => $g ) {
    if ( 'group_62fa33923832f' !== $g['key'] ) {
      continue;
    }

    unset( $groups[ $k ] );
  }

  return $groups;
} );

function register_acf_field() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( [
            'key' => 'group_62fa33923832f',
            'title' => __( 'Notification', 'air-notifications' ),
            'fields' => [
                [
                    'key' => 'field_62fa33a88ce60',
                    'label' => __( 'Start', 'air-notifications' ),
                    'name' => 'start',
                    'type' => 'date_time_picker',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                    'display_format' => 'j.n.Y H:i',
                    'return_format' => 'd\/m\/Y g:i:a',
                    'first_day' => 1,
                    'translations' => 'copy_once',
                ],
                [
                    'key' => 'field_62fa34458ce61',
                    'label' => __( 'End', 'air-notifications' ),
                    'name' => 'stop',
                    'type' => 'date_time_picker',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '50',
                        'class' => '',
                        'id' => '',
                    ],
                    'display_format' => 'j.n.Y H:i',
                    'return_format' => 'd\/m\/Y g:i:a',
                    'first_day' => 1,
                    'translations' => 'copy_once',
                ],
                [
                    'key' => 'field_62fa344e8ce62',
                    'label' => __( 'Content', 'air-notifications' ),
                    'name' => 'content',
                    'type' => 'wysiwyg',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'default_value' => '',
                    'tabs' => 'all',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                    'translations' => 'translate',
                ],
                [
                    'key' => 'field_62fa3572e5f64',
                    'label' => __( 'Allow dismiss', 'air-notifications' ),
                    'name' => 'is_dismissable',
                    'type' => 'true_false',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '25',
                        'class' => '',
                        'id' => '',
                    ],
                    'message' => '',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                    'translations' => 'copy_once',
                ],
                [
                    'key' => 'field_4830gsh52564j',
                    'label' => __( 'Location', 'air-notifications' ),
                    'name' => 'location',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '75',
                        'class' => '',
                        'id' => '',
                    ],
                    'message' => '',
                    'choices' => get_locations(),
                    'default_value' => false,
                    'allow_null' => 0,
                    'ui' => 1,
                    'return_format' => 'value',
                    'translations' => 'copy_once',
                    'ajax' => 0,
                    'placeholder' => '',
                ],
                [
                    'key' => 'field_5c99fc9f802da',
                    'label' => __( 'Show on page', 'air-notifications' ),
                    'name' => 'show_on',
                    'type' => 'relationship',
                    'instructions' => __( 'If a page is selected, notifications is shown only on that page. If no pages are selected notification is shown on all pages.', 'air-notifications' ),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => [
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ],
                    'post_type' => [
                        0 => 'post',
                        1 => 'page',
                    ],
                    'taxonomy' => '',
                    'filters' => [
                        0 => 'search',
                        1 => 'post_type',
                    ],
                    'return_format' => 'id',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'air-notification',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ] );
    }
}
