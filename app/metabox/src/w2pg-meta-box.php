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
    $images_ids  = (array) get_post_meta($post->ID, '_w2pg_post_gallery', true);
    $attachments = array();

    if (!empty($images_ids)) {
        $attachments = get_posts(array(
            'post__in' => $images_ids,
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => $post->ID,
        ));
    }

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

