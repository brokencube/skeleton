<?php

use HodgePodge\Core\Log;

/** 
 * General functions that don't really belong in an object or class
 *
 * Try not to make this file too large.
 */

function redirect($url)
{
    global $config;
    $root = 'http://' . $config['hostname'];
    header("Location: {$root}{$url}");
    exit;
}

/* Support for Log:: output in AJAX calls */
function json_output($data = [])
{
    $array['_log_array'] = Log::get()->getJsonOutput();
    $array['data'] = $data;
    Log::off();
    return json_encode($array);
}
