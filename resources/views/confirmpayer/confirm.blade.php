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

@if($resultat=="reussi")

@if($type=="consultation")
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div> 
        @foreach($rdvselect as $rd)
        Votre payement a reussi, le rendez vous est pris avec
        le {{$rd->titremedecin}} {{$rd->nommedecin}} {{$rd->prenommedecin}} à la date du {{$rd->jourrendezvous}} de {{$rd->heuredebut}} à {{$rd->heurefin}} vous etes le patient N° {{$rd->rang}} sur {{$rd->nbrconsultation}} patient(s)
        <div class="ln_solid"></div>
        <form method="GET" action="{{url('rendezvouspatient')}}">
            {{ csrf_field() }}
            <div class=""><input type="submit" class="btn btn-success" value="voir la liste des consultations payés"></div>
            <input type="hidden" value="{{$rd->id}}" name="idpatient">
            <input type="hidden" value="lister" name="valeur">
        </form>
        @endforeach
    </div>
</div>
@endif

@if($type=="examen")
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div> 
        hello on est la
        @foreach($rdvselect as $rd)
         Votre payement a reussi, le rendez vous est pris pour l'examen de 
         {{$rd->libellexamen}}à la date du {{$rd->jourtest}} de {{$rd->heuredebut}} à
         {{$rd->heurefin}}
        <div class="ln_solid"></div>
        <form method="GET" action="{{url('examenpatient')}}">
            {{ csrf_field() }}
            <div class=""><input type="submit" class="btn btn-success" value="voir la liste des consultations payés"></div>
            <input type="hidden" value="{{$rd->id}}" name="idpatient">
            <input type="hidden" value="lister" name="valeur">
        </form>
        @endforeach
    </div>
</div>
@endif

@endif

@if($resultat=="echoué")
<div class="x_content">
    <div class="x_panel">
        <div class="x_title"><b>Payement du Rendez-Vous </b></div>
        <b>Votre payement a echoué, veuillez reesayer ou prendre un
            autre rendez-vous</b>
        <div class="card-footer"><input type="submit" value="voir la liste des consultations payés"></div>
    </div>
</div>
@endif
<script>
    $(document).ready(function () {
    $('#table').DataTable();
    });
</script>

@endsection  