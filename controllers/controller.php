<?php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Define a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function pInfo()
    {
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
            if (Validate::validName($firstName)) {
                $this->_f3->set('SESSION.firstName', $firstName);
            } else {
                $this->_f3->set('errors["firstName"]', 'Invalid name entered');
            }

            // Check last name
            if (Validate::validName($lastName)) {
                $this->_f3->set('SESSION.lastName', $lastName);
            } else {
                $this->_f3->set('errors["lastName"]', 'Invalid name entered');
            }

            // Check email
            if (Validate::validEmail($email)) {
                $this->_f3->set('SESSION.email', $email);
            } else {
                $this->_f3->set('errors["email"]', 'Invalid email entered');
            }

            // Check the correct state selected
            if (Validate::validState($inputState)) {
                $this->_f3->set('SESSION.inputState', $inputState);
            } else {
                $this->_f3->set('errors["inputState"]', 'Nice Try!!!');
            }

            // Check if phone number entered correctly
            if(Validate::validPhone($phone)) {
                $this->_f3->set('SESSION.phone', $phone);
            } else {
                $this->_f3->set('errors["phone"]', 'Invalid phone number entered');
            }

            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('experience');
            }
        }
        // Get the data from the model and add to hive
        $this->_f3->set('states', DataLayer::getStates());

        // Add user data to the hive
        $this->_f3->set('userFName', $firstName);
        $this->_f3->set('userLName', $lastName);
        $this->_f3->set('userEmail', $email);
        $this->_f3->set('userState', $inputState);
        $this->_f3->set('userPhone', $phone);

        // Define a view page
        $view = new Template();
        echo $view->render('views/personal_info.html');
    }

    function experience()
    {
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
            if (Validate::validGithub($gitLink) || $gitLink == "") {
                $this->_f3->set('SESSION.gitLink', $gitLink);
            } else {
                $this->_f3->set('errors["gitLink"]', 'Invalid link entered');
            }

            if (Validate::validExperience($yearsExp)) {
                $this->_f3->set('SESSION.yearsExp', $yearsExp);
            } else {
                $this->_f3->set('errors["yearsExp"]', 'Invalid Selection');
            }

            if (in_array($relocate, DataLayer::getRelocate()) || $relocate == "") {
                $this->_f3->set('SESSION.relocate', $relocate);
            } else {
                $this->_f3->set('errors["relocate"]', 'Invalid Selection');
            }

            $this->_f3->set('SESSION.bio', $bio);

            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('mailing-list');
            }
        }
        // Get the data from the model and add to hive
        $this->_f3->set('years', DataLayer::getYears());
        $this->_f3->set('relocateOptions', DataLayer::getRelocate());

        // Add user data to the hive
        $this->_f3->set('userYear', $yearsExp);
        $this->_f3->set('userRelocate', $relocate);

        // Define a view page
        $view = new Template();
        echo $view->render('views/experience.html');
    }

    function mailing()
    {
        $selectedJob = array();
        $selectedVert = array();

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            // If a Job has been selected
            if (!empty($_POST['sdevJobs'])) {
                $selectedJob = $_POST['sdevJobs'];
                // Validate the selected Jobs
                if (Validate::validSelectionsJobs($selectedJob)) {
                    $this->_f3->set('SESSION.jobs', implode(", ", $selectedJob));
                } else {
                    $this->_f3->set('errors["sdevJobs"]', 'Invalid Selection');
                }
            }

            if (!empty($_POST['industryVert'])) {
                $selectedVert = $_POST['industryVert'];
                // Validate the selected Jobs
                if (Validate::validSelectionsVerticals($selectedVert)) {
                    $this->_f3->set('SESSION.verticals', implode(", ", $selectedVert));
                } else {
                    $this->_f3->set('errors["industryVert"]', 'Invalid Selection');
                }
            }

            if(empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('summary');
            }
        }
        $this->_f3->set('jobs', DataLayer::getJobs());
        $this->_f3->set('verticals', DataLayer::getVerticals());

        // Define a view page
        $view = new Template();
        echo $view->render('views/mailingList.html');
    }

    function summary()
    {
        // Define a view page
        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }
}