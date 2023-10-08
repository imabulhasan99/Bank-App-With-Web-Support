<?php 
namespace App\Admin;
use App\Admin\Customers;
class AdminHelper {

    public function createCustomerManagerObject(){
        return new CustomerManager() ;
    }
}