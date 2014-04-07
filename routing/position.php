<?php


/**
 * Creating new userPosition in db
 * method POST
 * params - name
 * url - /addUserPosition/
 */
$app->post('/addUserPosition', 'authenticate', function() use ($app) {
    // check for required params
    verifyRequiredParams(array('X','Y','created_at'));

    $response = array();
    
    // reading post params
   
    $pos_x = $app->request->post('X');
    $pos_y = $app->request->post('Y');
    $created_at = $app->request->post('created_at');

    $db = new DbPositionHandler();
 
    $res = $db->createPosition( $pos_x, $pos_y,$created_at);
    
    if ($res == OK) {
        $response["error"] = false;
        $response["message"] = "Position added";
        echoRespnse(201, $response);
    } else {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred while registereing";
        echoRespnse(200, $response);
    }
    
    //regarder si l'utiisateur à poster des médias sur les réseaux sociaux
    
}); 

