<?php

$part = str_replace("controllers/User", "", __DIR__);
require_once($part . "/controllers/Controller.php");

class UserController extends Controller {

    private $db;
    private $result;

    public function __construct(){
        parent::__construct();
        $this->db = $this->connection();
    }

}

?>