<?php 
namespace App;
use App\Database;


class User {
  private $name;
  private $email;
  private $password;
  private $userType = "customer";
  private $loginoption;
  private $db;


 public function __construct() {
    $this->db = new Database();
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


  public function UserLogin( string $email, string $password, string $loginoption) {
    $this->email = $email;
    $this->password = md5($password);
    $this->loginoption = $loginoption;

    if( empty($this->email && $this->password) ) {
        echo '<div class="bg-red-400 text-white p-2 rounded text-center">Email and password are required.</div>';
    }

    $loginQuery = "SELECT * FROM users WHERE email = :email AND password = :password AND user_type = :loginoption";
    $loginstmt  = $this->db->prepare($loginQuery);
    $loginstmt->bindParam(":email", $this->email);
    $loginstmt->bindParam(":password", $this->password);
    $loginstmt->bindParam(":loginoption", $this->loginoption);
    $loginstmt->execute();
    
    if( $loginstmt->rowCount() === 1 ){
        session_start();
        $_SESSION['email'] = $this->email;
        if( $this->loginoption == "customer") {
            header('Location: customer/dashboard.php');
            exit();
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