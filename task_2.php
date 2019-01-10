<?php

class UserRepository {   
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('mysql:dbname=database;host=localhost', 'admin', 'admin');
    }

    public function getUsersByName($userName) {
        return $this->pdo->query("SELECT * FROM users WHERE 
                                 status ='a' AND user_name = '" . $userName . "'")->fetchAll();
    }

    public function getUsersByEmail($email) {
        return $this->pdo->query("SELECT * FROM users WHERE 
                                status ='a' AND email = '" . $email . "'")->fetchAll();
    }

    public function getUserById($userId) {
        return $this->pdo->query("SELECT * FROM users WHERE 
                                status ='a' AND user_id = '" . $user_id . "'")->fetchAll();
    }

    public function getUsers_by_name($name) {
        return getUsersByName($name);
    }

    public function getUsers($email, $userName, $userId) {
        $users = $this->getUsersByName($userName);
       return array_merge($this->getUserById($userId), 
                          $this->getUsersByName($user_name), 
                          $this->getUsersByEmail($email));
    }

}

?>
