@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<html>
    <head>   

        <!--<script src="{{asset('js/bootstrap.min.js')}}"></script>-->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
        <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">

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


    <div class="row col-sm-12">
        <div class="card col-sm-9">
            <div> 
                @if(session('profil')=='Patient') 
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient {{session('nom')}}</h3>
                </div>
                @else
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient</h3>
                </div>
                @endif
                <div class=" ligneform " style="background-color: #EEE">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed" id="table2">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">
                                    <th>Examen</th>
                                    <th>Jour</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Etat</th>
                                    <th>Prix</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($exampat as $expat)
                                <tr>
                                    <td>{{ $expat->libellexamen }}</td>
                                    <td>{{ $expat->jourtest }}</td>
                                    <td>{{ $expat->heuredebut }}</td>
                                    <td>{{ $expat->heurefin }}</td>
                                    <td> @if($expat->paye==0)
                                        <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                                        @else
                                        <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                                        @endif
                                    </td>
                                    <td>{{ $expat->prix }}</td>
                                    <td title="Supprimer">
                                        @if($expat->effectue==0 && $expat->paye==0)
                                        <form method="POST" action="{{ route('test.destroy', [$expat->idtest]) }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}

                                            <input style="border: 0px;background-color:" class="btn btn-primary" type="submit" value="Retrait" onclick="return confirm('Confirmer la Suppression')">
                                            <input type="hidden" value="{{$idpatient}}" name="idpatient">
                                            <input type="hidden" value="{{$nom}}" name="nom">
                                            <input type="hidden" value="{{$prenom}}" name="prenom">
                                            <input type="hidden" value="{{$reprogramme}}" name="reprogramme">
                                            <input type="hidden" value="{{$jour}}" name="jour">

                                        </form>   
                                        <form method='GET' action="{{route('payerconsult')}}">
                                            <input type="submit" style="" type="submit" class="btn btn-warning" value="Payer">
                                            <input type="hidden" value="{{$expat->prix}}" name="prix">
                                            <input type="hidden" value="{{$expat->idtest}}" name="idtest">
                                            <input type="hidden" value="{{$expat->id}}" name="idpatient">
                                            <input type="hidden" value="examen" name="type"> 
                                        </form>
                                        @else
                                        @if($expat->paye==1 && $expat->effectue==0)
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
            </div>
        </div> 
    </div>

    <div class="modal" id="confirmationta">
        <div class="modal-dialog modal-xs">
            <div class="modal-content" style="background-color :">
                <div class="modal-body">
                    <span class="glyphicon glyphicon-exclamation-sign" style="color: #f0ad4e"><label > Supprimer cet &eacutelement ? </label></span>
                </div>
                <div class="modal-footer">
                    <a href="#"  class="btn btn-success" data-di  xsiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OUI</a>
                    <a href="#"  class="btn btn-danger" data-di  xsiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> NON</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
