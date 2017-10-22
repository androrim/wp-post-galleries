<?php

/**
 * Retrieves post data attachment given a post ID or post object.
 *
 * @param int $id   Optional. Gallery ID.
 * @param int|WP_Post|null $post   Optional. Post ID or post object. Defaults to global $post.
 * @return WP_Post | array | null
 */
function w2pg_get_gallery_attachments($id = null, $post = null)
{
    $post = get_post($post);

    if ($post === null) {
        return null;
    }

    $galleries_attachs = _w2pg_get_galleries_attachments($post->ID);

    if ($id && isset($galleries_attachs[$id])) {
        return $galleries_attachs;
    }

    return $galleries_attachs;
}

