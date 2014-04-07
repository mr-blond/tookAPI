<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpenStreetMap
 *
 * @author Julien
 */
class OpenStreetMap {
    //put your code here
    
    function __construct() {  
         /*require_once 'DbConnect.php';
       
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();*/
    }
    
    
    
    function getCityName($x,$y){
        $url = 'http://nominatim.openstreetmap.org/reverse?format=xml&lat='.$x.'&lon='.$y.'&zoom=18&addressdetails=1';
        
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        

        $result = curl_exec($ch);

        if (!$result) {
          exit('cURL Error: '.curl_error($ch));
        }
        
        $XML = simplexml_load_string($result);
        
        return ((string)$XML->addressparts->city);
         
    }
}
