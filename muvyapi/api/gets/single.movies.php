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

    // read query
    $result = $read->getSingleMovies();
    // get row count
    $num = $result->rowCount();

    // check if data
    if($num > 0){
        $read_arr = array();
        $read_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $read_item = array(
                'id' => $id,
                'Movie Name' => $movieName,
                'Language'   => $language,
                'Category'   => $category,
                'Movie'      => $movieFile,
                'Actors'     => $characters,
                'Cover Pic'   => $coverPic,
                'Subtitle'   => $subtitle,
                'Discription' => $discription,
                'Created At'  => $createdAt
            );

            // push to "data"
            array_push($read_arr['data'], $read_item);
        }
        // turn to json and output
        echo json_encode($read_arr);
    }else{
        // no read
        echo json_encode(array('message' => 'No read found'));
    }
?>