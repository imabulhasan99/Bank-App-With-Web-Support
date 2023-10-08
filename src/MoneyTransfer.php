<?php 
namespace App;
use App\Database;
use App\Withdraw;
class MoneyTransfer {
    private $db;
    private $user;
    private $date;
    private $withdraw;

    public function __construct(Database $db, User $user) {
        $this->db = $db;
        $this->user = $user;
        $this->withdraw = new Withdraw();
    }
    public function makeTransfer( string $recipientemail, string $recipientname, int $amount ) {
        $currentUserId = $this->user->UserId();

        $this->date = date("Y-m-d H:i:s");

        $this->withdraw->availableBalance();

        if( ! $this->withdraw->availableBalance() >> $amount ){
            
            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to Transfer due to sufficiant balance</div>';

        }

        $transferQuery = "INSERT INTO moneytransfer(user_id, recipient_name, recipient_email, amount, date) 
        VALUES (:user_id,:recipient_name,:recipient_email,:amount,:date)";
        $transferQuerystmt = $this->db->prepare( $transferQuery );
        $transferQuerystmt->bindParam(":user_id", $currentUserId) ;
        $transferQuerystmt->bindParam(":recipient_name", $recipientname) ;
        $transferQuerystmt->bindParam(":recipient_email", $recipientemail) ;
        $transferQuerystmt->bindParam(":amount", $amount);
        $transferQuerystmt->bindParam(":date", $this->date);
        
        if( $transferQuerystmt->execute() ){
            echo '<div class="bg-green-400 text-white p-2 rounded text-center">Money Transfer Successfull</div>';
        }else {
            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to Transfer</div>';
        }





    }
}