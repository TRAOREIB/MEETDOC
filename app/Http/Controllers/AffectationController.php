<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AffectationController extends Controller
{
    
    protected $client;
    protected $token;
    protected $headers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->token = session("token");
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];
        $this->client = new Client(["http://127.0.0.1/api-meetdoc/public"]);
    }
    
    public function index(Request $request)
    {
        if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $idmedecin=$request->idmedecin;
        $nom=$request->nom;
        $prenom=$request->prenom;
        $specialite=$request->specialite;
        $titre=$request->titre;
       //selection des structures
        $response = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/structure",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );    
        $struct = $response->getBody();
        $structure = json_decode("$struct");
        
          // selection de la liste des medecins par structure
         $respaffect = $this->client->request('GET', "http://127.0.0.1/api-meetdoc/public/api/strmedecinvue/$idmedecin",
                ['query' => ['actif' => 'true'], 'headers' => $this->headers]
        );    
        $affect = $respaffect->getBody();
        $listeaffectation = json_decode("$affect");
        return view("medecin.affectation", compact("structure","listeaffectation","idmedecin","nom","prenom","titre","specialite"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $idmedecin=$request->idmedecin;
        $idstructure=$request->idstructure;
        
         $response = $this->client->request('POST', "http://127.0.0.1/api-meetdoc/public/api/affectation?token=$this->token", ["form_params" => [
                'idmedecin' => "$idmedecin",
                'idstructure' => "$idstructure",
                'actif' => 'true']
        ]);
        return $this->index($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if(session("token")=="Unauthorized"){
            return view("connexion.login");
        }
        
        $response = $this->client->request('PUT', "http://127.0.0.1/api-meetdoc/public/api/affectation/$id?token=$this->token", ["form_params" => ['actif' => 'false']]);
        return $this->index($request);
    }
}
