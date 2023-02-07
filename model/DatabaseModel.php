<?php 

/**
 * @OA\Info(title="My First API", version="0.1")
 */

class DatabaseModel {

    private $conn;
    private $table;
    private $column;
    private $datacolumn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function select($table, $column, $datacolumn){
        try {
            $sql = "SELECT * FROM " . $table . " WHERE " . $column . " = " . $datacolumn;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function selectAll($table, $column){
        try {
            $sql = "SELECT * FROM " . $table . " ORDER BY " . $column . " DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e){
            return $e->getMessage();
        }
    }


}

?>