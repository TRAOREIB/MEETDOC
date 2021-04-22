@extends('gentelella-master2.production.template')
@section('content')
@section('script')

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
    <div class="" style="">
        <h3 class="titreform">Liste des Transactions</h3>
        <div class="titrebarform col-sm-6" ></div>
    </div>
    <br>

    <div class="" style="">
        <div class="col-sm-12" >
            <div class="col-sm-10 ligneform " style="background-color: #EEE">
                <table class="table table-striped table-condensed" id="table">
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Operateur</th>
                            <th>Date Transaction</th>
                            <th>Status</th>
                            <th>Etat</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($transaction as $trans)
                        <tr>
                            <td>{{ $trans->nom }}</td>
                            <td>{{ $trans->prenom }}</td>
                            <td>{{ $trans->telephone }}</td>
                            <td>{{ $trans->operateur }}</td>
                            <td>{{ $trans->created_at }}</td>
                            <td>{{ $trans->status }}</td>
                            <td>{{ $trans->etat }}</td>
                        </tr>
                        @endforeach      

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
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
@endsection 
