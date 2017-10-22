<?php

function _w2pg_parse_image_base($attachment)
{
    $image_attributes = wp_get_attachment_image_src($attachment->ID);

    $gallery_item = str_replace('%src%', $image_attributes[0], $base_template);
    $gallery_item = str_replace('%id%', $attachment->ID, $gallery_item);

    return $gallery_item;
}
