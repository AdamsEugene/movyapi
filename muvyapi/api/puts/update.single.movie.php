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

    $update->movieName  = $data->movieName;
    $update->category   = $data->category;
    $update->language   = $data->language;
    $update->movieFile  = $data->movieFile;
    $update->coverPic  = $data->coverPic;
    $update->id         = $data->id;

    // update single movie
    if($update->UpdateSingle()){
        echo json_encode(
            array('message' => 'Movie updated')
        );
    }else{
        echo json_encode(
            array('message' => 'Movie Not updated')
        );
    }
?>
