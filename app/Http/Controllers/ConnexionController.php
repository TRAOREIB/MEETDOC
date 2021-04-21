<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class ConnexionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client;
    //protected $token;
    protected $headers;
    protected $examen;

    public function __construct() {

        //$this->token = '';
        $this->headers = [
            'Authorization' => 'Bearer ',
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);
    }

    public function index() {

//        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/auth/login",
//                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
//        );
//        
        return view("connexion.login");
    }

    public function connexion(Request $request) {
 
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/auth/login", ["form_params" => [
                'identifiant' => "$request->login",
                'password' => "$request->password"]
        ]);
        
        $connect = $response->getBody();
        $connexion = json_decode("$connect");
      
       
        foreach ($connexion as $con) {
            $token = $con;
            break;
        }
        
        if($token=="Unauthorized"){
            $message="Vos informations de Connexion ne sont pas correctes";
            return view("connexion.login",compact("message"));
        }
   
//        //mettre la cle dans une variable session
        //  session(['token' => "$token"]);
        Session::start();
        Session::put("token", $token);

        //si la connexion du client passe
        $responseUser = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/user?token=$token&identifiant=$request->login");
        $user = $responseUser->getBody();
        $monuser = json_decode("$user");

        //echo $monuser;
        foreach ($monuser as $use) {
            $profil = $use->profil;
            $nom = $use->name;
            $titre = $use->titre;
            $identifiant = $use->identifiant;
        }
        // Mettre les informations du client dans des variables sessions
        Session::put("nom", $nom);
        Session::put("profil", $profil);
        Session::put("titre", $titre);
        Session::put("identifiant", $identifiant);

        if ($profil == "Patient") {
            $responsePatient = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/monpatient?token=$token&identifiant=$request->login");
            $pat = $responsePatient->getBody();
            $monpatient = json_decode("$pat");

            foreach ($monpatient as $pati) {

                $idpatient = $pati->idpatient;
                $nompatient = $pati->nom;
                $prenompatient = $pati->prenom;
                $telephone = $pati->telephone;
            }
            session::put("idpatient", $idpatient);
            session::put("nompatient", $nompatient);
            session::put("prenompatient", $prenompatient);
            session::put("telephone", $telephone);
        }

        if ($profil == "Medecin") {
            $responsePatient = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/monmedecin?token=$token&identifiant=$request->login");
            $med = $responsePatient->getBody();
            $monmedecin = json_decode("$med");

            foreach ($monmedecin as $medi) {

                $idmedecin = $medi->idmedecin;
                $nommedecin = $medi->nom;
                $prenommedecin = $medi->prenom;
                $titre = $medi->titre;
              //  $idstructure = $medi->idstructure;
            }
            session::put("idmedecin", $idmedecin);
            session::put("nommedecin", $nommedecin);
            session::put("prenommedecin", $prenommedecin);
            session::put("titre", $titre);
          //  session::put("idstructure", $idstructure);
        }

        //    echo session("token");
        // appel du controller pour la prise du compte
        //  $gerertoken=new tokenController(); 
        return view('tableaubord.liste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }
    
    public function deconnecte(){
        session::forget("nom");
        session::forget("profil");
        session::forget("titre");
        session::forget("identifiant");
        session::forget("idpatient");
        session::forget("token");
        return view("connexion.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
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
        
    }

}
