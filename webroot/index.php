<?php
use HodgePodge\Core\Router;
use HodgePodge\Core\Scribe;
use HodgePodge\Exception\HTTP;

// Init!
require_once '../init.php';

// Page Routing
$page = Router::route();

if(file_exists($page))
{
    require_once($page);
}
else
{
    throw new HTTP\NotFound();
}

