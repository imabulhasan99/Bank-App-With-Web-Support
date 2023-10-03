<?php

namespace App;

use App\Database;
use App\User;

class Deposit {
    private $db;
    private string $transacType = 'deposit';
    private $transDate;
    private int $amount;
    public $userId;
    
    public function __construct() {
        $this->db = new Database();
        $this->userId = new User();
    }

    public function makeDeposit(int $amount) {
        $this->amount = $amount;
        $this->transDate = date('Y-m-d H:i:s');

        // Detect User ID
        $CurrentUserId = $this->userId->UserId();

        // Insert Deposit Amount
        $depositSql = "INSERT INTO transactions(user_id, amount, trans_type, trans_date) 
            VALUES (:userid, :amount, :transactype, :transdate)";

        $depositSqlstmt = $this->db->prepare($depositSql);

        $depositSqlstmt->bindParam(":userid", $CurrentUserId);
        $depositSqlstmt->bindParam(":amount", $this->amount);
        $depositSqlstmt->bindParam(":transactype", $this->transacType);
        $depositSqlstmt->bindParam(":transdate", $this->transDate);

        if ($depositSqlstmt->execute()) {
            echo '<div class="bg-green-400 text-white p-2 rounded text-center">Deposit Added Successfully</div>';
        } else {
            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to add Deposit</div>';
        }

    }

    public function getUserId() {
        return $this->userId;
    }
}
