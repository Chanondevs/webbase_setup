<?php 

class Controller {
    private $db;

    public function __construct(){
        $part = str_replace("controllers", "", __DIR__);
        require_once($part . "/vendor/autoload.php");

        // load file .env
        $dotenv = Dotenv\Dotenv::createImmutable($part);
        $dotenv->load();

        require_once($part . "config/database.php");

        $localhost = $_ENV['HOST'];
        $user = $_ENV['USERNAME'];
        $password = $_ENV['PASSWORD'];
        $database = $_ENV['DATABASENAME'];

        $database = new Database($localhost, $user, $password, $database);

        $this->db = $database->connection();
    }

    public function connection(){
        return $this->db;
    }
}
?>