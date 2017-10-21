<?php

/**
 * The base configuration for WP Post Galleries
 */

define('W2PGNONCE', 'androrim_w2pg');

define('W2PGDIR', dirname(__FILE__));

define('W2PG_OPTIONSDIR', W2PGDIR . '/app/options');

define('W2PGNOTIN',
    serialize(array(
    'attachment',
    'revision',
    'nav_menu_item',
    'custom_css',
    'customize_changeset',
    'oembed_cache',
)));





