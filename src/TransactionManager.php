<?php 
namespace App;
use App\Withdraw;
use App\MoneyTransfer;
use App\Database;
use App\User;
class TransactionManager {

    
     private $withdraw;
     private $transfer;
     private $user;


   public function __construct() {
        $this->withdraw = new Withdraw();
        $this->transfer = new MoneyTransfer( new Database(), new User() );
        $this->user = new User();

   }

   public function AvilableBalance() {
     return $this->withdraw->availableBalance();
   }

  
   public function BalanceWithdraw( $amount ){
     return $this->withdraw->makeWithdraw( $amount );
   }

   public function CurrentUserData(){
    return $this->user->CurrentUserData();
   }

   public function BalanceTransfer( string $email, string $name, int $amount ){
    return $this->transfer->makeTransfer( $email, $name, $amount ); 
   }


}