<?php
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Creates.php';

     // instantiate DB and connect
    $database = new Database;

    // connect DB
    $db = $database->connect();

    // instantiate create object
    $create = new Creates($db);

    // get the data
    $data = json_decode(file_get_contents('php://input'));

    $create->movieName     = $data->movieName;
    $create->discription   = $data->discription;
    // $create->createdAt     = $data->createdAt;

    // create single movie
    if($create->createDiscription()){
        echo json_encode(
            array('message' => 'Discription Created')
        );
    }else{
        echo json_encode(
            array('message' => 'Discription Not Created')
        );
    }
?>
