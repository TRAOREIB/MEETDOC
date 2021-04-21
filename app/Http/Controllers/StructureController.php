<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StructureRequest;
use GuzzleHttp\Client;

class StructureController extends Controller {

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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $struct = $response->getBody();
        $structure = json_decode("$struct");
        return view("structure.liste", compact("structure"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
         $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $struct = $response->getBody();
        $structure = json_decode("$struct");
        return view("structure.form_ajouter", compact("structure"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StructureRequest $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/structure?token=$this->token", ["form_params" => [
                'nom' => "$request->nom",
                'responsable' => "$request->responsable",
                'idstructparent' => 1,
                'telephone' => "$request->telephone",
                'bp' => "$request->bp",
                'email' => "$request->email",
                'fax' => "$request->fax",
                'siteweb' => "$request->siteweb",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'rue' => "$request->rue",
                'specialite' => "$request->specialite",
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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure/$id", ["headers" => $this->headers]);
        $struct = $response->getBody();
        $str = json_decode("$struct");

        return view("structure.form_edit", compact("str"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StructureRequest $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/structure/$id?token=$this->token", ["form_params" => [
                'nom' => "$request->nom",
                'responsable' => "$request->responsable",
                'telephone' => "$request->telephone",
                'bp' => "$request->bp",
                'email' => "$request->email",
                'fax' => "$request->fax",
                'siteweb' => "$request->siteweb",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'rue' => "$request->rue",
                'specialite' => "$request->specialite",
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
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/structure/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
