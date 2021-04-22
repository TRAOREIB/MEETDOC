<html>
    <head>
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/chosen.jquery.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    </head>

    <body>
    <div class="col-sm-10" style="margin-top: 0px">
        <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Enregistrer un Examen </h3>
        <br>
    </div>

    <br>



    <form class="form-horizontal" role="form" method="POST" action=" {{url('examen')}} " enctype="application/x-www-form-urlencoded" >
        {{ csrf_field() }}
        <div class="col-sm-7" style="border:1px solid #D1DCF5;margin-left:0px;">
            <div class="form-group">
                <label for="libelle" class="col-sm-3 control-label">Libelle *</label> 
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" name="libelle" id="libelle"  value="">
                    <small class="text-danger">{{ $errors->first('libelle',':message') }}</small> 
                </div> 
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-3 control-label">Type *</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="type" id="type"  value="">
                    <small class="text-danger">{{ $errors->first('type',':message') }}</small> 
                </div> 
            </div>
        </div>

        <br><br><br>
        <div class="row col-sm-9 col-sm-offset-2 ">
            <div class="col-sm-1">  
                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
            </div>
            <div class="col-sm-1">  
                <input type="button"  value="Annuler" onclick="location.href = '{{url('examen')}}'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
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




