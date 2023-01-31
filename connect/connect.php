<?php

namespace db;

use PDO;
use PDOException;

class connect {

    public string $localhost = 'localhost';
    public string $user = 'root';
    public string $password = '';
    public string $database = 'rtcresume';

    public function connect(){
        $localhost = $this->localhost;
        $database = $this->database;
        $user = $this->user;
        $password = $this->password;
        try {
            $dsn = "mysql:host=$localhost;dbname=$database;charset=utf8";
		        $connect = new PDO($dsn, $user, $password);
		        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $connect;
        } catch(PDOException $e) {
          return "Connection failed: " . $e->getMessage();
        }
    }

}

?>