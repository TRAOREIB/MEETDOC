<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedecinRequest;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MedecinController extends Controller {

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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/medecinvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $med = $response->getBody();
        $medecin = json_decode("$med");
        return view("medecin.liste", compact("medecin"));
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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $spec = $response->getBody();
        $specialite = json_decode("$spec");
        return view("medecin.form_ajouter", compact("specialite"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedecinRequest $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/medecin", ["form_params" => [
                'token' => "$this->token",
                'idspecialite' => "$request->idspecialite",
                'nom' => "$request->nom",
                'prenom' => "$request->prenom",
                'name' => "$request->nom" . " " . $request->prenom,
                'telephone' => "$request->telephone",
                'titre' => "$request->titre",
                'titrehonorifique' => "$request->titrehonorifique",
                'anexercice' => "$request->anexercice",
                'exerce' => "En exercice",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'email' => "$request->email",
                'idstructure' => 1,
                'identifiant' => "$request->identifiant",
                'password' => "$request->password",
                'profil' => "Medecin",
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
        //

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/medecinvue/$id", ["headers" => $this->headers]);
        $med = $response->getBody();
        $medecin = json_decode("$med");

        $repspecialite = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $spec = $repspecialite->getBody();
        $specialite = json_decode("$spec");

        foreach ($medecin as $med) {
            $idspecialite = $med->idspecialite;
        }
        //  echo $medecin->nom;
        return view("medecin.form_edit", compact("medecin", "specialite", "idspecialite"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedecinRequest $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/medecin/$id?token=$this->token", ["form_params" => [
                'nom' => "$request->nom",
                'prenom' => "$request->prenom",
                'telephone' => "$request->telephone",
                'titre' => "$request->titre",
                'titrehonorifique' => "$request->titrehonorifique",
                'anexercice' => "$request->anexercice",
                'exerce' => "$request->exerce",
                'pays' => "$request->pays",
                'ville' => "$request->ville",
                'email' => "$request->email",
                'passeport' => "$request->passeport",
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
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/medecin/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
