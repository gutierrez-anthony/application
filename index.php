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
$f3->route('GET|POST /personal-info', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //var_dump($_POST);

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $inputState = $_POST['inputState'];
        $phone = $_POST['phone'];

        $f3->set('SESSION.firstName', $firstName);
        $f3->set('SESSION.lastName', $lastName);
        $f3->set('SESSION.email', $email);
        $f3->set('SESSION.inputState', $inputState);
        $f3->set('SESSION.phone', $phone);

        $f3->reroute('experience');
    }

    // Define a view page
    $view = new Template();
    echo $view->render('views/personal_info.html');
});

// Define an experience page route
$f3->route('GET|POST /experience', function($f3) {
    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $bio = $_POST['bio'];
        $gitLink = $_POST['gitLink'];
        $yearsExp = $_POST['yearsExp'];
        $relocate = $_POST['relocate'];

        $f3->set('SESSION.bio', $bio);
        $f3->set('SESSION.gitLink', $gitLink);
        $f3->set('SESSION.yearsExp', $yearsExp);
        $f3->set('SESSION.relocate', $relocate);

        $f3->reroute('mailing-list');
    }

    // Define a view page
    $view = new Template();
    echo $view->render('views/experience.html');
});

// Define the mailing list route
$f3->route('GET|POST /mailing-list', function($f3) {

    $sdevJobs = implode(", ", $_POST['sdevJobs']);
    $industryVert = implode(", ", $_POST['industryVert']);

    $f3->set('SESSION.sdevJobs', $sdevJobs);
    $f3->set('SESSION.industryVert', $industryVert);

    $f3->reroute('summary');

    // Define a view page
    $view = new Template();
    echo $view->render('views/mailingList.html');
});

// Define the summary route
$f3->route('GET /summary', function() {
    // Define a view page
    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

// Run Fat-Free
$f3 -> run();