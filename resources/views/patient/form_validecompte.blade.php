@extends('gentelella-master2.production.templateinscription')
@section('content')
@section('script')

<head>
<!--        <script src="{{asset('js/bootstrap.js')}}"></script>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/datatables.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
</head>

@endsection 

<body>

<div><label style="font-family: cursive"><h3>Votre compte a ete enregistré avec succès, cliquer sur <a href="{{url('/')}}" style="color: red">Connecter</a></h3></label></div> 

</body>
</html>

@endsection


