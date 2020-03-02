# Setup

 

- To be able to test the api, the developer has to ensure that the php+apache environment is running as expected. If the developer has no php+apache env "setuped", here is a mini local server to ensure the correct setup: https://www.mamp.info/en/

- After the installation is done, developer should store the repostitory content at document root folder "../MAMP/htdocs/" and then start mamp server. After this step, the api is ready for testing.

 

# Api usage

 

This api contains 5 endpoints:

 

* Create a new customer;

* Update a customer;

* Get all customers;

* Get a specific customer;

* Delete a customer;

 

### Create new customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/api/v1/customers/create_customer.php"

Json example:

```json

{

 

}

```

 

### Update customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/api/v1/customers/update_customer.php"

 

Json example:

```json

{

 

}

```

 

### Get all customers

The route for this endpoint is: "http://machine_runnig_apache_ip:port/api/v1/customers/get_customers.php"

 

Json example:

```json

{

 

}

```

 

### Get a specific customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/api/v1/customers/get_one_customer.php?customer_id='customer_id'"

 

 

### Delete a customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/api/v1/customers/delete_customer.php?customer_id='customer_id'"