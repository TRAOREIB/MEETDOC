<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class RendezvousController extends Controller {

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
        return view("rendezvous.liste", compact("patient"));
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

        $nom = $request->nom;
        $prenom = $request->prenom;
        $idpatient = $request->idpatient;
        $message = $request->message;

        if (session("idpatient") != null) {
            $idpatient = session('idpatient');
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvue/$idpatient",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );

            $nom = session('nompatient');
            $prenom = session("prenompatient");
        } else {
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvue/$request->idpatient",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );
        }
        $rdv = $responserdv->getBody();
        $rendezvous = json_decode("$rdv");

        $responsedispo = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/disponibiliteallvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $dispo = $responsedispo->getBody();
        $disponible = json_decode("$dispo");

        if ($request->valeur == "lister") {
            return view("rendezvous.form_rdvpatient", compact("idpatient", "rendezvous", "nom", "prenom", "disponible", "request"));
        } else {
            return view("rendezvous.form_rdv", compact("idpatient", "rendezvous", "nom", "prenom", "disponible", "request", "message"));
        }
    }

    public function rendezvousPatient(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        $request->valeur = "lister";
        return $this->create($request);
    }

    public function listereprogramme(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        if (session('profil') == 'Medecin') {
            $idmedecin = session('idmedecin');

            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousreprogramme/$idmedecin",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );
            $rdv = $responserdv->getBody();
            $rendezvous = json_decode("$rdv");

            return view("rendezvous.form_reprogramme", compact("rendezvous", "idmedecin"));
        }
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
        $donnees = explode("|", $request->dispo);
        $idmedecin = $donnees[0];
        $idpatient = $donnees[1];
        $jourdispo = $donnees[2];
        $heuredebut = $donnees[3];
        $heurefin = $donnees[4];
        $iddispo = $donnees[5];
        $prix=$donnees[6];

        if (session("idpatient") != null) {
            $idpatient = session("idpatient");
        }

        //message de succes de prise de disponibilite par defaut
        $message = "Votre rendez vous est pris avec succès";

        //verification pour voir si l'utilisateur n'a pas deja choisi la disponibilité
        try {

            $dispoexiste = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousdispo/$idpatient/$iddispo",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]);
            $dispo = $dispoexiste->getBody();
            $code = $dispoexiste->getStatusCode();
            $estdispo = json_decode("$dispo");
        } catch (RequestException $e) {
            $code = $e->getCode();
        }

        if (!empty($estdispo)) {
            $message = "Vous avez deja programmé une consultation avec cette disponibilté";
            $request->message = $message;
            return $this->create($request);
        }

        //avant de prendre rendez vous, on gere le rang
        //selection de la disponibilite
        $responsedispo = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$iddispo",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]);
        $rdvdispo = $responsedispo->getBody();
        $rendezvousdispo = json_decode("$rdvdispo");

        // Traitement sur les placerestants et le nombre de consultations
        $i = 1;
        foreach ($rendezvousdispo as $rd) {
            if ($i == 7) {
                $nbrconsultation = $rd;
            }
            if ($i == 8) {
                $place = $rd - 1;
                $rang = $nbrconsultation - $place;
                break;
            }
            $i++;
            //   echo $rd;
//           
        }
        //verification pour s' assurer que la place exite
        if ($place >= 0) {
            //mettre à jour le nombre de place restant
            $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$iddispo?token=$this->token", ["form_params" => ['actif' => 'true', 'placerestant' => $place, 'rang' => $rang]]);

            $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/rendezvous", ["form_params" => [
                    'token' => "$this->token",
                    'idmedecin' => "$idmedecin",
                    'idpatient' => "$idpatient",
                    'iddisponibilite' => "$iddispo",
                    'jour' => "$jourdispo",
                    'effectue' => "false",
                    'paye' => "false",
                    'rang' => "$rang",
                    'reprogramme' => "false",
                    'symptomes' => "$request->symptomes",
                    'antecedants' => "$request->antecedants",
                    'examensfait' => "$request->examensfait",
                    'heuredebut' => "$heuredebut",
                    'heurefin' => "$heurefin",
                    'prix'=>"$prix",
                    'actif' => 'true']
            ]);
        } else {
            $message = "Il n'y a plus de places disponibles,Choisir une autre disponibilité";
            $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$iddispo?token=$this->token", ["form_params" => ['actif' => 'false']]);
        }
        $request->idpatient = $idpatient;
        $request->message = $message;
        return $this->create($request);
    }

    public function listeconsultation(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/medecinvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers, 'allow_redirects' => true]
        );

        $med = $response->getBody();
        $medecin = json_decode("$med");

        if (session('profil') == 'Medecin') {
            $idmedecin = session('idmedecin');
            $jour = date("yy-m-d");
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvueConsult/$idmedecin/$jour",
                    ['headers' => $this->headers]
            );
        } else {
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvue",
                    ['query' => ['actif' => 'true'], 'headers' => $this->headers]
            );
        }
        $rdv = $responserdv->getBody();
        $rendezvous = json_decode("$rdv");

        return view("rendezvous.liste_consult_med", compact("medecin", "rendezvous"));
    }

    public function rechercherconsultation(Request $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/medecinvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $med = $response->getBody();
        $medecin = json_decode("$med");

        if (session('profil') == "Medecin") {
            $idmedecin = session('idmedecin');
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvueConsult/$idmedecin/$request->jourrendezvous",
                    ['headers' => $this->headers]
            );
        } else {
            $responserdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvueConsult/$request->id/$request->jourrendezvous",
                    ['headers' => $this->headers]
            );
        }
        $rdv = $responserdv->getBody();
        $rendezvous = json_decode("$rdv");

        return view("rendezvous.liste_consult_med", compact("medecin", "rendezvous"));
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
    public function update(Request $request, $id) {
        
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
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $request->idpatient;
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/rendezvous/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        $rend = $response->getBody();
        $rendezdv = json_decode("$rend");

        $reponse = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvous/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        $resp = $reponse->getBody();
        $rendezvous = json_decode("$resp");
        
        $iddisponibilite=$rendezvous->iddisponibilite;
      
      //   selection des données de la disponibilite
        $repdispo = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$iddisponibilite",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]);
        $dispo = $repdispo->getBody();
        $madispo = json_decode("$dispo");

        // augmentation des places restantes apres le retarait d'un rendez-vous
        $nouvelleplace=$madispo->placerestant+1;
        
        //mise à jour de la place au niveau de disponibilite
        $responsedispo = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/disponibilite/$iddisponibilite?token=$this->token",
                ["form_params" => [
                        'placerestant' => $nouvelleplace,
                        'actif' => 'true']]);
        return $this->create($request);
    }

}
