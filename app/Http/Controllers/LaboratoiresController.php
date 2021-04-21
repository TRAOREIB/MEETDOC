<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaboratoireRequest;
use Validator; 
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LaboratoiresController extends Controller {

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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboratoires",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $labo = $response->getBody();
        $laboratoires = json_decode("$labo");
        return view("laboratoire.liste", compact("laboratoires"));
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
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $struct = $response->getBody();
        $structure = json_decode("$struct");
        return view("laboratoire.form_ajouter", compact("structure"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoireRequest $request) {

      
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/laboratoires?token=$this->token", ["form_params" => [
                'nom' => "$request->nom",
                'idstructure' => "$request->idstructure",
                'telephone' => "$request->telephone",
                'bp' => "$request->bp",
                'email' => "$request->email",
                'heureouverture' => "$request->heureouverture",
                'heurefermeture' => "$request->heurefermeture",
                'joursouvres' => "$request->joursouvres",
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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboratoires/$id", ["headers" => $this->headers]);
        $labo = $response->getBody();
        $laboratoire = json_decode("$labo");


        $respstruct = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $struct = $respstruct->getBody();
        $structure = json_decode("$struct");

//        foreach ($laboratoire as $labo) {
        $idstructure = $laboratoire->idstructure;
//             echo $idstructure;
//        }
//
        return view("laboratoire.form_edit", compact("laboratoire", "structure", "idstructure"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoireRequest $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/laboratoires/$id?token=$this->token", ["form_params" => [
                'nom' => "$request->nom",
                'idstructure' => "$idstructure",
                'telephone' => "$request->telephone",
                'bp' => "$request->bp",
                'email' => "$request->email",
                'heureouverture' => "$request->heureouverture",
                'heurefermeture' => "$request->heurefermeture",
                'joursouvres' => "$request->joursouvres",
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
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/laboratoires/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
