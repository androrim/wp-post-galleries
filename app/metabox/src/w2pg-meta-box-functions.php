<?php


function _w2pg_get_galleries_attachments($post_id)
{
    $galleries_images = (array) get_post_meta($post_id, W2PG_METAKEY, true);
    $galleries_attachments = array();

    if (!empty($galleries_images)) {
        foreach ($galleries_images as $gallery => $attachs_ids) {
            $attachments = get_posts(array(
                'post__in' => $attachs_ids,
                'post_type' => 'attachment',
                'numberposts' => -1,
                'post_status' => null,
            ));

            $galleries_attachments[$gallery] = $attachments;
        }

    }

    return $galleries_attachments;
}