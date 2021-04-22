@extends('gentelella-master2.production.template')
@section('content')
@section('script')
  

<!--        <script src="{{asset('js/bootstrap.min.js')}}"></script>-->
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/dataTables.min.js')}}"></script>
<!--        <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">-->
        <link rel="stylesheet" href="{{asset('css/dataTables.min.css')}}">
<!--        <link rel="stylesheet" href="{{asset('css/all.css')}}">-->

 @endsection


    <body>

        <div class="" style="">
            <h3 class="titreform">Liste des Medecins</h3>
            <div class="titrebarform col-sm-6" ></div>
        </div>
        <br>
        
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
                                <th>Structure</th>
                                <th>Disponibilite</th>


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
                                <td></td>

                                <td title="Disponibilite">
                                    <form method="GET" action="{{ route('disponibilite.create')}}">
                                        {{ csrf_field() }}
                                        <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Ajouter disponibilité">
                                        <input type="hidden" value="{{$med->id}}" name="idmedecin">
                                        <input type="hidden" value="{{$med->nom}}" name="nom">
                                        <input type="hidden" value="{{$med->prenom}}" name="prenom">
                                        <input type="hidden" value="{{$med->titre}}" name="titre">
                                        <input type="hidden" value="" name="idstructure">

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
    
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });

    </script>
    
    @endsection

    

