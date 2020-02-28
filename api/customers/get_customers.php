<?php 

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/Customers.php';
    include_once '../../helpers/helpers.php';

    // Create db object
    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();


    // Create customers object
    $customers = new Customers($db);

    // Get customers query
    $result = $customers->read();
    
    // Get row count
    $num = $result->rowCount();

    // Check if there is any customers
    if($num > 0){
        $cusomers_array = array();
        $cusomers_array = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $customer = array(
                'customer_id' => $customer_id,
                'company_name' => $company_name,
                'contact_name' => $contact_name,
                'contact_title' => $contact_title,
                'address' => $address,
                'city' => $city,
                'region' => $region,
                'postal_code' => $postal_code,
                'country' => $country,
                'phone' => $phone,
                'fax' => $fax
            );
            array_push($cusomers_array, $customer);
        }

        //Convert to json
        echo json_encode($cusomers_array);


    }else{
        echo $helper->response_json('204', 'ERR-MSG', 'No customers found.');
    }