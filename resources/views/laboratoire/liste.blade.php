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

        <script>
            $(document).ready(function () {
            $('#table').DataTable({
             responsive:true});
            });
        </script>

    </head> 
    
   @endsection  

    <body>

        <div class="" style="">
            <h3 class="titreform">Liste des Laboratoires</h3>
            <div class="titrebarform col-sm-6" ></div>
        </div>
        <br>
        <div class="">
            <a href="{{route('laboratoires.create')}}" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #2a6496; border-radius: 0px;"><i class="glyphicon glyphicon-plus"></i> Nouveau </a>
        </div>
        <div class="table-responsive">               
                    <table class="col-xs-10" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Laboratoire</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Heure Ouverture</th>
                                <th>Heure Fermeture</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>

                            </tr>
                        </thead>
                        <tbody>

                             @foreach($laboratoires as $labo)
                            <tr>
                                <td>{{ $labo->nom }}</td>
                                <td>{{ $labo->telephone }}</td>
                                <td>{{ $labo->email }}</td>
                                <td>{{ $labo->heureouverture }}</td>
                                <td>{{ $labo->heurefermeture }}</td>
                                
                                <td title="Modifier">
                                    <form method="GET" action="{{ route('laboratoires.edit', [$labo->idlabo]) }}">
                                        {{method_field('EDITER') }}
                                        {{ csrf_field() }}
                                        <button style="border: 0px;background-color:" class="text-info" type="submit" ><i class="glyphicon glyphicon-edit"></i></button>
                                    </form>
                                </td>
                                <td title="Supprimer">
                                    <form method="POST" action="{{ route('laboratoires.destroy', [$labo->idlabo]) }}">
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