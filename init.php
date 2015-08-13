<?php

/** Basic startup file. All php files on the site should call this one first.
 *
 * Loads config, autoloader and database, and generally sets up the site environment
 */
use Automatorm\Orm\Schema;
 
define('ROOT', __DIR__);
error_reporting(E_ALL ^ E_NOTICE);

// Composer Autoloader
require_once 'vendor/autoload.php';

// Load Config
require_once ROOT.'/config.php';

// Load basic functions file
require_once ROOT.'/functions.php';

// Exception/Error handlers
require_once ROOT.'/errors.php';

// Start ORM
// $schema = Schema::generate('default', 'models');

// Session config
session_set_cookie_params(60*60*24*28); // 28 Days
ini_set('session.save_handler', 'memcached');
ini_set('session.save_path', $config['memcache']['url']);
ini_set('session.gc_maxlifetime', 60*60*24*28);
session_start();
