<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

    include_once '../../config/database.php';
    include_once '../../models/Customers.php';
    include_once '../../helpers/helpers.php';

    // Create db object
    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();


    // Create customers object
    $customers = new Customers($db);


    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->customer_id)){
    // set customer property values
    $customers->customer_id = $data->customer_id;
 
    // create the customer
    if($customers->delete_customer()){
        echo $helper->response_json('200', 'INFO-MSG', 'Customer deleted.');
    }
    // if any kind of error
    else{
        echo $helper->response_json('503', 'ERR-MSG', 'Could not delete customer.');
    }
   
}else{
    echo $helper->response_json('400', 'ERR-MSG', 'Id mandatory.');
}