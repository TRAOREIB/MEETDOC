<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExamenRequest;
use GuzzleHttp\Client;

class ExamenController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $client;
    protected $token;
    protected $headers;
    protected $me;

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

        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/examens",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );

        $exam = $response->getBody();
        $examen = json_decode("$exam");
        return view("examen.liste", compact("examen"));
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
        return view("examen.form_ajouter");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamenRequest $request) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/examens?token=$this->token", ["form_params" => [
                'libelle' => "$request->libelle",
                'type' => "$request->type",
                'condiremplir' => "$request->condiremplir",
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
        
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/examens/$id", ["headers" => $this->headers]);
        $exam = $response->getBody();
        $ex = json_decode("$exam");
        return view("examen.form_edit", compact("ex"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamenRequest $request, $id) {
        
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/examens/$id?token=$this->token", ["form_params" => [
                'libelle' => "$request->libelle",
                'type' => "$request->type",
                'condiremplir' => "$request->condiremplir",
                'joursexam' => "$request->joursexam",
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
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/examens/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index();
    }

}
