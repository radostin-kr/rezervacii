<?php

class Db {
    public $connection;
    private $servername = "localhost";
    private $db = "reservations";
    private $db_username = "root";
    private $db_password = "";
    
    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->db_username, $this->db_password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "successfully connected to db";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$db = new Db();