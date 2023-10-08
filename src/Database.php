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
            
            $this->connection = new PDO("mysql:host=$this->dbhost;port=3306;", $this->dbusername, $this->dbpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            $this->createDatabaseIfNotExists();

         
            $this->connection->exec("USE $this->dbname");

           
            $this->createTablesIfNotExist();

        } catch (PDOException $e) {
            die("Connection Failed: " . $e->getMessage());
        }
    }

    public function prepare($query){
        return $this->connection->prepare($query);
    }

    private function createDatabaseIfNotExists() {
        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";
        $this->connection->exec($sql);
    }

    private function createTablesIfNotExist() {
        $userTableSql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255),
            password VARCHAR(255),
            user_type VARCHAR(255)
        )";

        $transactionsTableSql = "CREATE TABLE IF NOT EXISTS transactions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            trans_type VARCHAR(255),
            amount INT,
            trans_date VARCHAR(255)
        )";

        $moneyTransferTableSql = "CREATE TABLE IF NOT EXISTS moneytransfer (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            recipient_name VARCHAR(255),
            recipient_email VARCHAR(255),
            amount INT,
            date VARCHAR(20)
        )";

        $this->connection->exec($userTableSql);
        $this->connection->exec($transactionsTableSql);
        $this->connection->exec($moneyTransferTableSql);
    }
}
