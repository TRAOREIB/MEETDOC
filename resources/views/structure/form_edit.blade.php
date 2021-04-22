@extends('gentelella-master2.production.template')
@section('content')
@section('script')

<script src="{{asset('js/jquery.min.js')}}"></script>
<!--<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<script src="{{asset('js/bootstrap.min.js')}}"></script>-->
<!--<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">-->
@endsection 

<form class="was-validated" novalidate role="form" method="POST" action=" {{url('structure',[$str->idstructure])}} " enctype="application/x-www-form-urlencoded" >
    {{ method_field('PUT')}}
    {{ csrf_field() }}


    <div class="col-md-10 col-sm-10 col-xs-12 ">
        <div class="x_content">  
            <div class="x_panel">
                <div class="x_title"><b>MODIFIER UNE STRUCTURE </b></div>  

                <div class="row">
                    <label for="nom" class="offset-sm-1 col-sm-2">Nom *</label> 
                    <div class="col-sm-8 col-xs-12"> 
                        <input type="text" class="form-control" name="nom" id="nom"  value="{{$str->nom}}" required>
                        <small class="text-danger">{{ $errors->first('nom',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Responsable *</label> 
                    <div class="col-sm-8 col-xs-12"> 
                        <input type="text" class="form-control" name="responsable" id="responsable"  value="{{$str->responsable}}" required>
                        <small class="text-danger">{{ $errors->first('responsable',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Telephone *</label> 
                    <div class="col-sm-6 col-xs-12"> 
                        <input type="text" class="form-control" name="telephone" id="telephone"  value="{{$str->telephone}}" required>
                        <small class="text-danger">{{ $errors->first('telephone',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">BP </label> 
                    <div class="col-sm-6 col-xs-12"> 
                        <input type="text" class="form-control" name="bp" id="bp"  value="{{$str->bp}}">
                        <small class="text-danger">{{ $errors->first('bp',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Email *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="email" id="email"  value="{{$str->email}}" required>
                        <small class="text-danger">{{ $errors->first('email',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Fax</label> 
                    <div class="col-sm-5 col-xs-12"> 
                        <input type="text" class="form-control" name="fax" id="fax"  value="{{$str->fax}}">
                        <small class="text-danger">{{ $errors->first('fax',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Site Web </label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="siteweb" id="siteweb"  value="{{$str->siteweb}}">
                        <small class="text-danger">{{ $errors->first('siteweb',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Pays *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="pays" id="pays"  value="{{$str->pays}}" required>
                        <small class="text-danger">{{ $errors->first('pays',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Ville *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="ville" id="ville"  value="{{$str->ville}}" required>
                        <small class="text-danger">{{ $errors->first('ville',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Rue</label> 
                    <div class="col-sm-5 col-xs-12"> 
                        <input type="text" class="form-control" name="rue" id="rue"  value="{{$str->rue}}" required>
                        <small class="text-danger">{{ $errors->first('rue',':message') }}</small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Specialite *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="specialite" id="specialite"  value="{{$str->specialite}}" required>
                        <small class="text-danger">{{ $errors->first('specialite',':message') }}</small> 
                    </div> 
                </div>
            
    
    
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div style="margin:auto ">
        <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
        <input type="button"  value="Annuler" onclick="location.href = '{{url('structure')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
    </div>
    </div>
            </div>
        </div>
    </div>
</form>



<link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
<script src="{{asset('js/datepicker.js')}}"></script>
<script src="{{asset('js/datepicker.fr.js')}}"></script>

<script>
            $('.datepicker').datepicker({
            autoclose: true,
                    format: "yyyy-mm-dd",
                    startView: 1,
                    language: "fr",
                    startDate: "-100y",
                    endDate: "-1d"
            });
            $('.datefin').datepicker({
            autoclose: true,
                    format: "yyyy-mm-dd",
                    startView: 1,
                    language: "fr",
                    startDate: "-100y",
                    endDate: "-1d"
            });</script>
<script type="text/javascript">
    //                $(".resident").chosen({width: "100%"});
    var config = {
    '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100%"}
    }
    for (var selector in config) {
    $(selector).chosen(config[selector]);
    }
</script>


@endsection 

