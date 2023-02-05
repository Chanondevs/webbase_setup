<?php

class Database {

    private $localhost;
    private $user;
    private $password;
    private $database;
    public $conn = null;

    public function __construct($localhost, $user, $password, $database){
        $this->localhost = $localhost;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function connection(){
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->localhost . ";
                dbname=". $this->database,
                $this->user,
                $this->password
            );
        } catch (PDOException $err){
            echo "Database not be connection " . $err->getMessage();
        }
        return $this->conn;
    }

}

?>