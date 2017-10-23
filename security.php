<?php

function w2pg_sanitize_request_data($data)
{
    if (!is_array($data)) {
        $sanitized = esc_sql($data);
        $sanitized = esc_js($data);
    }
    else {
        $sanitized = [];

        foreach ($data as $key => $value) {
            $sanitized[esc_sql($key)] = w2pg_sanitize_request_data($value);
        }
    }

    return $sanitized;
}
