<?php 
namespace App;
use App\Withdraw;
class TransactionManager {

    
     private $withdraw;


   public function __construct() {
        $this->withdraw = new Withdraw();
   }

   public function AvilableBalance() {
     return $this->withdraw->availableBalance();
   }

   public function checkWithdrawAmount( int $amount ) {
     return $this->withdraw->checkWithdrawAmount( $amount );
   }

   public function BalanceWithdraw( $amount ){
     return $this->withdraw->makeWithdraw( $amount );
   }
}