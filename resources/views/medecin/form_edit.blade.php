@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<html>
    <head>
        <script src="{{asset('js/jquery.min.js')}}"></script>
<!--        <script src="{{asset('js/bootstrap.js')}}"></script>
      <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">-->
    </head>
    @endsection
    <body>

        @foreach($medecin as $med)
        <form class="was-validated" novalidate role="form" method="POST" action=" {{url('medecin',[$med->id])}} " enctype="application/x-www-form-urlencoded" >
            {{ method_field('PUT')}}
            {{ csrf_field() }}

            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>MODIFIER UN MEDECIN </b></div> 

                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"  value="{{$med->nom}}" required>
                                <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom"  value="{{$med->prenom}}" required>
                                <small class="text-danger">{{ $errors->first('prenom',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-2">Titre *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="titre" id="prenom"  value="{{$med->titre}}" required>
                                <small class="invalid-feedback">{{ $errors->first('titre',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="specialite" class="offset-sm-1 col-sm-2">Specialite *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="col-sm-7 form-control" name="idspecialite" required> 
                                    @foreach($specialite as $spec) 
                                    @if($spec->idspecialite==$idspecialite)
                                    <option value="{{$spec->idspecialite}}" selected="secected">{{$spec->libelle}}</option>
                                    @else
                                    <option value="{{$spec->idspecialite}}">{{$spec->libelle}}</option>
                                    @endif 
                                    @endforeach
                                    <small class="invalid-feedback">{{ $errors->first('idspecialite',':message') }}</small> 
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="an" class="offset-sm-1 col-sm-2">Année d'exercice *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="number" class="form-control" name="anexercice" id="prenom"  value="{{$med->anexercice}}" required>
                                <small class="invalid-feedback">{{ $errors->first('anexercice',':message') }}</small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="titrehonorifique" class="offset-sm-1 col-sm-2">Titre Honorifique *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="titrehonorifique" id="prenom"  value="{{$med->titrehonorifique}}" required>
                                <small class="invalid-feedback">{{ $errors->first('titrehonorifique',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="exerce" class="offset-sm-1 col-sm-2">Etat d'exercice *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="exerce" id="sexe"  value="{{$med->exerce}}" required>
                                <small class="invalid-feedback">{{ $errors->first('exerce',':message') }}</small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  value="{{$med->telephone}}" required>
                                <small class="invalid-feedback">{{ $errors->first('telephone',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="email"  value="{{$med->email}}" required>
                                <small class="invalid-feedback">{{ $errors->first('email',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe"  value="{{$med->pays}}" required>
                                <small class="invalid-feedback">{{ $errors->first('pays',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  value="{{$med->ville}}" required>
                                <small class="invalid-feedback">{{ $errors->first('ville',':message') }}</small> 
                            </div> 
                        </div>

                        @endforeach

                        <br>
                        <div class="ln_solid"></div>
                        <div class="row" style="margin:auto">
                            <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                            <input type="button"  value="Annuler" onclick="location.href = '{{url('medecin')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>

</body>
</html>
@endsection


