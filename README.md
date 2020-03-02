# Setup

 

- To be able to test the api, the developer has to ensure that the php+apache environment is running as expected. If the developer has no php+apache env "setuped", here is a mini local server to ensure the correct setup: https://www.mamp.info/en/

- After the installation is done, developer should store the repostitory content at document root folder "../MAMP/htdocs/" and then start mamp server. After this step, the api is ready for testing.

- If developer already has a environment created, just clone this repository to the document root folder.

**NOTE: Before invoking api, ensure that root folder of the project name is php-challenge. If no, re-name folder.**
 

# Api usage

 

This api contains 5 endpoints:

 

* Create a new customer;

* Update a customer;

* Get all customers;

* Get a specific customer;

* Delete a customer;

 

### Create new customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/php-challenge/api/v1/customers/create_customer.php"

Json request example (HTTP Verb: Post):

```json

{
	"customer_id": "4455",
	"company_name": "Barcelona",
	"contact_name": "Messi",
	"contact_title": "Sr",
	"address": "Calle 3",
	"city": "Barcelona",
	"region": "Barcelona",
	"postal_code": "3900-333",
	"country": "Spain",
	"phone": "12222222",
	"fax": "4566"
}

```

Json response example if the customer was created:

```json

{
	"INFO-MSG": "Customer was created successfully."
}

```

Json response example if any error occurs during insert process:

```json

{
	"ERR-MSG": "Could not create customer. Try later."
}

```

Json response example if any of the mandatory field are is not provide in request:

```json

{
	"ERR-MSG": "Data incomplete. Make sure that all parameters are being sent"
}

```



### Update customer

The route for this endpoint is: "http://machine_runnig_apache_ip:port/php-challenge/api/v1/customers/update_customer.php"

Json example (HTTP Verb: Patch):

```json

{
	"customer_id": "4455",
	"company_name": "Barcelona",
	"contact_name": "Ronaldo",
	"contact_title": "Sr",
	"address": "Calle 3",
	"city": "Barcelona",
	"region": "Barcelona",
	"postal_code": "3900-333",
	"country": "Spain",
	"phone": "12222222",
	"fax": "4566"
}
```

Json response example if the customer was updated:

```json

{
	"INFO-MSG": "Customer was updated successfully."
}

```

Json response example if any error occurs during update process:

```json

{
	"ERR-MSG": "Could not update customer. Try later."
}

```

Json response example if any of the mandatory field are is not provide in request:

```json

{
	"ERR-MSG": "Data incomplete. Make sure that all parameters are being sent"
}

```


### Get all customers

The route for this endpoint is (HTTP Verb: Get): "http://machine_runnig_apache_ip:port/php-challenge/api/v1/customers/get_customers.php"



### Get a specific customer

The route for this endpoint is (HTTP Verb: Get): "http://machine_runnig_apache_ip:port/php-challenge/api/v1/customers/get_one_customer.php?customer_id='customer_id'"

Json response example in case no user with provided id was found:

```json

{
	"ERR-MSG": "No customers found with id provided."
}

```

### Delete a customer

The route for this endpoint is (HTTP Verb: Delete): "http://machine_runnig_apache_ip:port/php-challenge/api/v1/customers/delete_customer.php?customer_id='customer_id'"

Json response example if customer was in fact deleted:

```json

{
	"INFO-MSG": "Customer deleted."
}

```

Json response example in case no user with provided id was found:

```json

{
	"ERR-MSG": "No customers found with id provided."
}

```