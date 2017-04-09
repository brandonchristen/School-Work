<?php


require_once '../Data/dataAccess.php';

class Actor
{
    private $m_customerId;
    private $m_firstName;
    private $m_lastName;


    public function __construct($in_fname,$in_lname)
    {
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

    public static function retrieveSome($start,$count)
    {
        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->selectActors($start,$count);

        while($row = $myDataAccess->fetchActors())
        {
            $currentActor = new self($myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row));
            $currentActor->m_customerId = $myDataAccess->fetchActorID($row);
            $arrayOfActorObjects[] = $currentActor;
        }

        $myDataAccess->closeDB();

        return $arrayOfActorObjects;
    }

    public function save()
    {
        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();

        $recordsAffected = $myDataAccess->AddActor($this->m_firstName,$this->m_lastName);

        $myDataAccess->closeDB();

        return "$recordsAffected row(s) affected!";

    }

    public static function Delete($ActorID){
        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();
        $Result = $myDataAccess->DeleteActor($ActorID);

        if ($Result == 1){
            $myDataAccess->closeDB();
            return true;
        }
        else{
            $myDataAccess->closeDB();
            return false;
        }


    }

    public static function Search($query){
        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->searchActors($query);

        while($row = $myDataAccess->fetchActors())
        {
            $currentActor = new self($myDataAccess->fetchActorFirstName($row),
                $myDataAccess->fetchActorLastName($row));
            $currentActor->m_customerId = $myDataAccess->fetchActorID($row);
            $arrayOfActorObjects[] = $currentActor;
        }

        $myDataAccess->closeDB();

        return $arrayOfActorObjects;

    }

    public static function GetNameByID($ID){
        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();

        $ActorsName = $myDataAccess->GetActorName($ID);
        $myDataAccess->closeDB();

        return $ActorsName;

    }

    public function Update($Fname,$Lname){
        $ID = $this->m_customerId;

        $myDataAccess = DataAccess::getInstance();
        $myDataAccess->connectToDB();

        $myDataAccess->UpdateActor($ID,$Fname,$Lname);

        $myDataAccess->closeDB();

    }

    public function SetID($ID){
        $this->m_customerId = $ID;

    }

}

?>
