<?php
/*
Plugin Name: WP Post Galleries
Plugin URI: https://androrim.github.io/wp-post-galleries/
Description: Metabox galleries to WordPress post
Version: 1.0
Author: Leandro de Amorim <androrim@gmail.com>
Author URI: https://www.linkedin.com/in/leandrodeamorim
License: GPLv2
*/


/**
 * Path to options plugin
 */
define('W2PGDIR', dirname(__FILE__));

/**
 * Path to options dir
 */
define('W2PG_OPTIONSDIR', W2PGDIR . '/app/options');

require W2PG_OPTIONSDIR . '/src/w2pg-options.php';