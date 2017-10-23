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
