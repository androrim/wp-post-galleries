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

function w2pg_activation()
{
    set_transient('w2pg-activate-notice', true, 5);
}

function w2pg_activation_notice()
{
    if (get_transient('w2pg-activate-notice')) {
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

add_action('admin_notices', 'w2pg_activation_notice');
