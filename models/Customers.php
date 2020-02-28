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


    public function read(){
        $query = 'SELECT * From '  . $this->table .  '';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function create(){

        $query = 'INSERT INTO ' . $this->table . ' VALUES (:customer_id, :company_name, :contact_name, :contact_title, :address, :city, :region, :postal_code, :country, :phone, :fax)';
        
        $stmt = $this->conn->prepare($query);
        
        $this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
        $this->company_name=htmlspecialchars(strip_tags($this->company_name));
        $this->contact_name=htmlspecialchars(strip_tags($this->contact_name));
        $this->contact_title=htmlspecialchars(strip_tags($this->contact_title));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->region=htmlspecialchars(strip_tags($this->region));
        $this->postal_code=htmlspecialchars(strip_tags($this->postal_code));
        $this->country=htmlspecialchars(strip_tags($this->country));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->fax=htmlspecialchars(strip_tags($this->fax));
        
        // bind values
        $stmt->bindParam(":customer_id", $this->customer_id);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":contact_name", $this->contact_name);
        $stmt->bindParam(":contact_title", $this->contact_title);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":region", $this->region);
        $stmt->bindParam(":postal_code", $this->postal_code);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":fax", $this->fax);
        

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    public function update(){
        $query = 'UPDATE '  . $this->table .  ' SET company_name = :company_name, contact_name = :contact_name, contact_title = :contact_title, address = :address,
                         city = :city, region = :region, postal_code = :postal_code, country = :country, phone = :phone, fax = :fax WHERE customer_id = :customer_id';
        
        $stmt = $this->conn->prepare($query);


        $this->customer_id=htmlspecialchars(strip_tags($this->customer_id));
        $this->company_name=htmlspecialchars(strip_tags($this->company_name));
        $this->contact_name=htmlspecialchars(strip_tags($this->contact_name));
        $this->contact_title=htmlspecialchars(strip_tags($this->contact_title));
        $this->address=htmlspecialchars(strip_tags($this->address));
        $this->city=htmlspecialchars(strip_tags($this->city));
        $this->region=htmlspecialchars(strip_tags($this->region));
        $this->postal_code=htmlspecialchars(strip_tags($this->postal_code));
        $this->country=htmlspecialchars(strip_tags($this->country));
        $this->phone=htmlspecialchars(strip_tags($this->phone));
        $this->fax=htmlspecialchars(strip_tags($this->fax));
        
        // bind values
        $stmt->bindParam(":customer_id", $this->customer_id);
        $stmt->bindParam(":company_name", $this->company_name);
        $stmt->bindParam(":contact_name", $this->contact_name);
        $stmt->bindParam(":contact_title", $this->contact_title);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":region", $this->region);
        $stmt->bindParam(":postal_code", $this->postal_code);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":fax", $this->fax);
        

        if($stmt->execute()){
            return true;
        }
        return false;
    }


    public function delete_customer(){
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
