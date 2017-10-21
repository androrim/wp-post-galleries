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

    if (isset($options[$name])) {
        return $options[$name];
    }

    $GLOBALS['w2pg_options'] = $options;

    return $options;
}
