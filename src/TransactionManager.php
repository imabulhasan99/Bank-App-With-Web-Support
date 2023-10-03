<?php 
namespace App;
use App\Withdraw;
class TransactionManager {

    
    private $withdraw;


   public function __construct() {
        $this->withdraw = new Withdraw();
   }

   public function checkWithdrawAmount( int $amount ) {
    return $this->withdraw->checkAmount($amount);
   }
}