<?php

function w2pg_add_meta_box($post_type)
{
    $in = w2pg_get_options('in');

    if (in_array($post_type, $in)) {
        add_meta_box('wp_post_galleries', __('Galleries'), 'w2pg_meta_box',
            $post_type, 'normal', 'high');
    }
}
add_action('add_meta_boxes', 'w2pg_add_meta_box');

function w2pg_meta_box($post)
{
    $galleries_attachments = w2pg_get_galleries_attachments($post->ID);

    $upload_link        = esc_url(get_upload_iframe_src('image', $post->ID));
    $base_template_path = W2PG_METABOXDIR . '/templates/w2pg-base-image-tpl.html';
    $base_template      = file_get_contents($base_template_path);
    
    require W2PG_METABOXDIR . '/templates/w2pg-meta-box-tpl.php';
}

function w2pg_base_image_tpl()
{
    include W2PG_METABOXDIR . '/templates/w2pg-base-image-tpl.html';
    die();
}
add_action('wp_ajax_w2pg_base_image_tpl', 'w2pg_base_image_tpl');

function w2pg_meta_box_scripts()
{
    wp_enqueue_script('w2pg_meta_box_actions',
        W2PG_METABOXURL . '/assets/js/w2pg-meta-box.js');
}
add_action('admin_enqueue_scripts', 'w2pg_meta_box_scripts');

function w2pg_meta_box_styles()
{
    wp_register_script('w2pg_meta_box_css',
        W2PG_METABOXURL . '/assets/css/w2pg-meta-box.css');
    wp_enqueue_style('w2pg_meta_box_css',
        W2PG_METABOXURL . '/assets/css/w2pg-meta-box.css');
}
add_action('admin_head', 'w2pg_meta_box_styles');

function w2pg_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    
    if (!isset($_POST['w2pg_noncename'])) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['w2pg_noncename'], W2PG_NONCE)) {
        wp_die('<h1>WP Posts Galleries</h1> <p>' . __('Invalid request') . '</p>');
    }

    $items = array();

    if (isset($_POST['w2pg-item'])) {
        $items = $_POST['w2pg-item'];
    }

    update_post_meta($post_id, W2PG_METAKEY, $items);
}
add_action('save_post', 'w2pg_meta_box_save');
