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

        <form class="was-validated" novalidate role="form" method="POST" action="{{ route('laboratoires.update',[$laboratoire->idlabo])}}" enctype="application/x-www-form-urlencoded" >
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>ENREGISTRER UN LABORATOIRE </b></div>  
                        <div class="row">
                            <label for="structure" class="offset-sm-1 col-sm-2">Structure </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <select class="form-control" name="idstructure">              
                                    @foreach($structure as $struct)
                                    @if($struct->idstructure==$idstructure)
                                    <option value="{{$struct->idstructure}}" selected="secected">{{$struct->nom}}</option>
                                    @else
                                    <option value="{{$struct->idstructure}}">{{$struct->nom}}</option>
                                    @endif
                                    @endforeach
                                    <small class="invalid-feedback">{{ $errors->first('idstructure',':message') }}</small> 
                                </select> 
                            </div></div><br>

                        <div class="row">
                            <label for="nom" class="offset-sm-1 col-sm-2">Nom </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="nom"  value="{{$laboratoire->nom}}" required>
                                <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="telephone"  value="{{$laboratoire->telephone}}" required>
                                <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="bp" class="offset-sm-1 col-sm-2">BP</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="text" class="form-control" name="bp" id="bp"  value="{{$laboratoire->bp}}" >
                                <small class="invalid-feedback">{{ $errors->first('bp',':message') }}</small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email</label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="type"  value="{{$laboratoire->email}}" required>
                                <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="heureouverture" class="offset-sm-1 col-sm-2 col-xs-12">Heure Ouverture</label> 
                            <div class="col-sm-2 col-xs-6"> 
                                <input type="time" class="form-control" name="heureouverture" id="heureouverture"  value="{{$laboratoire->heureouverture}}" required>
                                <small class="text-danger">{{ $errors->first('heureouverture',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="heurefermeture" class="offset-sm-1 col-sm-2 col-xs-12">Heure Fermeture</label> 
                            <div class="col-sm-2 col-xs-6"> 
                                <input type="time" class="form-control" name="heurefermeture" id="heurefermeture"  value="{{$laboratoire->heurefermeture}}" required>
                                <small class="text-danger">{{ $errors->first('heurefermeture',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="joursouvres" class="offset-sm-1 col-sm-2 ">Jours Ouvres</label> 
                            <div class="col-sm-6 col-xs-12"> 
                                <input type="text" class="form-control" name="joursouvres" id="joursouvres"  value="{{$laboratoire->joursouvres}}" required>
                                <small class="text-danger">{{ $errors->first('joursouvres',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div style="margin:auto">
                                <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = '{{url('laboratoires')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </body>
</html>
@endsection 


