<?php

namespace App\Helpers;


// use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**  * Class to handle all RESTful requests  */
class HttpHelper {
    // private $guzzle;
    // private $un;
    // private $pw;
    /**      * HttpHelper constructor.      */
    public function __construct()     {
        $this->guzzle = new Client(['base_uri' => env('URL')]);
    }
    /**      * @param $endpoint
     * @param $array - Array of data to be JSON encoded
     * @return mixed      */
    // public function post($endpoint, $array) {
    //     $token = session('token');
    //         $client = new \GuzzleHttp\Client();
    //         $response = $client->post(config('global.url').$this->cleanEndpoint($endpoint), [
    //         'headers' => [
    //             // 'Content-Type' => 'application/json',
    //             // 'X-Requested-With' => 'XMLHttpRequest',
    //             'Authorization' => "Bearer $token",
    //         ],
    //         'form_params' => $array
    //         ]);

    //     $body = json_decode($response->getBody());

    //     return $body;
    // }

    public function get($endpoint,$query=[]) {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(env('URL').$endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                // 'Authorization' => "Bearer $token",
            ],
            'query'=> $query
        ]);
        $body = json_decode($response->getBody()->getContents());

        return $body;
    }
}
