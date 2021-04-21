<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StrSpecialiteRequest;
use GuzzleHttp\Client;

class StrSpecialController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client;
    protected $token;
    protected $headers;

    public function __construct() {
        $this->token = session("token");
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);
    }

    public function index() {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $spec = $response->getBody();
        $specialite = json_decode("$spec");


        $respstruct = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $struct = $respstruct->getBody();
        $structure = json_decode("$struct");


        $repstrstruct = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialitestructurevue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $strspec = $repstrstruct->getBody();
        $strspecial = json_decode("$strspec");


        return view("strspecial.liste", compact("specialite", "structure", "strspecial"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
    }

    public function store(StrSpecialiteRequest $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/strspecial", ["form_params" => [
                'token' => "$this->token",
                'idstructure' => "$request->idstructure",
                'idspecialite' => "$request->idspecialite",
                'prix' => "$request->prix",
                'actif' => 'true']
        ]);
        return $this->index();
//        echo $request->idspecialite;
//        echo $request->idstructure;
    }

    public function enregistrer(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        //echo $request->idpatient;
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/strspecial/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
