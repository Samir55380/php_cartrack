<?php 

class Customers{
    //Customer model
    private $conn;
    private $table = 'public.customers';

    //Model properties
    public $customer_id;
    public $company_name;
    public $contact_name;
    public $contact_title;
    public $address;
    public $city;
    public $region;
    public $postal_code;
    public $country;
    public $phone;
    public $fax;
    

    public function __construct($db){
        $this->conn = $db;
    }


    //The following functions should be separated from model class. However, as this is a small example of an api i've decided
    //to create database functions at the same file as the model

    public function get_one_customer(){
        /**
        * Returns one customers
        */
        $query = 'SELECT * From '  . $this->table .  ' WHERE customer_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->customer_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(count($row)!=0){
            $this->customer_id = $row['customer_id'];
            $this->company_name = $row['company_name'];
            $this->contact_name = $row['contact_name'];
            $this->contact_title = $row['contact_title'];
            $this->address = $row['address'];
            $this->city = $row['city'];
            $this->region = $row['region'];
            $this->postal_code = $row['postal_code'];
            $this->country = $row['country'];
            $this->phone = $row['phone'];
            $this->fax = $row['fax'];
            return TRUE;
        }
        else{
            return FALSE;
        }
        /*
        $this->customer_id = $row['customer_id'];
        $this->company_name = $row['company_name'];
        $this->contact_name = $row['contact_name'];
        $this->contact_title = $row['contact_title'];
        $this->address = $row['address'];
        $this->city = $row['city'];
        $this->region = $row['region'];
        $this->postal_code = $row['postal_code'];
        $this->country = $row['country'];
        $this->phone = $row['phone'];
        $this->fax = $row['fax'];
        */
        //return $stmt;
    }


    public function get_customers(){
        /**
        * Returns all customers
        */
        $query = 'SELECT * From '  . $this->table .  '';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function create($required){
        /**
        * Creates an customer
        */
        $query = 'INSERT INTO ' . $this->table . ' VALUES (:customer_id, :company_name, :contact_name, :contact_title, :address, :city, :region, :postal_code, :country, :phone, :fax)';
        
        $stmt = $this->conn->prepare($query);
        
        //Sanitize all inputs
        foreach($required as $field) 
        {
            $this->$field=htmlspecialchars(strip_tags($this->$field));
        }
        
        //bind all params
        foreach($required as $field) 
        {
            $stmt->bindParam(":$field", $this->$field);
        }

        if($stmt->execute()){
            return true;
        }
        return false;
    }



    public function update($required){
        /**
        * Updates an customer
        */

        $query = 'UPDATE '  . $this->table .  ' SET company_name = :company_name, contact_name = :contact_name, contact_title = :contact_title, address = :address,
                         city = :city, region = :region, postal_code = :postal_code, country = :country, phone = :phone, fax = :fax WHERE customer_id = :customer_id';
        
        $stmt = $this->conn->prepare($query);
        //Sanitize all inputs
        foreach($required as $field) 
        {
            $this->$field=htmlspecialchars(strip_tags($this->$field));
        }       
        //bind all params
        foreach($required as $field) 
        {
            $stmt->bindParam(":$field", $this->$field);
        }
        
        if($stmt->execute()){
            return true;
        }
        return false;
    }


    public function delete_customer(){
        /**
        * Deletes an customer
        */
        $query = 'DELETE FROM ' . $this->table . ' WHERE customer_id = :customer_id';
        $stmt = $this->conn->prepare($query);
        $this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
        // bind values
        $stmt->bindParam(":customer_id", $this->customer_id);
        if($stmt->execute()){
            return true;
        }
        return false;
    }

}