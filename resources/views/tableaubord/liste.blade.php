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
