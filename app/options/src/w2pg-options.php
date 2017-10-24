<?php

function w2pg_options_admin_menu()
{
    add_options_page(__('WP Post Gallery'), __('WP Post Gallery'), 'manage_options', 'wp-post-gallery', 'w2pg_options');
}

add_action('admin_menu', 'w2pg_options_admin_menu');

function w2pg_options()
{
    if (isset($_POST['w2pg_options_save']) && wp_verify_nonce($_POST['w2pg_noncename'], W2PG_NONCE)) {
        w2pg_options_save($_POST);
    }

    $not_in = unserialize(W2PG_NOTIN);
    $options = w2pg_get_options();

    if ($options === false) {
        $options = unserialize(W2PG_OPTDEFAULT);
    }

    require W2PG_OPTIONSDIR . '/templates/w2pg-options-tpl.php';
}

function w2pg_options_save($data)
{
    if (!wp_verify_nonce($_POST['w2pg_noncename'], W2PG_NONCE)) {
        wp_die('<h1>WP Posts Galleries</h1> <p>' . __('Invalid request') . '</p>');
    }

    $options = null;

    if (isset($data['w2pg_options']['in'])) {
        $options = w2pg_sanitize_request_data($data['w2pg_options']);
    }

    if (update_option(W2PG_OPTNAME, $options)){
        w2pg_update_notice(__('Options saved with success!'), 'success');
    }
}

function w2pg_update_notice($message, $type)
{
    ?>
    <div class="notice notice-<?= $type ?> is-dismissible">
        <p><?= $message ?></p>
    </div>
    <?php
}
