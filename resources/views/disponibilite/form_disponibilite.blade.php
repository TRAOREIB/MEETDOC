@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<html>
    <head>
<!--        <script src="{{asset('js/bootstrap.min.js')}}"></script>-->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/dataTables.min.js')}}"></script>
        <!--<script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>-->
        <!--<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>-->

        <!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
        <link rel="stylesheet" href="{{asset('css/dataTables.min.css')}}">
        <!--<link rel="stylesheet" href="{{asset('css/all.css')}}">-->
    </head>
    @endsection

    <body>
        <div style="margin-left: 20px">
            @if(session('profil')=='Medecin')
            <label class=""><b>{{session('titre')}} {{session('nom')}}</b></label>
            @else
            <label class=""><b>{{$titre}} {{$nom}} {{$prenom}}</b></label>
            @endif
        </div>
        <div class="col-md-10 col-sm-10 col-xs-12 ">

            <form class="was-validated" novalidate role="form" method="POST" action=" {{url('disponibilite')}} " enctype="application/x-www-form-urlencoded" >
                {{ csrf_field() }}
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>ENREGISTRER LA DISPONIBILITE </b></div> 

                        <div class="row">
                            <label for="specialite" class="offset-sm-1 col-sm-3">Choisir la Structure </label> 
                            <div class="col-sm-6 col-md-6 col-xs-12"> 
                                <select class="form-control" name="idstructure">
                                    <option> Choisir</option>
                                    @foreach($medecinstructure as $medstruct)
                                    <option value="{{$medstruct->idstructure}}">{{$medstruct->nomstructure}}</option>
                                    @endforeach
                                    <small class="invalid-feedback">{{ $errors->first('idstructure',':message') }}</small> 
                                </select> 
                            </div>
                        </div><br>
                        
                        <div class="row">
                            <label for="jour" class="offset-sm-1 col-sm-3">Date *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="date" class="form-control" name="jour" id="libelle"  required>
                                <small class="invalid-feedback">{{ $errors->first('jour',':message') }}</small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="heure" class="offset-sm-1 col-sm-3">Heure Debut *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="time" class="form-control" name="heuredebut" id="prenom"   required>
                                <small class="invalid-feedback">{{ $errors->first('heuredebut',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-3">Heure Fin *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="time" class="form-control" name="heurefin" id="prenom"  required>
                                <small class="invalid-feedback">{{ $errors->first('heurefin',':message') }}</small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="nombre" class="offset-sm-1 col-sm-3">Nombre de Consultations *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="number" class="form-control" name="nbrconsultation" id="prenom"  value="1" required>
                                <small class="invalid-feedback">{{ $errors->first('heurefin',':message') }}</small> 
                            </div> 
                        </div>

                        <div class="ln_solid"></div>

                        <div class="item form-group">  
                            <div style="margin:auto">
                                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = '{{url('disponibilite')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>

                    </div>

                    <input type="hidden" value="{{$idmedecin}}" name="idmedecin">
                 
                    <input type="hidden" value="{{$nom}}" name="nom">
                    <input type="hidden" value="{{$prenom}}" name="prenom">
                    <input type="hidden" value="{{$titre}}" name="titre">
                    <input type="hidden" value="{{$request}}" name="request">

                    </form>
                </div> 

                <div class="col-sm-12">
                    <div class="x_content">  
                        <div class="x_panel">
                            <div class="x_title"><b>LISTE DES DISPONIBILITES </b></div> 
                            <div class="table-responsive">
                            <table class="table table-striped col-sm-12 col-xs-12 " id="table">
                                <thead>
                                    <tr style="background-color:#2a6496;color: #FFFFFF;">
                                        <th>Jour Disponible</th>
                                        <th>Heure Debut</th>
                                        <th>Heure Fin</th>
                                        <th>Nombre Consultation</th>
                                        <th>Retirer</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($disponible as $dispo)
                                    <tr>
                                        <td>{{ $dispo->jourdispo }}</td>
                                        <td>{{ $dispo->heuredebut }}</td>
                                        <td>{{ $dispo->heurefin }}</td>
                                        <td>{{ $dispo->nbrconsultation }}</td>



                                        <td title="Disponibilite">
                                            <form method="POST" action="{{ route('disponibilite.destroy', [$dispo->iddispo]) }}">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$idmedecin}}" name="idmedecin">
                                                <input type="hidden" value="{{$idstructure}}" name="idstructure">
                                                <input type="hidden" value="{{$nom}}" name="nom">
                                                <input type="hidden" value="{{$prenom}}" name="prenom">
                                                <input type="hidden" value="{{$titre}}" name="titre">
                                                <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Retrait">

                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach     
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
               
                </div>     
                </body>
                </html>

                <script>
                    $(document).ready(function () {
                    $('#table').DataTable();
                    });

                </script>

                @endsection


