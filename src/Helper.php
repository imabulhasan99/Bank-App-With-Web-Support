<?php 
namespace App;

use App\User;
use App\Deposit;
use App\Withdraw;
use App\TransactionManager;
use App\Admin\CustomerManager;

class Helper {


    public function createUserObject() {
        return new User();
    }

    public function createWithdrawObject() {
        return new Withdraw();
    }

    public function createTransactionManagerObject() {
        return new TransactionManager();
    }

    public function createDepositObject() {
        return new Deposit();
    }

    public function createCustomerforAdminObject(){
        return new CustomerManager();
    }


}