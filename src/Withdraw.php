<?php

namespace App;

class Withdraw {
    private $id;
    private $userId;

    public function __construct() {
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function getUserId() {
        return $this->userId;
    }

   
}
