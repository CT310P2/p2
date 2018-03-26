<?php
#creates the class with db con info
class Database
{

    private $host = "faure.cs.colostate.edu";
    private $db_name = "ewanlp";
    private $username = "ewanlp";
    private $password = "830570385";
    public $conn;

    public function dbConnection()
 {
     #sets the conn var to null
     $this->conn = null;
        try
  {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
  catch(PDOException $exception)
  {
            echo "Connection error: " . $exception->getMessage();
        }
         #returns a connection to the db
        return $this->conn;
    }
}
?>
