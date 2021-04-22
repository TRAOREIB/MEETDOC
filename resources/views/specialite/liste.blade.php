@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<script src="{{asset('js/bootstrap.min.js')}}"></script>-->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
@endsection  

    <div class="" style="">
        <h3 class="titreform">Liste des Spécialités</h3>
        <div class="titrebarform col-sm-6" ></div>
    </div>
<br>
<div class="">
    <a href="{{route('specialite.create')}}" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #2a6496; border-radius: 0px;"><i class="glyphicon glyphicon-plus"></i> Nouveau </a>
</div>
<div class="" style="">
    <div class="col-sm-10" >
        <div class="col-sm-10 ligneform " style="background-color: #EEE">
            <table class="table table-striped table-condensed" id="table">
                <thead>
                    <tr style="background-color:#2a6496;color: #FFFFFF;">
                        <th>libelle</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                       
                    </tr>
                </thead>
                <tbody>

                    @foreach($specialite as $spec)
                    <tr>
                        <td>{{ $spec->libelle }}</td>
                       
                        <td title="Modifier">
                            <form method="GET" action="{{ route('specialite.edit', [$spec->idspecialite]) }}">
                                {{method_field('EDITER') }}
                                {{ csrf_field() }}
                                <button style="border: 0px;background-color:" class="text-info" type="submit" ><i class="glyphicon glyphicon-edit"></i></button>
                            </form>
                        </td>
                        <td title="Supprimer">
                            <form method="POST" action="{{ route('specialite.destroy', [$spec->idspecialite]) }}">
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