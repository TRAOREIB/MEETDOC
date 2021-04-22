@extends('gentelella-master2.production.template')
@section('content')
@section('script')
<html>
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

    </head> 
    @endsection
    <body>

        <div class="" style="color: black"><b>Liste des Patients</b></div>   
            <br>
            <div class="" style="">
                <div class="col-sm-10 col-xs-12" >
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed" id="table">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">

                                    <th>CNIB</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Telephone</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach($patient as $pat)
                                <tr>
                                    <td>{{ $pat->cnib }}</td>
                                    <td>{{ $pat->nom }}</td>
                                    <td>{{ $pat->prenom }}</td>
                                    <td>{{ $pat->telephone }}</td>

                                    <td title="rdv">
                                        <form method="GET" action="{{ route('rendezvous.create')}}">
                                            {{ csrf_field() }}
                                            <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Prendre Rendez-Vous">
                                            <input type="hidden" value="{{$pat->idpatient}}" name="idpatient">
                                            <input type="hidden" value="{{$pat->nom}}" name="nom">
                                            <input type="hidden" value="{{$pat->prenom}}" name="prenom">
                                        </form>

                                        <form method="GET" action="{{url('rendezvouspatient')}}">
                                            {{ csrf_field() }}
                                            <input type="submit" style="border: 0px;background-color:" class="btn btn-success" value="Reprogrammation">
                                            <input type="hidden" value="{{$pat->idpatient}}" name="idpatient">
                                            <input type="hidden" value="{{$pat->nom}}" name="nom">
                                            <input type="hidden" value="{{$pat->prenom}}" name="prenom">
                                        </form>

                                    </td>

                                </tr>
                                @endforeach      

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!--  fin de la liste-->

    </body>

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
