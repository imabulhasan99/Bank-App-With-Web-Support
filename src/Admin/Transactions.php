<?php 
namespace App\Admin;
use App\Database;

class Transactions {
    private $database;
    public function __construct() {
        $this->database = new Database();
    }

    public function allCustomerTransaction(){
        $customerDetailsTransactionsql = "SELECT * FROM moneytransfer";
            $customerDetailsTransactionstmt = $this->database->prepare($customerDetailsTransactionsql);
     
            $customerDetailsTransactionstmt->execute();
            $datas = $customerDetailsTransactionstmt->fetchAll();
            return $datas;
    }
}