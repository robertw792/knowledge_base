<?php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPERATOR is a PHP pre-defined constant
// (\ for Windows Remember!)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null :
define('SITE_ROOT', DS.'xampp'.DS.'htdocs'.DS.'knowledge_base');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');

// load config file first
require_once(LIB_PATH.DS."config.php");
// load basic functions next so that everything after can use them
require_once(LIB_PATH.DS."functions.php");

// load core objects
require_once(LIB_PATH.DS."session.php");
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."database_object.php");

// load database-related classes
require_once(LIB_PATH.DS."user.php");
require_once(LIB_PATH.DS."wcag_bank.php");
require_once(LIB_PATH.DS."at_bank.php");
?>
