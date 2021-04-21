<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisponibiliteRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DisponibiliteController extends Controller {

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
        return view("disponibilite.liste", compact("medecin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        if (session("token") == "Unauthorized") {
            return view("connexion.login");
        }

        $nom = $request->nom;
        $prenom = $request->prenom;
        $titre = $request->titre;
        $idmedecin = $request->idmedecin;
        $idstructure = $request->idstructure;
        if ((session('idmedecin')) != null) {
            $idmedecin = session("idmedecin");
        }

        // la liste des structures du medecin
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/strmedecinvue/$idmedecin",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $medstruct = $response->getBody();
        $medecinstructure = json_decode("$medstruct");


        if (session("profil") == "Medecin") {
            $idmedecin = session("idmedecin");
            $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite",
                    ['query' => ['actif' => 'true', 'idmedecin' => $idmedecin], 'headers' => $this->headers]
            );
        } else {


            $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/specialite",
                    ['query' => ['actif' => 'true', 'idmedecin' => $request->idmedecin], 'headers' => $this->headers]
            );
        }
        $spec = $response->getBody();
        $specialite = json_decode("$spec");

        if (session('profil') == "Medecin") {
            $responsedispo = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/disponibilitevue/$idmedecin",
                    ['query' => ['actif' => 'true', 'id' => $idmedecin], 'headers' => $this->headers]
            );
        } else {
            $responsedispo = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/disponibilitevue/$request->idmedecin",
                    ['query' => ['actif' => 'true', 'id' => $request->idmedecin], 'headers' => $this->headers]
            );
        }
        $dispo = $responsedispo->getBody();
        $disponible = json_decode("$dispo");



        return view("disponibilite.form_disponibilite", compact("medecinstructure", "specialite", "nom", "prenom", "titre", "idmedecin", "idstructure", "disponible", "request"));
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

        if (session("profil") == "Medecin") {
            $request->idmedecin = session("idmedecin");
        }
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/disponibilite", ["form_params" => [
                'token' => "$this->token",
                'idstructure' => "$request->idstructure",
                'idmedecin' => "$request->idmedecin",
                'jour' => "$request->jour",
                'heuredebut' => "$request->heuredebut",
                'heurefin' => "$request->heurefin",
                'nbrconsultation' => "$request->nbrconsultation",
                'rang' => 0,
                'placerestant' => "$request->nbrconsultation",
                'actif' => 'true']
        ]);
        return $this->create($request);
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
        if (session("token") == "Unauthorized") {
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
    public function update(DisponibiliteRequest $request, $id) {
        
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
    public function destroy($id, Request $request) {
        //

        if (session("token") == "Unauthorized") {
            return view("connexion.login");
        }

        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        // $request->idmedecin=$id;
        return $this->create($request);
    }

}
