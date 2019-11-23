<?php
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Deletes.php';

     // instantiate DB and connect
    $database = new Database;

    // connect DB
    $db = $database->connect();

    // instantiate delete object
    $delete = new Deletes($db);

    // get the data
    $data = json_decode(file_get_contents('php://input'));
  
    $delete->id             = $data->id;

    // delete single movie
    if($delete->Deleteseries()){
        echo json_encode(
            array('message' => 'Series deleted')
        );
    }else{
        echo json_encode(
            array('message' => 'Series Not deleted')
        );
    }
?>
