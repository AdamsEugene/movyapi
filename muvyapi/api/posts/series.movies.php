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

    $create->movieName  = $data->movieName;
    $create->category   = $data->category;
    $create->language   = $data->language;
    $create->movieFile  = $data->movieFile;
    $create->coverPic  = $data->coverPic;

    // create series movie
    if($create->createSeries()){
        echo json_encode(
            array('message' => 'Series Created')
        );
    }else{
        echo json_encode(
            array('message' => 'Series Not Created')
        );
    }
?>
