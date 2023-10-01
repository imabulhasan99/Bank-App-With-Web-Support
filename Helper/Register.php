<?php

namespace Helper;


class UserRegistration
{
    private $dataFile = 'Stroage/user.json';
    public function __construct()
    {
        if (!file_exists($this->dataFile)) {
            file_put_contents($this->dataFile, json_encode(['user' => []]));
        }
    }

    public function registerUser( string $email = null,  string $password = null ){
            $data = json_decode(file_get_contents($this->dataFile), true);
       
            $email = readline('Enter Your Email:');
            $password = readline('Enter Your Password:');

            $user = [
                'email'=> $email,   
                'password'=> $password,
                'user_type' => 'customer',
            ];
             $data['user'][] = $user;
            file_put_contents($this->dataFile, json_encode($data, JSON_PRETTY_PRINT));
            echo 'User Added Successfully';
    }
   

   
}
