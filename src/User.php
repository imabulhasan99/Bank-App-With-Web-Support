<?php 
namespace App;
use App\Database;


class User {
  private $name;
  private $email;
  private $password;
  private $userType = "customer";
  private $userId;
  private $loginoption;
  private $db;


 public function __construct() {
    $this->db = new Database();
 }


  public function UserId(){


    $userSql = "SELECT id FROM users WHERE email = :email";
        $userSqlstmt = $this->db->prepare($userSql);
        $userSqlstmt->bindParam(":email", $_SESSION['email']);
        $userSqlstmt->execute();
        $result = $userSqlstmt->fetchAll();
        if (!empty($result)) {
            
            return $_SESSION['userid'] = $result[0]['id'];
            
        }


  }

        public function CurrentUserData() {
            $currentUserId = $this->UserId();

            $sql = "SELECT * FROM moneytransfer WHERE user_id = :user_id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_id", $currentUserId);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;
        }

        
        public function AllUserData() {
            
            $sql = "SELECT * FROM moneytransfer";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();

            return $data;
        }

        public function UserName(){


            $userSql = "SELECT name FROM users WHERE email = :email";
                $userSqlstmt = $this->db->prepare($userSql);
                $userSqlstmt->bindParam(":email", $_SESSION['email']);
                $userSqlstmt->execute();
                $result = $userSqlstmt->fetchAll();
                if (!empty($result)) {
                    
                    return $_SESSION['name'] = $result[0]['name'];
                    
                }


        }

        public function UserRegister( string $name , string $email, string $password ) {
                $this->name = $name;
                $this->email = $email;
                $this->password = $password;

                if( !empty($this->name && $this->email) ) {

                        
                            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

                                $this->password = md5($password);
                                $checkUserQuery = "SELECT * FROM users WHERE email = :email";
                                $stmt = $this->db->prepare($checkUserQuery);
                                $stmt->bindParam(':email', $this->email);
                                $stmt->execute();
                            
                                if( $stmt->rowCount() === 0 ){

                                    $inserQuery = "INSERT INTO users (name, email, password, user_type) VALUES(:name, :email, :password, :user_type)";
                                    $insertstmt = $this->db->prepare($inserQuery);
                                    $insertstmt->bindParam(":name", $this->name);
                                    $insertstmt->bindParam(":email", $this->email); 
                                    $insertstmt->bindParam(":password", $this->password);
                                    $insertstmt->bindParam(":user_type", $this->userType);
                                    if ($insertstmt->execute()) {
                                        echo '<div class="bg-green-400 text-white p-2 rounded text-center">Successfully Registered</div>';
                                    } else {
                                        echo '<div class="bg-red-400 text-white p-2 rounded text-center">Unable to register</div>';
                                    }

                                }else{
                                    echo '<div class="bg-red-400 text-white p-2 rounded text-center">Email already exits in Database</div>';
                                }



                        } else {
                            echo '<div class="bg-red-400 text-white p-2 rounded text-center">Email is not valid.</div>';
                        }

                



                }else{
                    echo '<div class="bg-red-400 text-white p-2 rounded text-center">All field are required</div>';
                }



        }


  public function UserLogin( string $email, string $password ) {
    $this->email = $email;
    $this->password = md5($password);
   

    if( empty($this->email && $this->password) ) {
        echo '<div class="bg-red-400 text-white p-2 rounded text-center">Email and password are required.</div>';
    }

    $loginQuery = "SELECT * FROM users WHERE email = :email AND password = :password";
    $loginstmt  = $this->db->prepare($loginQuery);
    $loginstmt->bindParam(":email", $this->email);
    $loginstmt->bindParam(":password", $this->password);
    $loginstmt->execute();

    if( $loginstmt->execute() ){
        $result = $loginstmt->fetchAll();
    }else{
        echo "Query Not oke";
    }
 

   if( $loginstmt->rowCount() === 1 ){
        session_start();
        $_SESSION['email'] = $this->email;
        if( $result[0]['user_type'] === "customer") {
            header('Location: customer/dashboard.php');
           
        }else{
            header('Location: admin/customers.php');
        }


    }else{
        echo "Not oke";
    }
     
}


    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../login.php');
        exit();
    }

  

}