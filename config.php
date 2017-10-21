<?php

/**
 * The base configuration for WP Post Galleries
 */

define('W2PGDIR', dirname(__FILE__));

define('W2PG_NONCE', 'androrim_w2pg');

define('W2PG_OPTNAME', 'w2pg_options');

define('W2PG_OPTIONSDIR', W2PGDIR . '/app/options');

define('W2PG_NOTIN', serialize(array(
    'attachment',
    'revision',
    'nav_menu_item',
    'custom_css',
    'customize_changeset',
    'oembed_cache',
)));

define('W2PG_OPTDEFAULT', serialize(array(
    'in' => array('post')
)));




