<?php

use HodgePodge\Core\Env;
use HodgePodge\Exception\HTTP;
use HodgePodge\Exception;
use classes\Display;

// Show nice page for uncaught exceptions
set_exception_handler(function ($e) {
    switch (true)
    {            
        case $e instanceof HTTP\NotFound:
            header($e->getHeader());
	    Display::page('standard/error.404', $data);
            exit;
            
        case $e instanceof HTTP\Error:
        default:
            handle_error_exception($e);
    }
});

// Show nice page for uncaught fatal errors
register_shutdown_function(function() {
    $data['error'] = error_get_last(); 
    if ($data['error']['type'] == E_ERROR or $data['error']['type'] == E_RECOVERABLE_ERROR) {
	handle_error_exception(
	    new \ErrorException($data['error']['message'], $data['error']['type'], 0, $data['error']['file'], $data['error']['line']),
	    $data
	);
    }
});

function handle_error_exception($e, $data = [])
{
    //Exception, limited to a 1mb of data
    $data['exception'] = get_class($e) . " ({$e->getCode()}) \"{$e->getMessage()}\"\n" .
    "<b>on line {$e->getLine()} in {$e->getFile()}</b>\n";
    
    //Exception, limited to a 1mb of data
    ob_start();
    ini_set('xdebug.var_display_max_depth', 3);
    var_dump($e);
    $dump = ob_get_clean();
    $data['dump'] = substr($dump, 0, 1024 * 1024);
    $data['ex'] = $e;
    
    // Output
    header("HTTP/1.1 500 Internal Server Error");
    Display::page('standard/error.exception', $data);
    exit;
}
