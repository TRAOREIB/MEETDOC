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

    </head> 
    @endsection

    <body>
        <form method="POST" class="was-validated" novalidate action="{{ route('strspecial.store')}}">
            {{ csrf_field() }}
            <div class="col-md-7 col-sm-7 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>SPECIALITE/STRUCTURE </b></div>  
                        <div class="row">
                            <label for="specialite" class="offset-sm-1 col-sm-2">Specialite </label> 
                            <div class="col-sm-7 col-md-7 col-xs-12"> 
                                <select class="form-control" name="idspecialite" required="required">
                                    <option selected="selected"></option>
                                    @foreach($specialite as $spec)
                                    <option value="{{$spec->idspecialite}}">{{$spec->libelle}}</option>
                                    @endforeach
                                    <small class="text-danger">{{ $errors->first('idspecialite',':message') }}</small> 
                                </select> 
                            </div>
                        </div><br>

                        <div class="row">
                            <label for="structure" class="offset-sm-1 col-sm-2">Structure </label> 
                            <div class="col-sm-7 col-md-7 col-xs-12"> 
                                <select class="form-control" name="idstructure" required> 
                                    <option selected></option>
                                    @foreach($structure as $struct)
                                    <option value="{{$struct->idstructure}}">{{$struct->nom}}</option>
                                    @endforeach
                                    <small class="text-danger">{{ $errors->first('idstructure',':message') }}</small> 
                                </select> 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Prix *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="number" class="form-control" name="prix" id="libelle"required="required"  value="0">
                                <small class="text-danger">{{ $errors->first('prix',':message') }}</small> 
                            </div> 
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div style="margin: auto">  
                                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = " class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </form>


        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>LISTE DES SPECIALITES </b></div>  
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed" id="table">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">
                                    <th>Structure</th>
                                    <th>Specialite</th>
                                    <th>Telephone</th>
                                    <th>Prix</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($strspecial as $strspec)
                                <tr>
                                    <td>{{ $strspec->nomstructure }}</td>
                                    <td>{{ $strspec->specialite }}</td>
                                    <td>{{ $strspec->telephone }}</td>
                                    <td>{{ $strspec->prix }}</td>
                                    <td title="Retirer">
                                        <form method="POST" action="{{ route('strspecial.destroy', [$strspec->idstrspecial]) }}">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <a ></a>
                                            <button style="border: 0px;background-color:" class="text-danger" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button> 
                                            <input type="hidden" value="{{$strspec->idstructure}}" name="idstructure">
                                            <input type="hidden" value="{{$strspec->idspecialite}}" name="idspecialite"> 
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
