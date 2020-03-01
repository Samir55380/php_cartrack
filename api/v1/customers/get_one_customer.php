<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
 

    include_once '../../../config/database.php';
    include_once '../../../models/Customers.php';
    include_once '../../../helpers/helpers.php';
    include_once '../../../helpers/message_resource.php';

    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();
    $customers = new Customers($db);

    $customers->customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : die();

    $customers->get_one_customer();

    $customer = array(
        'customer_id' => $customers->customer_id,
        'company_name' => $customers->company_name,
        'contact_name' => $customers->contact_name,
        'contact_title' => $customers->contact_title,
        'address' => $customers->address,
        'city' => $customers->city,
        'region' => $customers->region,
        'postal_code' => $customers->postal_code,
        'country' => $customers->country,
        'phone' => $customers->phone,
        'fax' => $customers->fax
    );
    print_r(json_encode($customer));