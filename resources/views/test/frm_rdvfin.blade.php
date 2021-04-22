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

    @isset($message)
    <div class="col-sm-6" style="margin-left: 250px">
        <div class="alert alert-danger" >
            <label style="margin-left: 30px"> {{$message}}</label>
        </div>
    </div>
    @endisset
    <label class="control-label offset-4"><b> {{$nom}} &nbsp {{$prenom}} </b></label>
    <br>


    <form method="POST" action="{{ route('test.store')}}">
        {{ csrf_field() }}
        <div class="col-md-7 col-sm-12 col-xs-12 ">
            <div class="col-sm-9" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 1: Renseigner le jour du test</i></label></h2></b>
            </div>
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>PROGRAMMER UN TEST </b></div> 

                    <div class="row">
                        <label for="jour" class="col-sm-3">Jour du test </label> 
                        <div class="col-sm-7 col-xs-12"> 
                            <input type="date" class="form-control" name="jour" id="jour"  value="">
                            <small class="text-danger">{{ $errors->first('jour',':message') }}</small> 
                        </div> 
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-10 col-sm-10 col-xs-12">
            <br>
            <div class="col-sm-7" style="background-color: blue;border-radius:30px">
                <b><h2><label class="offset-1" style="font-family:  sans-serif;color: white;"><i>Etape 2: Choisir le Laboratoire</i></label></h2></b>
            </div>
            
           
            <div class="col-sm-10 col-xs-12" >
            <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Structure</th>
                                <th>Examen</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Jours examen</th>
                                <th>Prix</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>                              
                            @foreach($examen as $exam)
                            <tr>
                                <td>{{$exam->nomstructure }}</td>
                                <td>{{ $exam->libelleexamen }}</td>
                                <td>{{ $exam->heuredebut }}</td>
                                <td>{{ $exam->heurefin }}</td>
                                <td>{{ $exam->joursexam }}</td>
                                <td>{{ $exam->prix }}</td>
                                <td title="Ajouter">

                                    <button type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="{{$idpatient}}|{{$exam->idexamen}}|{{$exam->idlabo}}" name="exam">Choisir</button>
                                    <input type="hidden" value="{{$nom}}" name="nom">
                                    <input type="hidden" value="{{$prenom}}" name="prenom">



                                </td>
                                </form> 

                            </tr>
                            @endforeach      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

    <!--  fin de la liste-->
    <br>

    <div> 


        <div class="col-sm-10 col-xs-12 col-md-10">
            <br>
            @if(session('profil')=='Patient') 
            <div class="" style="">
                <h3 class="titreform">Examens du Patient {{session('nom')}}</h3>
            </div>
            @else
            <div class="" style="">
                <h3 class="titreform">Examens du Patient</h3>
            </div>
            @endif

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
                                <form method="GET" action="{{route('payerconsult')}}">
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
