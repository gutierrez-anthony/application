<?php

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionJobs = array();
    private $_selectionVerticals = array();

    function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getSelectionJobs()
    {
        return $this->_selectionJobs;
    }

    /**
     * @param array $selectionJobs
     */
    public function setSelectionJobs(array $selectionJobs)
    {
        $this->_selectionJobs = $selectionJobs;
    }

    /**
     * @return array
     */
    public function getSelectionVerticals()
    {
        return $this->_selectionVerticals;
    }

    /**
     * @param array $selectionVerticals
     */
    public function setSelectionVerticals(array $selectionVerticals)
    {
        $this->_selectionVerticals = $selectionVerticals;
    }
}// End of class