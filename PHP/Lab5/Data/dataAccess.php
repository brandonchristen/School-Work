<?php

// So, which database implementation will we use??
require_once '../Data/DataAcessMySQLi.php';
//require_once '../Dequire_once '../Data/DataAccessMySQLi.php';ata/DataAccessPDOMySQL.php';
//require_once '../Data/DataAccessPDOSQLite.php';

abstract class DataAccess
{
    private static $m_DataAccess;

    public static function getInstance()
    {
        // singleton
        if(self::$m_DataAccess == null)
        {
            self::$m_DataAccess = new DataAccessMySQLi();
            //self::$m_DataAccess = new DataAccessPDOMySQL();
            //self::$m_DataAccess = new DataAccessPDOSQLite();
        }
        return self::$m_DataAccess;
    }

    public abstract function connectToDB();

    public abstract function closeDB();

    public abstract function selectActors($start,$count);

    public abstract function fetchActors();

    public abstract function fetchActorID($row);

    public abstract function fetchActorFirstName($row);

    public abstract function fetchActorLastName($row);

    public abstract function AddActor($firstName,$lastName);

    public abstract function DeleteActor($row);

    public abstract function UpdateActor($row,$firstname,$lastname);


}
?>
