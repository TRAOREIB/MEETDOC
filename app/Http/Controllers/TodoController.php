<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Model\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $client;
    public $response;

    public function __construct() {
        // $this->client=$cli;
        //  $this->client=new ClientInterface();
//       $client = new Client(); 
//      
//      // $this->client= json_api()->client($guzzleClient);
//       $res = $client->request('GET', 'http://localhost/API/public/api/todos');
//       echo $res->getStatusCode();
//      
//       echo $res->getBody();
        //  $this->response=$res;
    }

    public function index() {
        $token = '2myentB5PxRlKYtCFCoMiygzrkxoKnaoRDHzhQfQapuKmzEzaJzj2N1Vs9jf7HtbjmKwszRZ8OEdm3Yp';
        $client = new Client();

        $headers = [
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ];

        // $this->client= json_api()->client($guzzleClient);
//      $res = $client->request('GET', 'https://restcountries-v1.p.rapidapi.com/all',[
//        'headers' => ['x-rapidapi-key' => '4086af49aemsh7239fec59c4dc23p17551fjsn7be903f1ab73']]);

        $res = $client->request('GET', 'localhost/API/public/api/todos', ['headers' => $headers]);

        echo $res->getStatusCode();
        //  echo $res->getHeader('content-type');
        echo $res->getBody();

        //
//        $response = $this->client->query('todos');
//        echo $response->getStatusCode(); // 200
//        echo $response->getBody(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Todo $Todo) {
        $this->response = $this->client->createRecord($Todo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $response = $client->request('POST', 'localhost/API/public/api-meetdoc/api/examens', [
            'form_params' => [
                'libelle' => $request->libelle,
                'type' => $request->type
                
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->response = $this->client->read('todos', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    public function updateRec(Todo $Todo) {
        $this->response = $this->client->updateRecord($Todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->response = $this->client->delete('todos', $id);
    }

}
