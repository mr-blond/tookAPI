<?php
$app->post('/test', function() use ($app) {
    
});

$app->get('/test', function() use ($app) {
    $response= array();
    
    for($i = 0 ; $i<8 ;$i++){
        $response[$i]['title'] = 'title ' .$i;
        $response[$i]['content'] = 'content from ' .$i;
    }
     echoRespnse(200, $response);
});


 
