@extends('gentelella-master2.production.template')
@section('content')
@section('script')


<head>
    <!--<script src="{{asset('js/bootstrap.min.js')}}"></script>-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
<!--        <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>-->

    <!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <!--<link rel="stylesheet" href="{{asset('css/all.css')}}">-->

</head>

@endsection
@isset($message)
<div class="col-sm-6" style="margin-left: 250px">
    <div class="alert alert-success" >
        <label style="margin-left: 30px"> {{$message}}</label>
    </div>
</div>
<br>
@endisset
<br>
<body>

    <div class="col-sm-10" style="margin-top: 0px">
        <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Gerer les Rendez-Vous de {{$nom}} {{$prenom}} </h3>
    </div>
    <br>
    <form class="" method="POST" action=" {{url('rendezvous')}} " enctype="application/x-www-form-urlencoded" >
        {{ csrf_field() }}

        <div class="col-sm-12 col-xs-12">
            <br>
            <div class="col-md-8 col-sm-8 col-xs-12" style="background-color: blue;border-radius:30px;"><b><h2><label class="offset-1 col-xs-12" style="font-family:  sans-serif;color: white;"><i>Etape 1: Renseigner les informations complementaires</i></label></h2></b></div>
            <div class="x_content"> 
                <br>
                <div class="x_panel">
                    <div class="x_title"><b>INFORMATIONS COMPLEMENTAIRES </b></div> 

                    <div class="row">
                        <label for="antecedants" class="col-sm-2">Antecedants </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="antecedants" id="symptome"  value="">
                            <small class="text-danger">{{ $errors->first('antecedants',':message') }}</small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="symptomes" class="col-sm-2">Symptomes </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="symptomes" id="symptome"  value="">
                            <small class="text-danger">{{ $errors->first('symptomes',':message') }}</small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="examensfait" class="col-sm-2">Examens Fait </label> 
                        <div class="col-sm-9 col-xs-12"> 
                            <input type="text" class="form-control" name="examensfait" id="symptome"  value="">
                            <small class="text-danger">{{ $errors->first('examensfait',':message') }}</small> 
                        </div> 
                    </div>

                </div>
            </div> 
        </div>
        <br><br>


        
            <br>
            <div class="col-md-4 col-xs-12 col-sm-9" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 2: Choisir la disponibilité </i></label></h2></b>
            </div>
         
            <div class="table-responsive">               
                <table class="table table-striped table-condensed" id="table">
                    <br>
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Nom Structure</th>
                            <th>Specialite</th>
                            <th>Jour Disponible</th>
                            <th>Heure Debut</th>
                            <th>Heure Fin</th>
                            <th>Titre</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Prix (CFA)</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($disponible as $dispo)
                        <tr>
                            <td>{{ $dispo->nomstructure }}</td>
                            <td>{{ $dispo->libellespecialite }}</td>
                            <td>{{ $dispo->jourdispo }}</td>
                            <td>{{ $dispo->heuredebut }}</td>
                            <td>{{ $dispo->heurefin }}</td>
                            <td>{{ $dispo->titremedecin }}</td>
                            <td>{{ $dispo->nommedecin }}</td>
                            <td>{{ $dispo->prenommedecin }}</td>
                            <td>{{ $dispo->prix }}</td>

                            <td title="Disponibilite">
                                <button type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="{{$dispo->id}}|{{$idpatient}}|{{$dispo->jourdispo}}|{{$dispo->heuredebut}}|{{$dispo->heurefin}}|{{$dispo->iddispo}}|{{$dispo->prix}}" name="dispo">Choisir</button>
                                <input type="hidden" value="{{$dispo->id}}" name="idmedecin"> 
                                <input type="hidden" value="{{$nom}}" name="nom">
                                <input type="hidden" value="{{$prenom}}" name="prenom">
                                <input type="hidden" value="{{$dispo->prix}}" name="prix"> 

                            </td>

                        </tr>
                        @endforeach     
                    </tbody>
                </table>
            </div>   
       
      

    </form>

    <br><br>
    <div class="col-sm-10 col-xs-12 col-md-10">
        <br>
        <div class="" style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"><b><h4><i>LISTE DES RENDEZ-VOUS DE {{$nom}} {{$prenom}}</i></h4></b> </div>
        <div class="table-responsive">
            <table class="table table-striped table-condensed" id="table2">
                <thead>
                    <tr style="background-color:#2a6496;color: #FFFFFF;">
                        <th>Specialite</th>
                        <th>Titre</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Jour</th>
                        <th>Heure Debut</th>
                        <th>Heure Fin</th>
                        <th>Etat</th>
                        <th>Prix</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($rendezvous as $rdv)
                    <tr>
                        <td>{{ $rdv->specialitemedecin }}</td>
                        <td>{{ $rdv->titremedecin }}</td>
                        <td>{{ $rdv->nommedecin }}</td>
                        <td>{{ $rdv->prenommedecin }}</td>
                        <td>{{ $rdv->jourrendezvous }}</td>
                        <td>{{ $rdv->heuredebut }}</td>
                        <td>{{ $rdv->heurefin }}</td>                   
                        <td> @if($rdv->paye==0)
                            <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                            @else
                            <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                            @endif
                        </td>
                        <td>{{ $rdv->prix }}</td>


                        <td title="rendezvous">
                            @if($rdv->effectue==0 && $rdv->paye==0)
                            <form method="POST" action="{{ route('rendezvous.destroy', [$rdv->idrdv]) }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}

                                <input type="hidden" value="{{$idpatient}}" name="idpatient">
                                <input type="hidden" value="{{$nom}}" name="nom">
                                <input type="hidden" value="{{$prenom}}" name="prenom">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Retrait">

                            </form>

                            <form method="GET" action="{{route('payerconsult')}}">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Payer">
                                <input type="hidden" value="{{$rdv->idrdv}}" name="idrdv">
                                <input type="hidden" value="{{$rdv->prix}}" name="prix">
                                <input type="hidden" value="consultation" name="type">
                            </form>

                            @else
                            @if($rdv->paye==1 && $rdv->effectue==0)
                            <form method="POST" action="">
                                <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Reprogrammer">
                            </form>
                            @endif

                            @endif
                        </td>

                    </tr>
                    @endforeach     
                </tbody>
            </table>
        </div>
    </div>

     <script>
        $(document).ready(function () {
        $('#table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
        $('#table2').DataTable();
        });
    </script>
    @endsection

