<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'dataAccess.php';
class DataAccessMySQLi extends DataAccess
{

    private $dbConnection;
    private $result;

    // aDataAccess methods
    public function connectToDB()
    {
        $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
        if (!$this->dbConnection)
        {
            die('Could not connect to the Sakila Database: ' .
                $this->dbConnection->connect_errno);
        }
    }

    public function closeDB()
    {
        $this->dbConnection->close();
    }

    public function selectActors($start,$count)
    {
        $this->result = @$this->dbConnection->query("SELECT * FROM actor LIMIT $start,$count");
        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }


    public function fetchActors()
    {
        if(!$this->result)
        {
            die('No records in the result set: ' .
                $this->dbConnection->error);
        }
        return $this->result->fetch_array();
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
        $this->result = @$this->dbConnection->query("INSERT INTO actor(first_name,last_name) VALUES('$firstName','$lastName');");

        return $this->dbConnection->affected_rows;

    }
    public function DeleteActor($ID)
    {
        @$this->dbConnection->query("DELETE FROM film_actor WHERE actor_id = $ID;");
        @$this->dbConnection->query("DELETE FROM actor WHERE actor_id = $ID;");

        return $this->dbConnection->affected_rows;
    }

    public function UpdateActor($ID,$firstName,$lastName)
    {
        $sql = "UPDATE actor SET first_name = '";
        $sql .= $firstName . "', ";
        $sql .= "last_name = '" . $lastName . "' ";
        $sql .= "WHERE actor_id  = " . $ID . ";";

        $this->result = @$this->dbConnection->query($sql);

        return $this->dbConnection->affected_rows;

    }


    public function searchActors($SearchQuery)
    {
     $sql="SELECT * FROM actor WHERE first_name LIKE '%" . $SearchQuery . "%' OR last_name LIKE '%" . $SearchQuery . "%'";


        $this->result = @$this->dbConnection->query($sql);
        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }

    }

    public function GetActorName($ID)
    {
        $sql="SELECT first_name, last_name FROM actor WHERE actor_id = $ID";
        $this->result = @$this->dbConnection->query($sql);

        if(!$this->result)
        {
            die('Could not retrieve records from the Sakila Database: ' .
                $this->dbConnection->error);
        }
        return $this->result->fetch_assoc();

    }

}

?>