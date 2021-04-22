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






        <div class="" style="">
            <h3 class="titreform">Liste des Medecins</h3>
            <div class="titrebarform col-sm-6" ></div>
        </div>
        <br>
        <div class="">
            <a href="{{route('medecin.create')}}" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #2a6496; border-radius: 0px;"><i class="glyphicon glyphicon-plus"></i> Nouveau </a>
        </div>
        <div class="" style="">
            <div class="col-sm-10 col-xs-12" >
                <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Titre</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Specialite</th>
                                <th>Telephone</th>
                                <th>Affectation</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($medecin as $med)
                            <tr>
                                <td>{{ $med->titre }}</td>
                                <td>{{ $med->nom }}</td>
                                <td>{{ $med->prenom }}</td>
                                <td>{{ $med->specialite }}</td>
                                <td>{{ $med->telephone }}</td>
                                <td>
                                    <form method="GET" action="{{url('affectation')}}">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Affectation" class="btn btn-primary">
                                        <input type="hidden" value="{{ $med->titre }}" name="titre">
                                        <input type="hidden" value="{{ $med->nom }}" name="nom">
                                        <input type="hidden" value="{{ $med->prenom }}" name="prenom">
                                        <input type="hidden" value="{{ $med->specialite }}" name="specialite">
                                        <input type="hidden" value="{{ $med->id }}" name="idmedecin">
                                        
                                    </form>
                                </td>
                                <td title="Modifier">
                                    <form method="GET" action="{{ route('medecin.edit', [$med->id]) }}">
                                        {{method_field('EDITER') }}
                                        {{ csrf_field() }}
                                        <button style="border: 0px;background-color:" class="text-info" type="submit"><i class="glyphicon glyphicon-edit"></i></button>
                                    </form>
                                </td>
                                <td title="Supprimer">
                                    <form method="POST" action="{{ route('medecin.destroy', [$med->id]) }}">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <a ></a>
                                        <button style="border: 0px;background-color:" class="text-danger" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button>
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