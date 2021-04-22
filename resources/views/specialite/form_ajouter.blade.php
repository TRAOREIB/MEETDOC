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



<form class="was-validated" novalidate role="form" method="POST" action=" {{url('specialite')}} " enctype="application/x-www-form-urlencoded" >
    {{ csrf_field() }}
    <div class="col-md-10 col-sm-10 col-xs-12 ">
        <div class="x_content">  
            <div class="x_panel">
                <div class="x_title"><b>ENREGISTRER UNE SPECIALITE </b></div>  
                <div class="row">
                    <label for="nom" class="offset-sm-1 col-sm-2">Libelle *</label> 
                    <div class="col-sm-8 col-xs-12"> 
                        <input type="text" class="form-control" name="libelle" id="libelle"  value="" required="">
                        <small class="invalid-feedback">{{ $errors->first('libelle',':message') }}</small> 
                    </div> 
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div style="margin:auto">
                        <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                        <input type="button"  value="Annuler" onclick="location.href = '{{url('specialite')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
<br>


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


