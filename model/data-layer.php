<?php
/*
    PHP function storing used data for application page.
    Author: Anthony Gutierrez
    File: data-layer.php
    Date: 5/16/2023
*/
function getYears()
{
    $years = array("0-2", "2-4", "4+");
    return $years;
}
function getRelocate()
{
    $relocate = array("yes", "no", "maybe");
    return $relocate;
}

function getStates()
{
    $states = array("Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware",
                    "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky",
                    "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi",
                    "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico",
                    "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania",
                    "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont",
                    "Virginia", "Washington", "Washington D.C.", "West Virginia", "Wisconsin", "Wyoming");
    return $states;
}
function getJobs()
{
    $sdevJobs = array("PHP", "Java", "Python", "HTML", "CSS", "ReactJS", "NodeJs");
    return $sdevJobs;
}
function getVerticals()
{
    $industryVerts = array("SaaS", "Health Tech", "Ag Tech", "HR Tech", "Industrial Tech", "Cybersecurity");
    return $industryVerts;
}