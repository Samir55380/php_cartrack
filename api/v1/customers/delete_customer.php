<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

    include_once '../../../config/database.php';
    include_once '../../../models/Customers.php';
    include_once '../../../helpers/helpers.php';
    include_once '../../../helpers/message_resource.php';

    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();
    $customers = new Customers($db);

    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $customers->customer_id = isset($_GET['customer_id']) ? $_GET['customer_id'] : die();

    $customers->get_one_customer();
    //Check if the customer id provided in fact exists
    if($customers->customer_id!=null)
    {
        if($customers->delete_customer())
        {
            echo $helper->response_json($HTTP_OK, $INFO_MESSAGE, 'Customer deleted.');
        }

    }
    else
    {
        echo $helper->response_json($HTTP_BAD_REQUEST, $ERROR_MESSAGE, 'No customers found with id provided.');
    }

