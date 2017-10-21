<?php

function w2pg_options_admin_menu()
{
    add_options_page(__('WP Post Gallies'), __('WP Post Gallies'),
        'manage_options', 'wp-post-galleies', 'w2pg_options');
}
add_action('admin_menu', 'w2pg_options_admin_menu');

function w2pg_options()
{
    $in = array(
        'attachment',
        'revision',
        'nav_menu_item',
        'custom_css',
        'customize_changeset',
        'oembed_cache',
    );

    require W2PG_OPTIONSDIR . '/templates/w2pg-options-tpl.php';
}
