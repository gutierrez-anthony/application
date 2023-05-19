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
require_once('model/data-layer.php');
require_once('model/validation.php');

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

    $firstName = "";
    $lastName = "";
    $email = "";
    $inputState = " ";
    $phone = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        //var_dump($_POST);
        if(isset($_POST['firstName'])){
            $firstName = $_POST['firstName'];
        }
        if(isset($_POST['lastName'])){
            $lastName = $_POST['lastName'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['inputState'])){
            $inputState = $_POST['inputState'];
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }

        // Validate Data and add to SESSION array
        // Check first name
        if (validName($firstName)) {
            $f3->set('SESSION.firstName', $firstName);
        } else {
            $f3->set('errors["firstName"]', 'Invalid name entered');
        }

        // Check last name
        if (validName($lastName)) {
            $f3->set('SESSION.lastName', $lastName);
        } else {
            $f3->set('errors["lastName"]', 'Invalid name entered');
        }

        // Check email
        if (validEmail($email)) {
            $f3->set('SESSION.email', $email);
        } else {
            $f3->set('errors["email"]', 'Invalid email entered');
        }

        // Check the correct state selected
        if (validState($inputState)) {
            $f3->set('SESSION.inputState', $inputState);
        } else {
            $f3->set('errors["inputState"]', 'Nice Try!!!');
        }

        // Check if phone number entered correctly
        if(validPhone($phone)) {
            $f3->set('SESSION.phone', $phone);
        } else {
            $f3->set('errors["phone"]', 'Invalid phone number entered');
        }

        if(empty($f3->get('errors'))) {
            $f3->reroute('experience');
        }
    }
    // Get the data from the model and add to hive
    $f3->set('states', getStates());

    // Add user data to the hive
    $f3->set('userFName', $firstName);
    $f3->set('userLName', $lastName);
    $f3->set('userEmail', $email);
    $f3->set('userState', $inputState);
    $f3->set('userPhone', $phone);

    // Define a view page
    $view = new Template();
    echo $view->render('views/personal_info.html');
});

// Define an experience page route
$f3->route('GET|POST /experience', function($f3) {
    $bio = "";
    $gitLink = "";
    $yearsExp = "";
    $relocate = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        if(isset($_POST['bio'])){
            $bio = $_POST['bio'];
        }

        if(isset($_POST['gitLink'])){
            $gitLink = $_POST['gitLink'];
        }

        if(isset($_POST['yearsExp'])){
            $yearsExp = $_POST['yearsExp'];
        }

        if(isset($_POST['relocate'])){
            $relocate = $_POST['relocate'];
        }

        // Validate Data and add to SESSION array
        if (validGithub($gitLink) || $gitLink == "") {
            $f3->set('SESSION.gitLink', $gitLink);
        } else {
            $f3->set('errors["gitLink"]', 'Invalid link entered');
        }

        if (validExperience($yearsExp)) {
            $f3->set('SESSION.yearsExp', $yearsExp);
        } else {
            $f3->set('errors["yearsExp"]', 'Invalid Selection');
        }

        if (in_array($relocate, getRelocate()) || $relocate == "") {
            $f3->set('SESSION.relocate', $relocate);
        } else {
            $f3->set('errors["relocate"]', 'Invalid Selection');
        }

        $f3->set('SESSION.bio', $bio);

        if(empty($f3->get('errors'))) {
            $f3->reroute('mailing-list');
        }
    }
    // Get the data from the model and add to hive
    $f3->set('years', getYears());
    $f3->set('relocateOptions', getRelocate());

    // Add user data to the hive
    $f3->set('userYear', $yearsExp);
    $f3->set('userRelocate', $relocate);

    // Define a view page
    $view = new Template();
    echo $view->render('views/experience.html');
});

// Define the mailing list route
$f3->route('GET|POST /mailing-list', function($f3) {
    // Initialize Arrays
    $selectedJob = array();
    $selectedVert = array();

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        // If a Job has been selected
        if (!empty($_POST['sdevJobs'])) {
            $selectedJob = $_POST['sdevJobs'];
            // Validate the selected Jobs
            if (validSelectionsJobs($selectedJob)) {
                $f3->set('SESSION.jobs', implode(", ", $selectedJob));
            } else {
                $f3->set('errors["sdevJobs"]', 'Invalid Selection');
            }
        }

        if (!empty($_POST['industryVert'])) {
            $selectedVert = $_POST['industryVert'];
            // Validate the selected Jobs
            if (validSelectionsVerticals($selectedVert)) {
                $f3->set('SESSION.verticals', implode(", ", $selectedVert));
            } else {
                $f3->set('errors["industryVert"]', 'Invalid Selection');
            }
        }

        if(empty($f3->get('errors'))) {
            $f3->reroute('summary');
        }
    }
    $f3->set('jobs', getJobs());
    $f3->set('verticals', getVerticals());

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