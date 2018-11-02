<?php

$dir = __DIR__ . '/';

// Constant global [DONE]
require_once('config/constant.php');

// Exception handler [DONE]
require_once($dir.'exception/exception.php');

// Helper load in folder root->helpers [DONE]
require_once('core/Handler/Helper.php');

// Controller load in folder root->controllers [DONE]
require_once('core/Handler/Controller.php');

// Database global
require_once('config/db.php');
require_once('core/Handler/Db.php');

// Config handle
require_once('core/Handler/Config.php');

// Routes handle
require_once('core/Handler/Routes.php');
// require_once('config/routes.php');



/*
 * Include file core
 * 
 * 
 * 
 */
?>