<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbConnect
 *
 * @author Julien
 */
include_once 'Config.php';
class DbConnect {
    //put your code here
    private $conn;
 
    function __construct() {        
    }
 
    /**
     * Establishing database connection
     * @return database connection handler
     */
    function connect() {
        
 
        // Connecting to mysql database
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
        // Check for database connection error
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
 
        // returing connection resource
        return $this->conn;
    }
}
