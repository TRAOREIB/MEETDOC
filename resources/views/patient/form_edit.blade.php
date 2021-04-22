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

        <form class="" role="form" method="POST" action=" {{url('patient',[$patient->idpatient])}} " enctype="application/x-www-form-urlencoded" >
            {{ method_field('PUT')}}
            {{ csrf_field() }}

            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>MODIFIER UN PATIENT </b></div> 

                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"  value="{{$patient->nom}}">
                                <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom"  value="{{$patient->prenom}}">
                                <small class="text-danger">{{ $errors->first('prenom',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="age" class="offset-sm-1 col-sm-2">Age *</label> 
                            <div class="col-sm-2 col-xs-12"> 
                                <input type="number" class="form-control" name="age" id="type"  value="{{$patient->age}}">
                                <small class="text-danger">{{ $errors->first('age',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="sexe" class="col-sm-2 offset-sm-1">Sexe *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control col-sm-4" name="sexe"> 
                                    <?php
                                    if ($patient->sexe == "Masculin") {
                                        echo "<option selected='selected'>Masculin</option>";
                                    } else {
                                        echo "<option>Masculin</option>";
                                    }
                                    if ($patient->sexe == "Feminin") {
                                        echo"<option selected='selected'>Feminin</option>";
                                    } else {
                                        echo"<option>Feminin</option>";
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="passeport" class="offset-sm-1 col-sm-2">Passeport *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="passeport" id="sexe"  value="{{$patient->passeport}}">
                                <small class="text-danger">{{ $errors->first('passeport',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="cnib" class="offset-sm-1 col-sm-2">Cnib *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="cnib" id="cnib"  value="{{$patient->cnib}}">
                                <small class="text-danger">{{ $errors->first('cnib',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  value="{{$patient->telephone}}">
                                <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe"  value="{{$patient->pays}}">
                                <small class="text-danger">{{ $errors->first('pays',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  value="{{$patient->ville}}">
                                <small class="text-danger">{{ $errors->first('ville',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="type"  value="{{$patient->email}}">
                                <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                            </div> 
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group ">
                        <div class="row" style="margin:auto">
                            <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                            <input type="button"  value="Annuler" onclick="location.href = '{{url('patient')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                        </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

@endsection 

