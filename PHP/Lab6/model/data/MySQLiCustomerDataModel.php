<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/data/iCustomerDataModel.php';
class MySQLiCustomerDataModel implements iCustomerDataModel
{

    private $dbConnection;
    private $result;

    // iCustomerDataAccess methods
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

    public function selectCustomers()
    {
       $selectStatement = "SELECT * FROM customer";
       $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
       $selectStatement .= " LIMIT 0,10;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }

    }
    
    public function selectCustomerById($custID)
    {
       $selectStatement = "SELECT * FROM customer";
       $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
       $selectStatement .= " WHERE customer.customer_id = $custID;";
       $this->result = @$this->dbConnection->query($selectStatement);
       if(!$this->result)
       {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
       }
    }
    

    public function fetchCustomers()
    {
       if(!$this->result)
       {
               die('No records in the result set: ' .
                       $this->dbConnection->error);
       }
       return $this->result->fetch_array();
    }
    
    public function updateCustomer($custID,$first_name,$last_name)
    {
       $updateStatement = "UPDATE customer";
       $updateStatement .= " SET first_name = '$first_name',last_name='$last_name'";
       $updateStatement .= " WHERE customer_id = $custID;";
       $this->result = @$this->dbConnection->query($updateStatement);
       if(!$this->result)
       {
               die('Could not update records in the Sakila Database: ' .
                       $this->dbConnection->error);
       }
       
       return $this->dbConnection->affected_rows;
    }
    
    public function fetchCustomerID($row)
    {
       return $row['customer_id'];
    }

    public function fetchCustomerFirstName($row)
    {
       return $row['first_name'];
    }

    public function fetchCustomerLastName($row)
    {
       return $row['last_name'];
    }
    
    public function fetchAddressID($row)
    {
        return $row['address_id'];
    }

    public function fetchAddress1($row)
    {
        return $row['address'];
    }

    public function fetchAddress2($row)
    {
        return $row['address2'];
    }
}

?>
