<?php 
    class Database {
        private $conn;


        public function connect(){
            $this->conn = null;
            //Open config file and parse data
            $this->settings = parse_ini_file("database.ini");

            try {
                $this->conn = new PDO("pgsql:host=".$this->settings["host"].";port=".$this->settings["port"].";dbname=".$this->settings["database"].";user=".$this->settings["user"].";password=".$this->settings["password"]."");
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOEXCEPTION $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
            return $this->conn;
        }

    }

