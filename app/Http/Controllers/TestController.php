<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller {

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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/patient",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $pat = $response->getBody();
        $patient = json_decode("$pat");
        return view("test.liste", compact("patient"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/examenvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $exam = $response->getBody();
        $examen = json_decode("$exam");
        $nom = $request->nom;
        $prenom = $request->prenom;
        $idpatient = $request->idpatient;
        $message = $request->message;

        if (session("idpatient") != null) {
            $patient = session("idpatient");
            $repexamen = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvue/$patient",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );
        } else {

            $repexamen = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvue/$idpatient",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );
        }
        $expat = $repexamen->getBody();
        $exampat = json_decode("$expat");
        $reprogramme = $request->reprogramme;
        $jour = $request->jour;

        if ($request->valeur == "lister") {
            return view("test.frm_rdvfinpatient", compact("examen", "exampat", "nom", "prenom", "idpatient", "reprogramme", "jour"));
        } else {
            return view("test.frm_rdvfin", compact("examen", "exampat", "nom", "prenom", "idpatient", "reprogramme", "jour","message"));
        }
    }

    public function listeexamenPatient(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        $request->valeur = "lister";
        return $this->create($request);
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
        
        //  echo $request->dispo;
        $donnees = explode("|", $request->exam);
        $idexamen = $donnees[1];
        $idpatient = $donnees[0];
        $idlabo = $donnees[2];

        if (session("idpatient") != null) {
            $idpatient = session("idpatient");
        }

        //message de succes de prise de disponibilite par defaut
        $message = "Votre rendez vous est pris avec succès";

       
        //verification pour voir si l'utilisateur n'a pas deja choisi la disponibilité
        try {
           
            $dispoexiste = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvue/$idpatient/$idexamen",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]);
            $dispo = $dispoexiste->getBody();
            $code = $dispoexiste->getStatusCode();
            $estdispo = json_decode("$dispo");
        } catch (RequestException $e) {
            $code = $e->getCode();
        }
      
        if (!empty($estdispo)) {
            $message = "Vous avez deja programmé un examen avec cette disponibilté";
            $request->message = $message;
            return $this->create($request);
        }
        
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/test", ["form_params" => [
                'token' => "$this->token",
                'idpatient' => "$idpatient",
                'idexamen' => "$idexamen",
                'idlabo' => "$idlabo",
                'reprogramme' => false,
                'jour' => "$request->jour",
                'actif' => 'true']
        ]);

        $request->idpatient = $idpatient;
        $request->message = $message;
        return $this->create($request);
//        echo $request->jour;
//        echo $request->reprogramme;
    }

    public function listexamen() {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboratoires", ["headers" => $this->headers]);
        $labo = $response->getBody();
        $laboratoire = json_decode("$labo");

        $repexamen = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $expat = $repexamen->getBody();
        $exampat = json_decode("$expat");

        return view("test.liste_consult_exam", compact("laboratoire", "exampat"));
    }

    public function rechercherexamen(Request $request) {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboratoires", ["headers" => $this->headers]);
        $labo = $response->getBody();
        $laboratoire = json_decode("$labo");

        $repexamen = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvueConsult/$request->idlabo/$request->jourtest",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $expat = $repexamen->getBody();
        $exampat = json_decode("$expat");

        return view("test.liste_consult_exam", compact("laboratoire", "exampat"));
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
    public function destroy($id, Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        // echo $id;
        // echo $request->idpatient;
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/test/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        //  $request->idpatient=$request->idpatient;
        return $this->create($request);
    }

}
