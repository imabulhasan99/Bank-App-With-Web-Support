<?php 
namespace App;
use PDO;
use PDOException;
class Database {

    private $dbhost = "localhost";
    private $dbname = "bankapp";
    private $dbusername = "root";    
    private $dbpass = "";
    private $connection;

    public function __construct() {

        try {
            $this->connection = new PDO("mysql:host=$this->dbhost;port=3306;dbname=$this->dbname", $this->dbusername, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           

        } catch (PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }


    }

    public function prepare($query){
        return $this->connection->prepare($query);
    }

}
