<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LaboExamRequest;
use GuzzleHttp\Client;

class LaboExamController extends Controller {

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


        $respexam = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/examens",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $exam = $respexam->getBody();
        $examen = json_decode("$exam");


        $replabex = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboexamvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $labexam = $replabex->getBody();
        $laboexam = json_decode("$labexam");


        return view("laboexam.liste", compact("laboratoires", "examen", "laboexam"));
    }

    public function listeexamen() {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        $replabex = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/laboexamvue",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );
        $labexam = $replabex->getBody();
        $laboexam = json_decode("$labexam");


        return view("laboexam.listeexamen", compact("laboexam"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
    }

    public function store(LaboExamRequest $request) {
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }

        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/laboexam", ["form_params" => [
                'token' => "$this->token",
                'idlabo' => "$request->idlabo",
                'idexamen' => "$request->idexamen",
                'joursexam' => "$request->joursexam",
                'heuredebut' => "$request->heuredebut",
                'heurefin' => "$request->heurefin",
                'prix' => "$request->prix",
                'actif' => 'true']
        ]);
        return $this->index();
//        echo $request->idspecialite;
//        echo $request->idstructure;
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
    public function destroy($id) {

         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        //echo $request->idpatient;
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/laboexam/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
