<?php
/*
  Plugin Name: WordPress Post Gallery
  Plugin URI: https://androrim.github.io/wp-post-gallery/
  Description: Metabox galleries to WordPress posts
  Version: 1.0
  Author: Leandro de Amorim <androrim@gmail.com>
  Author URI: https://www.linkedin.com/in/leandrodeamorim
  Text Domain: wp-post-gallery
  License: GPLv2
 */


require dirname(__FILE__) . '/config.php';

require W2PGDIR . '/security.php';
require W2PG_OPTIONSDIR . '/src/w2pg-options-functions.php';
require W2PG_OPTIONSDIR . '/src/w2pg-options.php';

require W2PG_METABOXDIR . '/src/w2pg-meta-box-functions.php';
require W2PG_METABOXDIR . '/src/w2pg-meta-box.php';

require W2PGDIR . '/functions.php';

register_activation_hook(__FILE__, 'w2pg_activation');

/**
 * Runs only when the plugin is activated.
 * @since 0.1.0
 */
function w2pg_activation()
{

    /* Create transient data */
    set_transient('fx-admin-notice-example', true, 5);
}

/* Add admin notice */
add_action('admin_notices', 'fx_admin_notice_example_notice');

/**
 * Admin Notice on Activation.
 * @since 0.1.0
 */
function fx_admin_notice_example_notice()
{

    /* Check transient */
    if (get_transient('fx-admin-notice-example')) {
        ?>
        <div class="updated notice">
            <p><?php _e('Thank you for using') ?> <strong>WordPress Post Gallery</strong>!</p>
            <p><?php _e('Go on options page and setting the galleries context') ?>, 
                <a href="<?= admin_url('options-general.php?page=wp-post-gallery') ?>">
                    <?php _e('click heare') ?></a>.
            </p>
        </div>
        <?php
        delete_transient('fx-admin-notice-example');
    }
}
