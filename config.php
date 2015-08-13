<?php
use HodgePodge\Core;

/* QUICK SWITCHES */
$config['cache']['disable'] = false;
$config['version'] = '1.0';

///////////////////////////////////////

// URLs
$config['hostname'] = 'www.example.org';

// Database
// Default database using new Lib (not in use yet)
Core\Database::register([
    'server' => 'localhost',
    'user' => 'root',
    'pass' => "password",
    'database' => 'databasename',
]);

$config['css'] = [
    '/css/bootstrap.min.css',
    '/css/main.css'
];

$config['js'] = [
    '/js/external/jquery-2.1.4.min.js',
    '/js/main.js'
];

// Sessions + Cache
$config['memcache']['url'] = "localhost:11211";
