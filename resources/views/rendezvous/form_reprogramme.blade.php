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

</head> 
@endsection
<body>

     
    @if(session("idmedecin")!="")
    <form class="" role="form" method="get" action=" {{url('disponibilite/create')}} " enctype="application/x-www-form-urlencoded" >
        {{ csrf_field() }}
        <div class="col-md-12 col-sm-12 "><label>Cliquer sur le bouton pour ajouter vos disponibilités</label> &nbsp;
            <input type="submit" class="btn btn-primary" value="Ajouter des disponibilités">
             <input type="hidden" value="{{$idmedecin}}" name="idmedecin">
        </div>
        @endif
    </form>     

        <div class="col-md-12 col-sm-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>LISTE DES RENDEZ-VOUS EN REPROGRAMMATION </b></div> 
                    <div class="table-responsive">
                    <table class="table col-sm-12 table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">

                                <th>CNIB</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Age</th>
                                <th>Antecedent</th>
                                <th>Symptome</th>
                                <th>Jour rendezvous</th>
                                <th></th>



                            </tr>
                        </thead>
                        <tbody>

                            @foreach($rendezvous as $rdv)
                        
                            <tr>
                                <td>{{ $rdv->cnibpatient }}</td>
                                <td>{{ $rdv->nompatient }}</td>
                                <td>{{ $rdv->prenompatient }}</td>
                                <td>{{ $rdv->agepatient }}</td>
                                <td>{{ $rdv->antecedants }}</td>
                                <td>{{ $rdv->symptomes }}</td>
                                <td>{{ $rdv->jourrendezvous }}</td>
                                <td>
                                    <form class="" role="form" method="get" action=" {{url('rendezvous/create')}} " enctype="application/x-www-form-urlencoded" >
                                        {{ csrf_field() }} 
                                        <input type="submit" value="Prendre rendez-vous" class="btn btn-primary">
                                        <input type="hidden" value="{{$rdv->id}}" name="idpatient">
                                         <input type="hidden" value="{{$rdv->nompatient}}" name="nom">
                                          <input type="hidden" value="{{$rdv->prenompatient}}" name="prenom">
                                        <input type="hidden" value="{{$rdv->idmedecin}}" name="idmedecin">
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
