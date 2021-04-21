<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

include(app_path() . '\ligdicash\paygateway.php');

class PayeController extends Controller {

    //   

    public $setup;
    public $store;
    public $co;
    public $token;
    public $client;

    public function __construct(Request $request) {

        $this->token = session("token");
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);

        $prix = $request->prix;

        $this->setup = new \Pay_Setup();
        $this->store = new \Pay_Checkout_Store();

        //   echo "on est dans le constructeur";
        $this->setup->setApi_key("2PDFA81DJPBPZD3W5");
        $this->setup->setMode("live");
        $this->setup->setToken("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZF9hcHAiOiI0MzMiLCJpZF9hYm9ubmUiOiI2MzcxMCIsImRhdGVjcmVhdGlvbl9hcHAiOiIyMDIwLTEyLTE2IDE1OjMxOjM4In0.EGP4ET9H2LdZr4yFT4Mrprwb2sCtSakhoJi3XqBSA6c");

        //Configuration des informations de votre boutique/service
        $this->store->setName("Meetdocbf");
        $this->store->setWebsiteUrl("http://localhost/montest6/public");
        $this->store->setCancelUrl("http://localhost/montest6/public");
        $this->store->setCallbackUrl("http://localhost/montest6/public");
        $this->store->setReturnUrl("http://localhost/montest6/public/confirmation");

        //la commande
        $this->co = new \Pay_Checkout_Invoice($this->store, $this->setup);
        $this->co->addItem("consultation", 1, $prix, $prix, "Payement de la prise de rendez-vous");
        //achat de la commande à la facture
        $this->co->setTotalAmount($prix);
        $this->co->setDescription("Prise de rendez-vous avec le medecin");
    }

    public function payerConsultation(Request $request) {
        // démarrage du processus de paiement
        if ($request->type == "consultation") {
            $idrdv = $request->idrdv;
            session::put("idrendezvous", $idrdv);
            session::put("type", "consultation");
        }

        if ($request->type == "examen") {
            $idtest = $request->idtest;
            session::put("idrendezvous", $idtest);
            session::put("type", "examen");
        }
        if ($this->co->create()) {
            echo "Requête acceptée, alors on redirige le client vers la page de validation de paiement";
            echo $this->co->response_text;
            return Redirect::to($this->co->getInvoiceUrl());
            //  header("Location: " . $this->co->getInvoiceUrl());
        } else {
            echo "Requête refusée, alors on affiche le motif du rejet";
            echo $this->co->response_text;
        }
    }

    public function verifPayement() {
        // La méthode confirm returne true ou false dépendamment du statut du paiement
// Vous pouvez donc utiliser une instruction if - else et gérer le résultat comme bon vous semble
        if ($this->co->confirm()) {
            $resultat = "reussi";
            $operateur_id = $this->co->getOperator_id();
            $operateur_name = $this->co->getOperator_name();
            $tokentransaction = $this->co->getToken();
            $status = $this->co->getStatus();
        } else {
            $operateur_id = $this->co->getOperator_id();
            $operateur_name = $this->co->getOperator_name();
            $tokentransaction = $this->co->getToken();
            $resultat = "echoue";
            $status = $this->co->getStatus();
        }

        //Enregistrement des informations de la transaction 
        $token = session("token");
        $idpatient = session("idpatient");
        $nompatient = session("nompatient");
        $prenompatient = session("prenompatient");
        $telephone = session("telephone");
        $idrdv = session("idrendezvous");
        $type = session("type");

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/transaction?token=$this->token", ["form_params" => [
                'nom' => "$nompatient",
                'prenom' => "$prenompatient",
                'telephone' => "$telephone",
                'operateur' => "$operateur_name",
                'idpatient' => "$idpatient",
                'etat' => "$resultat",
                'status' => "$status",
                'token' => "$tokentransaction",
                'actif' => true
            ]
        ]);


        //selection du rendez vous en question
        if ($type == "consultation") {
            $resprdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/rendezvousvuepatient/$idrdv?token=$token", ["form_params" => ['actif' => 'true']]);
            $rendezv = $resprdv->getBody();
            $rdvselect = json_decode("$rendezv");
        }
        
        if($type=="examen"){
            $resprdv = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/testvue/$idpatient/$idrdv?token=$token", ["form_params" => ['actif' => 'true']]);
            $rendezv = $resprdv->getBody();
            $rdvselect = json_decode("$rendezv");
        }

        // Mettre à jour la colonne paye à vrai si la transaction a reussi
        if ($resultat == "reussi") {
            if ($type == "consultation") {
                $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/rendezvous/$idrdv?token=$token", ["form_params" => ['actif' => 'true', 'paye' => true]]);
                return view("confirmpayer.confirm", compact("rdvselect", "resultat", "type"));
            }
            if ($type == "examen") {
                $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/test/$idrdv?token=$token", ["form_params" => ['actif' => 'true', 'paye' => true]]);
                return view("confirmpayer.confirm", compact("rdvselect", "resultat", "type"));
            }
        } else {
            //retourner la page avec le message d'erreure
            return view("confirmpayer.confirm", compact("rdvselect", "resultat", "type"));
        }
    }

}
