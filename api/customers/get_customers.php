<?php 

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/database.php';
    include_once '../../models/Customers.php';
    include_once '../../helpers/helpers.php';
    include_once '../../helpers/message_resource.php';

    $database = new Database();
    $db = $database->connect();
    $helper = new Helpers();
    $customers = new Customers($db);

    $result = $customers->read();
    
    // Get row count
    $num = $result->rowCount();

    // Check if there is any customers
    if($num > 0)
    {
        $customers_array = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC))
        {
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
            array_push($customers_array, $customer);
        }
        //Convert to json
        echo json_encode($customers_array);


    }
    else
    {
        echo $helper->response_json($HTTP_NO_CONTENT, $ERROR_MESSAGE, 'No customers found.');
    }