<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class tokenController extends Controller {

    public $client;
    public $token;
    public $headers;

    public function __construct() {
        Session::start();
        $this->token =Session::get("token");
        echo $this->token;
        echo "- voila le deuxieme -";
        echo session("token");
        $this->headers = [
            'Authorization' => 'Bearer' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);
    }

}
