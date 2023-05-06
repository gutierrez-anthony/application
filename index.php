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

// Define a default route for home
$f3->route('GET /', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define an alternative default route for home
$f3->route('GET /home', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a personal-info route
$f3->route('GET /personal-info', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/personal_info.html');
});

// Define an experience page route
$f3->route('GET /experience', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/experience.html');
});

// Define the mailing list route
$f3->route('GET /mailing-list', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/mailingList.html');
});

// Define the summary route
$f3->route('GET /summary', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3 -> run();