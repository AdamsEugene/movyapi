<?php
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Updates.php';

     // instantiate DB and connect
    $database = new Database;

    // connect DB
    $db = $database->connect();

    // instantiate update object
    $update = new Updates($db);

    // get the data
    $data = json_decode(file_get_contents('php://input'));

    $update->movieName      = $data->movieName;
    $update->seasonNo       = $data->seasonNo;   
    $update->id             = $data->id;

    // update single movie
    if($update->UpdateSeasonNo()){
        echo json_encode(
            array('message' => 'Season Number updated')
        );
    }else{
        echo json_encode(
            array('message' => 'Season Number Not updated')
        );
    }
?>
