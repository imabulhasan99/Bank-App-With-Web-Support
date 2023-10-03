<?php 
namespace App; 
use App\User;
use App\Database;
class Withdraw {
    private $userid; 
    private $db;
    private $trans_type = "deposit";
    private $totalBalance = 0;
    public function __construct() {
        $this->db = new Database();
        $this->userid = new User();
    }

    public function availableBalance() {
        $CurrentUserId = $this->userid->UserId();
        $balanceCheckSql = "SELECT amount FROM transactions WHERE user_id = :user_id AND trans_type = :trans_type";
        $balanceCheckstmt = $this->db->prepare($balanceCheckSql);
        $balanceCheckstmt->bindParam(":user_id", $CurrentUserId);
        $balanceCheckstmt->bindParam(":trans_type", $this->trans_type);
        $balanceCheckstmt->execute();
        $balances = $balanceCheckstmt->fetchAll();
        
        foreach ($balances as $balance) {
            $this->totalBalance += $balance["amount"];
        }

        return $this->totalBalance;
    }

    public function checkAmount( $amount ){
        return $amount;
    }


}



