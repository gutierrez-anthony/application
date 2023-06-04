<?php
/**
 * @author Anthony Gutierrez
 * Created 4/21/2023
 * 328/application/index.php
 * Controller for Application project
 */


// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// Create an instance for f3 object
$f3 = Base::instance();
$controller = new Controller($f3);

// Define a default route for home
$f3->route('GET /', function() {
    $GLOBALS['controller']->home();
});

// Define an alternative default route for home
$f3->route('GET /home', function() {
    $GLOBALS['controller']->home();
});

// Define a personal-info route
$f3->route('GET|POST /personal-info', function() {
    $GLOBALS['controller']->pInfo();
});

// Define an experience page route
$f3->route('GET|POST /experience', function() {
    $GLOBALS['controller']->experience();
});

// Define the mailing list route
$f3->route('GET|POST /mailing-list', function() {
    $GLOBALS['controller']->mailing();
});

// Define the summary route
$f3->route('GET /summary', function() {
    $GLOBALS['controller']->summary();
});

// Run Fat-Free
$f3 -> run();