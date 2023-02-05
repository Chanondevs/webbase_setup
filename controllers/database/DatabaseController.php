<?php

require_once __DIR__ . '/../../controllers/Controller.php';

class DatabaseController extends Controller {

    private $db;
    private $result = null;

    public function __construct() {
        parent::__construct();

        $this->db = $this->connection();

        require_once __DIR__ . '/../../model/DatabaseModel.php';
    }

    public function select($table, $column, $datacolumn){
        // SELECT * FROM $table WHERE $column = $datacolumn
        try {
            $dbmodel = new DatabaseModel($this->db);
            $this->result = $dbmodel->select($table, $column, $datacolumn);
        } catch (PDOException $e){
            $this->result = $e->getMessage();
        }
        return $this->result;
    }

    public function selectAll($table, $column){
        // SELECT * FROM $table WHERE $column = $datacolumn
        try {
            $dbmodel = new DatabaseModel($this->db);
            $this->result = $dbmodel->selectAll($table, $column);
        } catch (PDOException $e){
            $this->result = $e->getMessage();
        }
        return $this->result;
    }

}

?>