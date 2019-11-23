<?php
    // headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Search.php';
    
    // instantiate DB and connect

    $database = new Database();
    // connect DB
    $db = $database->connect();

    // instantiate search object
    $search = new Searchs($db);

    // get item
    $search->item = isset($_GET['item']) ? $_GET['item'] : die();

    // search query
    $result = $search->getcharacters();
    // get row count
    $num = $result->rowCount();

    // check if data
    if($num > 0){
        $search_arr = array();
        $search_arr['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $search_item = array(
                'id' => $id,
                'Movie Name' => $movieName,
                'Characters'   => $characters,
                'Created At'  => $createdAt
            );

            // push to "data"
            array_push($search_arr['data'], $search_item);
        }
        // turn to json and output
        echo json_encode($search_arr);
        echo $num;
    }else{
        // no search
        echo json_encode(array('message' => 'No search found'));
    }
?>