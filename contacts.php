<?php
header("Content-Type:application/json");
require "data.php";


    $contacts = get_data();
    if(empty($contacts)) {
        response(200, "Data Not Found", NULL);
    } else {
        response(200, "Data Found", $contacts);
    }


function response($status, $status_message, $data) {
    header("HTTP/1.1 ".$status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['contacts'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
}

?>