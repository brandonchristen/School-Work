<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PDOMySQLCustomerDataModel
{

    private $dbConnection;
    private $result;
    private $stmt;

    // iCustomerDataAccess methods
    public function connectToDB()
    {
        try
        {
            $this->dbConnection = new PDO("mysql:host=localhost;dbname=sakila","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectActors()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        $selectStatement = "SELECT actor_id, first_name, last_name from actor LIMIT :start, :count";

        try
        {
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);

            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
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
            die('Could not insert record into Database via PDO: ' . $ex->getMessage());
        }
    }


    public function searchActors($SearchQuery)
    {
        $SearchQuery = "%" . $SearchQuery . "%";
        $this->stmt = $this->dbConnection->prepare("SELECT * FROM actor WHERE first_name LIKE :sq OR last_name LIKE :sq ");
        $this->stmt->bindParam(':sq', $SearchQuery, PDO::PARAM_STR);
        $this->stmt->execute();

    }

    public function DeleteActor($ID)
    {
        $SS ='DELETE FROM film_actor WHERE actor_id = :ID';
        $selectStatement ='DELETE FROM actor WHERE actor_id = :ID';
        $this->stmt = $this->dbConnection->prepare($SS);
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();

        $this->stmt = $this->dbConnection->prepare($selectStatement);
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_STR);
        $this->stmt->execute();
    }


    public function GetActorByID($ID)
    {
        $this->stmt = $this->dbConnection->prepare('SELECT * FROM actor WHERE actor_id = :ID');
        $this->stmt->bindParam(':ID', $ID, PDO::PARAM_INT);
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


}

?>
