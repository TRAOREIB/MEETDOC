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

    <form class="was-validated" role="form" method="POST" action="{{url('rechercherconsult')}}" enctype="application/x-www-form-urlencoded" >
        {{ csrf_field() }}
        <div class="col-md-8 col-sm-8 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>CRITERES DE RECHERCHE </b></div> 
                    
                    @if(session('profil')!='Medecin')
                    <div class="row">
                        <div class=" col-sm-1">
                            <label for="medecin" class="" style="margin-left: 50px">Medecin </label> 
                        </div>
                        <div class="col-sm-7 col-xs-12 offset-1"> 
                            <select class="form-control" name="id" required=""> 
<!--                                <option selected="selected">Choisir...</option>-->
                                @foreach($medecin as $med)
                                <option value="{{$med->id}}">{{$med->nom}} {{$med->prenom}}</option>
                                @endforeach
                                <small class="text-danger">{{ $errors->first('id',':message') }}</small> 
                            </select> 
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="row">
                        <div class="col-sm-1">
                            <label for="jour" class="" style="margin-left: 70px">Jour </label> 
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 offset-1"> 
                            <input type="date" class="form-control" name="jourrendezvous" id="jourrendezvous" required="required"  value="">
                            <small class="text-danger">{{ $errors->first('jourrendezvous',':message') }}</small> 
                        </div>
                    </div> 

                    <br>
                    <div class="col-xs-12 col-sm-12 offset-4">                         
                        <input type="submit"  value="Rechercher" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                    </div>
                </div>
            </div>
        </div>
    </form>      



    <div class="col-md-12 col-sm-12 col-xs-12 ">
        <div class="x_content">  
            <div class="x_panel">
                <div class="x_title"><b>LISTE DES RENDEZ-VOUS </b></div> 
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
                                <th>Examen Fait</th>
                                <th>Jour</th>
                                <th>Ordre de Passage</th>


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
                                <td>{{ $rdv->examensfait }}</td>
                                <td>{{ $rdv->jourrendezvous }}</td>
                                <td>{{ $rdv->ordrepassage }}</td>

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
