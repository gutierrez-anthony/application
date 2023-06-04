<?php

class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionJobs;
    private $_selectionVerticals;

    function __construct()
    {
        parent::__construct();
        $this->_selectionJobs = array();
        $this->_selectionVerticals = array();
    }

    /**
     * @return array
     */
    public function getSelectionJobs()
    {
        return $this->_selectionJobs;
    }

    /**
     * @param string $selectionJobs
     */
    public function setSelectionJobs($selectionJobs)
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
     * @param string $selectionVerticals
     */
    public function setSelectionVerticals($selectionVerticals)
    {
        $this->_selectionVerticals = $selectionVerticals;
    }
}// End of class