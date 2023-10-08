<?php 
namespace App\Admin;
use App\User;
use App\Database;

class Customers {
    private $userinfo;
    private $database;
    private $customerId;
    public function __construct() {
        $this->userinfo = new User();
        $this->database = new Database();
    }


    public function customerRegister( string $name, string $email, string $password ) {
        $this->userinfo->UserRegister($name, $email, $password);
    }


    public function fetchAllCustomers(){
        $sql = "SELECT * FROM users";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function customerDetailsTransaction( int $customerid ){
        $this->customerId = $customerid;
        //Fetch User Name 
        $userSql = "SELECT name FROM users WHERE id = :user_id";
        $stmt = $this->database->prepare($userSql);
        $stmt->bindParam(":user_id", $this->customerId);
        $stmt->execute();
        if( $stmt->rowCount() > 0){
            $userName = $stmt->fetchAll();
        }

        //Fetch Transaction
            $customerDetailsTransactionsql = "SELECT * FROM moneytransfer WHERE user_id = :user_id";
            $customerDetailsTransactionstmt = $this->database->prepare($customerDetailsTransactionsql);
            $customerDetailsTransactionstmt->bindParam(":user_id", $this->customerId);
            $customerDetailsTransactionstmt->execute();
            $datas = $customerDetailsTransactionstmt->fetchAll();
            return[
                "data" => $datas,
                "name" => $userName,
            ] ;
           

    }
}