<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DbPositionHandler
 *
 * @author Julien
 */

class DbPositionHandler {
    //put your code here
    
    private $conn;
 
    function __construct() {
        require_once dirname(__FILE__) . './DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
    /**
     * Checking for duplicate city by city name
     * @param String $cityName email to check in db
     * @return integer
     */
    private function isCityExists($cityName) {
        $stmt = $this->conn->prepare("SELECT id_city from city WHERE city_name = ?");
        $stmt->bind_param("s", $cityName);
        $id = $stmt->execute();
        $stmt->store_result();
        $stmt->close();
        return  $id ;
    }
    
    /**
     * Creating new position
     * @param Float $user_id Identifiant utilisateur
     * @param Float $pos_x Position x
     * @param Float $pos_y Position y
     * @param Date $created_at Moment ou l'utilisateur était à cette endroit
     */
    public function createPosition($pos_x, $pos_y, $created_at) {
       
        $response = array();
        
        global $user_id;
        
         $osm = new OpenStreetMap();
    
        $cityName = $osm->getCityName($pos_x, $pos_y);
        
        if($this->isCityExists($cityName)) {
            
        
        }
        
        $stmt = $this->conn->prepare("INSERT INTO user_position(x, y, created_at ,user_id_user) values(?, ?,?,?)");
        $stmt->bind_param("ddsd", $pos_x,$pos_y,$created_at,$user_id);
       
        $result = $stmt->execute();

        $stmt->close();

        // Check for successful insertion
        if ($result) {
            // User successfully inserted
            return OK;
        } else {
            // Failed to create user
            return NOT_OK;
        }
        
 
        return $response;
    }
    
    /**
     * Creating new city
     
     * @param String $cityName nom de la ville crée
     */
    public function createCity($cityName) {
       
        $response = array();
       
        $stmt = $this->conn->prepare("INSERT INTO city(city_name) values(?)");
        $stmt->bind_param("s", $cityName);
       
        $result = $stmt->execute();

        $stmt->close();

        // Check for successful insertion
        if ($result) {
            // User successfully inserted
            return OK;
        } else {
            // Failed to create user
            return NOT_OK;
        }
        
 
        return $response;
    }
}
