<?php

class Actor
{
    private $m_customerId;
    private $m_firstName;
    private $m_lastName;


    public function __construct($in_id = null,$in_fname,$in_lname)
    {
        $this->m_customerId = $in_id;
        $this->m_firstName = $in_fname;
        $this->m_lastName = $in_lname;
    }


    public function getID()
    {
        return ($this->m_customerId);
    }

    public function getFirstName()
    {
        return ($this->m_firstName);
    }

    public function getLastName()
    {
        return ($this->m_lastName);
    }

    public function setID($ID){
        $this->m_customerId = $ID;
    }

    public function setFirstName($Fname){
        $this->m_firstName = $Fname;
    }

    public function setLastName($Lname){
        $this->m_lastName = $Lname;
    }

}

?>
