<?php

function w2pg_get_options($name = '')
{
    $options = get_option(W2PG_OPTNAME);
    $default = unserialize(W2PG_OPTDEFAULT);

    if ($options === false) {
        return $default;
    }

    if ($options === '') {
        foreach ($default as $i => $v) {
            if ($i == 'in') {
                $default[$i] = array();
            }
            else {
                $default[$i] = '';
            }
        }

        $options = $default;
    }

    if ($name !== '') {
        if (isset($options[$name])) {
            return $options[$name];
        }

        return false;
    }

    $GLOBALS['w2pg_options'] = $options;

    return $options;
}

function w2pg_make_base_template($attachment)
{
    $base = w2pg_get_options('template');
    $img_full = wp_get_attachment_image_src($attachment->ID, 'full');
    $img_medium = wp_get_attachment_image_src($attachment->ID, 'medium');
    $img_thumb = wp_get_attachment_image_src($attachment->ID, 'medium');

    $html = str_replace('\\', '', $base);
    $html = str_replace('%IMG%', $img_full[0], $html);
    $html = str_replace('%IMG_MEDIUM%', $img_medium[0], $html);
    $html = str_replace('%IMG_THUMB%', $img_thumb[0], $html);
    $html = str_replace('%TITLE%', $attachment->post_title, $html);
    $html = str_replace('%ALT%', $attachment->post_title, $html);
    $html = str_replace('%DESCRIPTION%', $attachment->post_content, $html);
    $html = str_replace('%LEGEND%', $attachment->post_excerpt, $html);

    return $html;
}
