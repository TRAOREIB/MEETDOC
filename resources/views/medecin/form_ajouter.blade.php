@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<html>
    <head>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!--<script src="{{asset('js/datatables.min.js')}}"></script>-->
        <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
        <!--<link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">-->
    </head>
    @endsection 
    <body>
        <!--        <div class="col-sm-10" style="margin-top: 0px">
                    <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Enregistrer un Medecin </h3>
                </div>
                <br>-->



        <form class="was-validated" novalidate role="form" method="POST" action=" {{url('medecin')}} " enctype="application/x-www-form-urlencoded" >
            {{ csrf_field() }}
          
            <div class="col-md-9 col-sm-9 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>INFORMATIONS DU MEDECIN </b></div>                   
                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"required="required"  value="">
                                <small class="invalid-feedback">{{ $errors->first('nom',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom" required="required"  value="">
                                <small class="text-danger">{{ $errors->first('prenom',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-2">Titre *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="titre" id="prenom" required="required"  value="">
                                <small class="text-danger">{{ $errors->first('titre',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">

                            <label for="titre" class="offset-sm-1 col-sm-2">Specialite *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control" name="idspecialite" required="required"> 
                                    @foreach($specialite as $spec)
                                    <option value="{{$spec->idspecialite}}">{{$spec->libelle}}</option>
                                    @endforeach
                                    <small class="text-danger">{{ $errors->first('idspecialite',':message') }}</small> 
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-2">Année d'exercice *</label> 
                            <div class="col-sm-3"> 
                                <input type="number" class="form-control" name="anexercice" id="prenom" required="required"  value="">
                                <small class="text-danger">{{ $errors->first('anexercice',':message') }}</small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="titrehonorifique" class="offset-sm-1 col-sm-2">Titre Honorifique </label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="titrehonorifique" id="prenom"  value="">
                                <small class="text-danger">{{ $errors->first('titrehonorifique',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="exerce" class="offset-sm-1 col-sm-2">Etat d'exercice </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="exerce" id="sexe"  value="">
                                <small class="text-danger">{{ $errors->first('exerce',':message') }}</small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  value="">
                                <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="email"  value="">
                                <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe" required="required"  value="">
                                <small class="text-danger">{{ $errors->first('pays',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  value="" required>
                                <small class="text-danger">{{ $errors->first('ville',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                    </div>
                </div>   
            </div>
            <br>
            <div class="col-md-9 col-sm-9 col-xs-12 ">
                <div class="x_content">
                    <div class="x_panel"> 
                        <div class="x_title"><b>INFORMATIONS DE CONNEXION</b></div>
                        <div class="row">
                            <label for="ville" class="col-sm-3 control-label">Identifiant *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="identifiant" id="type"  value="" required>
                                <small class="invalid-feedback">{{ $errors->first('identifiant',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="col-sm-3 control-label">Mot de Passe *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="password" class="form-control" name="password" id="password"  value="" required>
                                <small class="invalid-feedback">{{ $errors->first('password',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row ">
                            <label for="ville" class="col-sm-3 control-label">Confirmer Mot de Passe *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="password" class="form-control" name="confpassword" id="password"  value="" required>
                                <small class="invalid-feedback">{{ $errors->first('password',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                    </div>

                </div>
            </div>

            <br>
            <div class="col-md-7 col-sm-7 col-xs-12" style="margin: auto">
               
                    <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                    <input type="button"  value="Annuler" onclick="location.href = '{{url('examen')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
               
            </div>

            

        </form>

    </body>
</html>
@endsection 



