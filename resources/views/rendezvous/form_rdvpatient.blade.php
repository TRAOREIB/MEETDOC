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

</head>

@endsection
<body>

    <p>
    <div class="col-sm-10 col-xs-12">
        <div class="" style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"><b><h4><u>LISTE DES RENDEZ-VOUS DE {{$nom}} {{$prenom}}</u></h4></b> </div>
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
                            <input type="hidden" value="{{$rdv->idrdv}}" name="idrdv">
                           
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
    <p>
        <br>

        @endsection

