<?php

require_once './model/Actor.php';
//require_once '../model/data/MySQLiCustomerDataModel.php';
require_once './model/data/PDOMySQLCustomerDataModel.php';

class ActorModel
{
    private $m_DataAccess;

    public function __construct()
    {
        //$this->m_DataAccess = new MySQLiCustomerDataModel();
        $this->m_DataAccess = new PDOMySQLCustomerDataModel();
    }

    public function __destruct()
    {
        // not doing anything at the moment
    }

    public function getAllActors()
    {
        $this->m_DataAccess->connectToDB();

        $arrayOfActorObjects = array();

        $this->m_DataAccess->selectActors();

        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
                $this->m_DataAccess->fetchActorFirstName($row),
                $this->m_DataAccess->fetchActorLastName($row));

            $arrayOfActorObjects[] = $currentActor;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfActorObjects;
    }

    public function getActor($custID)
    {
        $this->m_DataAccess->connectToDB();

        $this->m_DataAccess->GetActorByID($custID);

        $record =  $this->m_DataAccess->fetchActors();

        $fetchedCustomer = new Actor($this->m_DataAccess->fetchActorID($record),
            $this->m_DataAccess->fetchActorFirstName($record),
            $this->m_DataAccess->fetchActorLastName($record));

        $this->m_DataAccess->closeDB();

        return $fetchedCustomer;
    }

    public function deleteActor($custID)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->DeleteActor($custID);
        $this->getAllActors();
        $this->m_DataAccess->closeDB();
    }

    public function searchActor($query)
    {
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->searchActors($query);

        $arrayOfActorObjects = array();

        while($row =  $this->m_DataAccess->fetchActors())
        {
            $currentActor = new Actor($this->m_DataAccess->fetchActorID($row),
                $this->m_DataAccess->fetchActorFirstName($row),
                $this->m_DataAccess->fetchActorLastName($row));

            $arrayOfActorObjects[] = $currentActor;
        }

        $this->m_DataAccess->closeDB();

        return $arrayOfActorObjects;

    }

    public function UpdateActor($Actor){
        $custID = $Actor->getID();
        $fName = $Actor->getFirstName();
        $lName = $Actor->getLastName();
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->UpdateActor($custID,$fName,$lName);
        $this->m_DataAccess->closeDB();
    }

    public function AddActor($fName,$Lname){
        $this->m_DataAccess->connectToDB();
        $this->m_DataAccess->AddActor($fName,$Lname);
        $this->m_DataAccess->closeDB();
    }


}
