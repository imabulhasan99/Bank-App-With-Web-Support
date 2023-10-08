<?php 
namespace App; 
use App\User;
use App\Database;
class Withdraw {
    private $userid; 
    private $db;
    private $trans_type = "deposit";
    private $trans = 'withdraw';
    private $totalBalance = 0;
    private $totalDeposit = 0;
    private $totalWithdraw = 0;
    private $useralldata;
    private $transDate; 
    
    public function __construct() {
        $this->db = new Database();
        $this->userid = new User();
    }

    public function availableBalance() {
        $currentUserId = $this->userid->UserId();
     
        // Calculate the total amount from the moneytransfer table for the current user
        $totalMoneyTransferSql = "SELECT SUM(amount) AS total_moneytransfer_amount FROM moneytransfer WHERE user_id = :user_id";
        $totalMoneyTransferStmt = $this->db->prepare($totalMoneyTransferSql);
        $totalMoneyTransferStmt->bindParam(":user_id", $currentUserId);
        $totalMoneyTransferStmt->execute();
        $totalMoneyTransfer = $totalMoneyTransferStmt->fetchColumn();
      
        // Calculate the total deposit and withdrawal from the transactions table
        $balanceCheckSql = "SELECT transactions.amount AS transaction_amount, transactions.trans_type
        FROM transactions
        WHERE transactions.user_id = :user_id";
        $balanceCheckstmt = $this->db->prepare($balanceCheckSql);
        $balanceCheckstmt->bindParam(":user_id", $currentUserId);
        $balanceCheckstmt->execute();
        $balances = $balanceCheckstmt->fetchAll();
    
        foreach ($balances as $balance) {
            if ($balance['trans_type'] === 'deposit') {
                $this->totalDeposit += $balance['transaction_amount'];
            } elseif ($balance['trans_type'] === 'withdraw') {
                $this->totalWithdraw += $balance['transaction_amount']; 
            }
        }
    
       
        $this->totalBalance = $this->totalDeposit - $this->totalWithdraw - $totalMoneyTransfer;
    
        return $this->totalBalance;
    }
    
//Withdraw Functionality For withdraw page
   public function makeWithdraw( int $amount ) {

        if ($this->availableBalance() > $amount) {
          

            $this->availableBalance();
            $CurrentUserId = $this->userid->UserId();
            $this->transDate = date("Y-m-d H:i:s");
            $withDrawSql = "INSERT INTO transactions(user_id, amount, trans_type, trans_date) 
               VALUES (:userid, :amount, :transactype, :transdate)";
    
            $withDrawSqlstmt = $this->db->prepare($withDrawSql);
            $withDrawSqlstmt->bindParam(":userid", $CurrentUserId); 
            $withDrawSqlstmt->bindParam(":amount", $amount); 
            $withDrawSqlstmt->bindParam(":transactype", $this->trans); 
            $withDrawSqlstmt->bindParam(":transdate", $this->transDate);
    
            if ($withDrawSqlstmt->execute()) {
                echo '<div class="bg-green-400 text-white p-2 rounded text-center">Withdraw Successful</div>';
            } else {
                echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to add Withdraw</div>';
            }
        }  else {
            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Sorry, you dont have enough balance</div>';
        } 
    } 
    
//Money Transfer Data for Dashboard Page


}


  



