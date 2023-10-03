<?php

namespace App;

use App\Database;
use App\Withdraw;

class Deposit {
    private $db;
    private string $transacType = 'deposit';
    private $transDate;
    private int $amount;
    private $userId;

    public function __construct() {
        $this->db = new Database();
    }

    public function makeDeposit(int $amount) {
        $this->amount = $amount;
        $this->transDate = date('Y-m-d H:i:s');

        // Detect User ID
        $userSql = "SELECT id FROM users WHERE email = :email";
        $userSqlstmt = $this->db->prepare($userSql);
        $userSqlstmt->bindParam(":email", $_SESSION['email']);
        $userSqlstmt->execute();
        $result = $userSqlstmt->fetchAll();
        if (!empty($result)) {
            $this->userId = $result[0]['id'];
        }

        // Insert Deposit Amount
        $depositSql = "INSERT INTO transactions(user_id, amount, trans_type, trans_date) 
            VALUES (:userid, :amount, :transactype, :transdate)";

        $depositSqlstmt = $this->db->prepare($depositSql);

        $depositSqlstmt->bindParam(":userid", $this->userId);
        $depositSqlstmt->bindParam(":amount", $this->amount);
        $depositSqlstmt->bindParam(":transactype", $this->transacType);
        $depositSqlstmt->bindParam(":transdate", $this->transDate);

        if ($depositSqlstmt->execute()) {
            echo '<div class="bg-green-400 text-white p-2 rounded text-center">Deposit Added Successfully</div>';
        } else {
            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to add Deposit</div>';
        }

       
        $withdraw = new Withdraw();
        $withdraw->setUserId($this->userId);
    }

    public function getUserId() {
        return $this->userId;
    }
}
