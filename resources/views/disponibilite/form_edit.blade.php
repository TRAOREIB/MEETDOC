<html>
    <head>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="col-sm-10" style="margin-top: 0px">
            <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Enregistrer un Medecin </h3>
        </div>
        <br>


        @foreach($medecin as $med)
        <form class="" role="form" method="POST" action=" {{url('medecin',[$med->id])}} " enctype="application/x-www-form-urlencoded" >
            {{ method_field('PUT')}}
            {{ csrf_field() }}

            <div class="card col-sm-7 offset-2">  
                <div class="card-header">Patient</div>
                <div class="card-body">

                    <div class="row">
                        <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="nom" id="libelle"  value="{{$med->nom}}">
                            <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                        </div> 
                    </div>

                    <br>

                    <div class="row">
                        <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="prenom" id="prenom"  value="{{$med->prenom}}">
                            <small class="text-danger">{{ $errors->first('prenom',':message') }}</small> 
                        </div> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="titre" class="offset-sm-1 col-sm-2">Titre *</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="titre" id="prenom"  value="{{$med->titre}}">
                            <small class="text-danger">{{ $errors->first('titre',':message') }}</small> 
                        </div> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="specialite" class="offset-sm-1 col-sm-2">Specialite *</label> 
                        <select class="col-sm-5 form-control" name="idspecialite"> 
                            @foreach($specialite as $spec) 
                            @if($spec->idspecialite==$idspecialite)
                            <option value="{{$spec->idspecialite}}" selected="secected">{{$spec->libelle}}</option>
                            @else
                            <option value="{{$spec->idspecialite}}">{{$spec->libelle}}</option>
                            @endif 
                            @endforeach
                            <small class="text-danger">{{ $errors->first('idspecialite',':message') }}</small> 
                        </select> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="an" class="offset-sm-1 col-sm-2">Année d'exercice *</label> 
                        <div class="col-sm-3"> 
                            <input type="number" class="form-control" name="anexercice" id="prenom"  value="{{$med->anexercice}}">
                            <small class="text-danger">{{ $errors->first('anexercice',':message') }}</small> 
                        </div> 
                    </div>
                    <br>


                    <div class="row">
                        <label for="titrehonorifique" class="offset-sm-1 col-sm-2">Titre Honorifique *</label> 
                        <div class="col-sm-8"> 
                            <input type="text" class="form-control" name="titrehonorifique" id="prenom"  value="{{$med->titrehonorifique}}">
                            <small class="text-danger">{{ $errors->first('titrehonorifique',':message') }}</small> 
                        </div> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="exerce" class="offset-sm-1 col-sm-2">Etat d'exercice *</label> 
                        <div class="col-sm-4"> 
                            <input type="text" class="form-control" name="exerce" id="sexe"  value="{{$med->exerce}}">
                            <small class="text-danger">{{ $errors->first('exerce',':message') }}</small> 
                        </div> 
                    </div>
                    <br>


                    <div class="row">
                        <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                        <div class="col-sm-4"> 
                            <input type="text" class="form-control" name="telephone" id="sexe"  value="{{$med->telephone}}">
                            <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                        </div> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                        <div class="col-sm-5"> 
                            <input type="text" class="form-control" name="email" id="email"  value="{{$med->email}}">
                            <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                        </div> 
                    </div>
                    <br>

                    <div class="row">
                        <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                        <div class="col-sm-5"> 
                            <input type="text" class="form-control" name="pays" id="sexe"  value="{{$med->pays}}">
                            <small class="text-danger">{{ $errors->first('pays',':message') }}</small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                        <div class="col-sm-5"> 
                            <input type="text" class="form-control" name="ville" id="type"  value="{{$med->ville}}">
                            <small class="text-danger">{{ $errors->first('ville',':message') }}</small> 
                        </div> 
                    </div>
                    <br>



                </div>
            </div>      
            <br>

            @endforeach

            <br>
            <div class="row offset-4 ">
                <div class="col-sm-0">  
                    <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                </div>
                <div class="col-sm-3">  
                    <input type="button"  value="Annuler" onclick="location.href = '{{url('medecin')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                </div>
            </div>

        </form>

    </body>
</html>



