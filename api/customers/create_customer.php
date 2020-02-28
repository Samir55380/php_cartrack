<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    include_once '../../config/Database.php';
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

    // make sure data is not empty
    if(
        !empty($data->customer_id) &&
        !empty($data->company_name) &&
        !empty($data->contact_name) &&
        !empty($data->contact_title) &&
        !empty($data->address) &&
        !empty($data->city) &&
        !empty($data->region) &&
        !empty($data->postal_code) &&
        !empty($data->country) &&
        !empty($data->phone) &&
        !empty($data->fax)
    ){
    // set customer property values
    $customers->customer_id = $data->customer_id;
    $customers->company_name = $data->company_name;
    $customers->contact_name = $data->contact_name;
    $customers->contact_title = $data->contact_title;
    $customers->address = $data->address;
    $customers->city = $data->city;
    $customers->region = $data->region;
    $customers->postal_code = $data->postal_code;
    $customers->country = $data->country;
    $customers->phone = $data->phone;
    $customers->fax = $data->fax;
 
    // create the customer
    if($customers->create()){
        echo $helper->response_json('201', 'INFO-MSG', 'Customer was created successfully.');
    }
    // if any kind of error
    else{
        echo $helper->response_json('503', 'ERR-MSG', 'Could not create customer.');
    }
}
    else{
        echo $helper->response_json('400', 'ERR-MSG', 'Data incomplete. Make sure that all parameters are being sent');
}