<?php 
namespace App\Admin;
use App\Admin\Customers;
use App\Admin\Transactions;

class CustomerManager {
    private $customers;
    private $transaction;
    public function __construct() {
        $this->customers = new Customers();
        $this->transaction = new Transactions();
    }


    public function customerRegister( string $name, string $email, string $password ) {
        return $this->customers->customerRegister( $name, $email, $password );
    }

    public function fetchAllCustomers (){
        return $this->customers->fetchAllCustomers();
    }

    public function customerDetailsTransaction( int $customerid ){
        return $this->customers->customerDetailsTransaction( $customerid );
    }

    public function allCustomerTransaction(){
        return $this->transaction->allCustomerTransaction();
    }

}