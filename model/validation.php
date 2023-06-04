<?php
/*
    PHP functions for validating information from application forms.
    Author: Anthony Gutierrez
    File: validation.php
    Date: 5/16/2023
*/

class Validate
{
    // checks to see that a string is all alphabetic (no numbers).
    static function validName($name)
    {
        $name = trim($name);
        $name = strip_tags($name);
        return (strlen($name) >= 2 && !ctype_digit($name));
    }

    //checks to see that a string is a valid url
    static function validGithub($url)
    {
        $url = trim($url);
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    //checks to see that a string is a valid “value” property
    static function validExperience($years)
    {
        // If the number of years of experience is selected
        // and is in the array, return true.
        return (!empty($years) && in_array($years, DataLayer::getYears()));
    }
    static function validState($selectedState)
    {
        // If the state selected is in the array return true
        return (!empty($selectedState) && in_array($selectedState, DataLayer::getStates()));
    }

    //checks to see that a phone number is valid
    static function validPhone($phone)
    {
        $phone = trim($phone);
        // Found at https://uibakery.io/regex-library/phone-number-php
        $validate_phone = "/^\\+?\\d{1,4}?[-.\\s]?\\(?\\d{1,3}?\\)?[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,4}[-.\\s]?\\d{1,9}$/";
        return preg_match($validate_phone, $phone);
    }

    //checks to see that an email address is valid
    static function validEmail($email)
    {
        $email = trim($email);
        // Found at https://uibakery.io/regex-library/email-regex-php
        $validate_email = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
        return preg_match($validate_email, $email);
    }

    //checks each selected jobs checkbox selection against a list of valid options
    static function validSelectionsJobs($selectedJobs)
    {
        $validJob = DataLayer::getJobs();

        foreach ($selectedJobs as $selectedJob) {
            if(!in_array($selectedJob, $validJob)) {
                return false;
            }
        }
        return true;
    }

    //checks each selected verticals checkbox selection against a list of valid options
    static function validSelectionsVerticals($selectedVerticals)
    {
        $validVerticals = DataLayer::getVerticals();

        foreach ($selectedVerticals as $selectedVertical) {
            if(!in_array($selectedVertical, $validVerticals)) {
                return false;
            }
        }
        return true;
    }
}
