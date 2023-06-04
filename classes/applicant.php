<?php

class Applicant
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    /**
     * Default constructor for Applicant object
     * @param string $fname
     * @param string $lname
     * @param string $email
     * @param string $state
     * @param string $phone
     */
    function __construct()
    {
        $this->_fname = "";
        $this->_lname = "";
        $this->_email = "";
        $this->_state = "";
        $this->_phone = "";
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return string
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * @param string $github
     */
    public function setGithub($github)
    {
        $this->_github = $github;
    }

    /**
     * @return string
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param string $experience
     */
    public function setExperience($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * @return string
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * @param string $relocate
     */
    public function setRelocate($relocate)
    {
        $this->_relocate = $relocate;
    }

    /**
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * @param string $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}// End of class