<?php

function w2pg_options_admin_menu()
{
    add_options_page(__('WP Post Gallies'), __('WP Post Gallies'),
        'manage_options', 'wp-post-galleies', 'w2pg_options');

    if (isset($_POST['w2pg_options_save'])) {
        w2pg_options_save();
    }
}
add_action('admin_menu', 'w2pg_options_admin_menu');

function w2pg_options()
{
    $not_in  = unserialize(W2PG_NOTIN);
    $options = _w2pg_get_options();

    if ($options === false) {
        $options = unserialize(W2PG_OPTDEFAULT);
    }

    require W2PG_OPTIONSDIR . '/templates/w2pg-options-tpl.php';
}

function w2pg_options_save()
{
    if (!wp_verify_nonce($_POST['w2pg_noncename'], W2PG_NONCE)) {
        wp_die('<h1>WP Posts Galleries</h1> <p>' . __('Invalid request') . '</p>');
    }

    $options = isset($_POST['w2pg_options']) ? $_POST['w2pg_options'] : null;

    update_option(W2PG_OPTNAME, $options);
}
