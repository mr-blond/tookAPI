<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TwitterConnect
 *
 * @author Julien
 */

require_once('vendor/j7mbo/twitter-api-php/TwitterAPIExchange.php');
class TwitterConnect {
    
    function __construct() {
        $settings = array(
            'oauth_access_token' => "123111706-69N1bSMiDYfliGPeeDXULQabbYgtjgUxztbirt03",
            'oauth_access_token_secret' => "S7NoPaqg7iROvMCACbS6p14FyFtnWIOvzGjBMd4bXljl7",
            'consumer_key' => "vT47noOaMuIwW36zg54HHw",
            'consumer_secret' => "pNUdbOjrzQiPGKdIvy99FLYK2zHCoNTckNCn3Jyjc"
        );
        
    }
    
    public function getTweet(){
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=j7mbo';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $response = $twitter->setGetfield($getfield)
                            ->buildOauth($url, $requestMethod)
                            ->performRequest();
        var_dump(json_decode($response));
    }
}
