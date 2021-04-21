<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpecialiteRequest;
use GuzzleHttp\Client;

class SpecialiteController extends Controller {

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
        return view("specialite.liste", compact("specialite"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        return view("specialite.form_ajouter");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialiteRequest $request) {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/specialite?token=$this->token", ["form_params" => [
                'libelle' => "$request->libelle",
                'actif' => 'true']
        ]);
        return $this->index();
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
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite/$id", ["headers" => $this->headers]);
        $spec = $response->getBody();
        $sp = json_decode("$spec");
        return view("specialite.form_edit", compact("sp"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialiteRequest $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/specialite/$id?token=$this->token", ["form_params" => [
                'libelle' => "$request->libelle",
                'actif' => 'true']
        ]);

        return $this->index();
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
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/specialite/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
