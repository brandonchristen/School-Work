<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'dataAccess.php';
class DataAccessMySQLite extends dataAccess
{

    private $dbConnection;
    private $result;
    private $stmt;

    // aDataAccess methods
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("sqlite:/home/inet2005/code/inet2005ins/PHP3Tier/Data/db/mydb.sqlite");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the SQLite Database via PDO: ' . $ex->getMessage());
        }
    }


    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectActors($start,$count)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor LIMIT :start, :count');
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function fetchActors()
    {
        try
        {
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Could not retrieve from SQLite Database via PDO: ' . $ex->getMessage());
        }

    }

    public function fetchActorID($row)
    {
        return $row['actor_id'];
    }

    public function fetchActorFirstName($row)
    {
        return $row['first_name'];
    }

    public function fetchActorLastName($row)
    {
        return $row['last_name'];
    }

    public function AddActor($firstName,$lastName)
    {
        try
        {
            $this->stmt = $this->dbConnection->prepare('INSERT INTO actor(first_name,last_name) VALUES(:firstName, :lastName)');
            $this->stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);

            $this->stmt->execute();

            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not insert record into SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function DeleteActor($ID)
    {
        $this->stmt = $this->dbConnection->prepare('DELETE FROM film_actor WHERE actor_id = :ID;');
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();

        $this->stmt = $this->dbConnection->prepare('DELETE FROM film_actor WHERE actor_id = :ID;');
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();
    }

    public function UpdateActor($ID,$firstName,$lastName)
    {
        $this->stmt = $this->dbConnection->prepare('UPDATE actor SET first_name = :fname, last_name = :lname WHERE actor_id = :ID');

        $this->stmt->bindParam(':fname', $firstName, PDO::PARAM_STR);
        $this->stmt->bindParam(':lname', $lastName, PDO::PARAM_STR);
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();

    }


    public function searchActors($SearchQuery)
    {
        $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor WHERE first_name LIKE '%" . :sq . "%' OR last_name LIKE '%" . :sq . "%'');
        $this->stmt->bindParam(':sq', $SearchQuery, PDO::PARAM_STR);
        $this->stmt->execute();

    }

    public function GetActorName($ID)
    {
        $this->stmt = $this->dbConnection->prepare('SELECT first_name, last_name FROM actor WHERE actor_id = :ID');
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();

        return $this->stmt->fetch_array();

    }

}

?>