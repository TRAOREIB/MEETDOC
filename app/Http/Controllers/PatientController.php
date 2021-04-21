<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\tokenController;
use GuzzleHttp\Client;
use Session;

class PatientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client;
    public $token;
    protected $headers;

    public function __construct() {

        $this->token = Session::get("token");
        $this->headers = [
            'Authorization' => 'Bearer' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);
    }

    public function construire() {
        
    }

    public function monToken() {
        echo session("token");
    }

    public function index() {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/patient",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $pat = $response->getBody();
        $patient = json_decode("$pat");
        return view("patient.liste", compact("patient"));
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
        
        return view("patient.form_ajouter");
    }

    public function inscription() {
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        return view("patient.form_inscription");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        //gestion du token pour les clients qui veulent s'inscrire comme abonné 
        if (isset($request->inscription)) {
            $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/auth/login", ["form_params" => [
                    'identifiant' => "ibrat",
                    'password' => "Farid2015"]
            ]);

            $connect = $response->getBody();
            $connexion = json_decode("$connect");

            foreach ($connexion as $con) {
                $token = $con;
                break;
            }
            
            Session::start();
            Session::put("token", $token);
        }

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/patient", ["form_params" => [
                'token' => session('token'),
                'nom' => "$request->nom",
                'prenom' => "$request->prenom",
                'name' => "$request->nom" . " " . $request->prenom,
                'telephone' => "$request->telephone",
                'age' => "$request->age",
                'sexe' => "$request->sexe",
                'cnib' => "$request->cnib",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'email' => "$request->email",
                'identifiant' => "$request->identifiant",
                'passeport' => "$request->passeport",
                'password' => "$request->password",
                'profil' => "Patient"
            ]
        ]);

        if (isset($request->inscription)) {
            session::forget("token");
            return view("patient.form_validecompte");
        }
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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/patient/$id", ["headers" => $this->headers]);
        $pat = $response->getBody();
        $patient = json_decode("$pat");
        return view("patient.form_edit", compact("patient"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $token = session('token');
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/patient/$id?token=$token", ["form_params" => [
                'nom' => "$request->nom",
                'prenom' => "$request->prenom",
                'telephone' => "$request->telephone",
                'age' => "$request->age",
                'sexe' => "$request->sexe",
                'cnib' => "$request->cnib",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'email' => "$request->email",
                'identifiant' => "$request->identifiant",
                'passeport' => "$request->passeport",
                'password' => "$request->password",
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
        
        $token = session('token');
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/patient/$id?token=$token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
