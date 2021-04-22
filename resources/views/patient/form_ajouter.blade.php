@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<head>
<!--        <script src="{{asset('js/bootstrap.js')}}"></script>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
</head>

@endsection 

<body>

    <form class="was-validated" role="form" method="POST" action=" {{url('patient')}} " enctype="application/x-www-form-urlencoded" >
        {{ csrf_field() }}

        <div class="col-md-10 col-sm-12 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>ENREGISTRER UN PATIENT </b></div> 
                
                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"  required>
                                <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom"  required>
                                <small class="text-danger">{{ $errors->first('prenom',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="age" class="offset-sm-1 col-sm-2">Age *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="number" class="form-control" name="age" id="type"  required>
                                <small class="text-danger">{{ $errors->first('age',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">

                            <label for="sexe" class="offset-sm-1 col-sm-2">Sexe *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control" name="sexe"> 
                                    <option>Masculin</option>
                                    <option>Feminin</option>
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="passeport" class="offset-sm-1 col-sm-2">Passeport </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="passeport" id="sexe"  value="">
                                <small class="text-danger">{{ $errors->first('passeport',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="cnib" class="offset-sm-1 col-sm-2">Cnib *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="cnib" id="cnib"  required>
                                <small class="text-danger">{{ $errors->first('cnib',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  required>
                                <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe"  required>
                                <small class="text-danger">{{ $errors->first('pays',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  required>
                                <small class="text-danger">{{ $errors->first('ville',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="type"  value="">
                                <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                            </div> 
                        </div>

                </div>
            </div> 
        </div>
        <div class="col-md-10 col-sm-12 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>INFORMATIONS DE CONNEXION </b></div> 

                    <div class="row">
                        <label for="ville" class="col-sm-3 control-label">Identifiant *</label> 
                        <div class="col-sm-5 col-xs-12"> 
                            <input type="text" class="form-control" name="identifiant" id="type"  required>
                            <small class="text-danger">{{ $errors->first('identifiant',':message') }}</small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="ville" class="col-sm-3 control-label">Mot de Passe *</label> 
                        <div class="col-sm-5 col-xs-12"> 
                            <input type="password" class="form-control" name="password" id="password"  required>
                            <small class="text-danger">{{ $errors->first('password',':message') }}</small> 
                        </div> 
                    </div>

                    <br>
                    <div class="row">
                        <label for="ville" class="col-sm-3 control-label">Confirmer Mot de Passe *</label> 
                        <div class="col-sm-5 col-xs-12"> 
                            <input type="password" class="form-control" name="confpassword" id="password"  required>
                            <small class="text-danger">{{ $errors->first('password',':message') }}</small> 
                        </div> 
                    </div>

                </div>
            </div>
        </div>

        <br>
        <div class="ln_solid"></div>
        <div class="item form-group col-sm-9 col-xs-12">
            <div class="row" style="margin:auto">
                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                <input type="button"  value="Annuler" onclick="location.href = '{{url('patient')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
            </div>
        </div>   
    </form>

</body>
</html>

@endsection


