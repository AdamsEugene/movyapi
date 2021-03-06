<?php
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Reads.php';
    
    // instantiate DB and connect

    $database = new Database();
    // connect DB
    $db = $database->connect();

    // instantiate read object
    $read = new Reads($db);

    // get id
    $read->id = isset($_GET['id']) ? $_GET['id'] : die();

    // get data
    $read->getOneSeasonNo();

    // read array
    $series_arr = array(
        'id' => $create->id,
        'Movie Name' => $read->movieName,
        'Series No' => $read->seasonNo,
        'Created At'  => $read->createdAt
    );

    // make json
    print_r(json_encode($series_arr));
?>