<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Methods: GET');

require_once __DIR__ . '/../controllers/database/DatabaseController.php';

$dbController = new DatabaseController();

$stmt = $dbController->selectAll("user","user_id");

if ($stmt) {
    $resultCount = $stmt->rowCount();
    if ($resultCount > 0){
        $response = array(
            'status' => 'success',
            'code' => '200',
            'message' => $resultCount . " column records",
            'data' => array()
        );
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $data = $row;
            array_push($response['data'], $data);
        }
        print_r(json_encode($response));
    }
} else {
    $response = array(
        'status' => 'error',
        'code' => '400',
        'message' => "column not found data",
        'data' => array()
    );
    print_r(json_encode($response));
}

?>