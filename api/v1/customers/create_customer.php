<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
    include_once '../../../config/Database.php';
    include_once '../../../models/Customers.php';
    include_once '../../../helpers/helpers.php';
    include_once '../../../helpers/message_resource.php';

    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();
    $customers = new Customers($db);

    // get posted data
    $data = json_decode(file_get_contents("php://input"));

    $required = array('customer_id', 'company_name', 'contact_name', 'contact_title', 'address', 'city', 'region', 'postal_code', 'country', 'phone', 'fax');

    $error = false;

    //Validate that all required fields are not empty.
    foreach($required as $field) 
    {
        if (empty($data->$field)) 
        {
          $error = true;
        }
    }
      
    if ($error) 
    {
        echo $helper->response_json($HTTP_BAD_REQUEST, $ERROR_MESSAGE, 'Data incomplete. Make sure that all parameters are being sent');
    } 
    else 
    {
        foreach ($data as $key => $value) 
        {
            // set customer property values
            $customers->$key = $data->$key;
        }
        // create the customer
        if($customers->create($required))
        {
            echo $helper->response_json($HTTP_CREATED, $INFO_MESSAGE, 'Customer was created successfully.');
        }
        // if any kind of error
        else
        {
            echo $helper->response_json($HTTP_SERVER_UNAVAILABLE, $ERROR_MESSAGE, 'Could not create customer.');
        }
    }


