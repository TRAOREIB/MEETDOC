@extends('template')
@section('contenu')
@section('script')
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/chosen.css')}}">


@endsection
<div class="col-xs-12" style="margin-top: 0px">
    <h3 style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"> Modifier Article </h3>
    <div style="background: #285e8e;margin-top:2px;height:10px"></div>
    <br>
</div>

<br>



<form class="form-horizontal" role="form" method="POST" action=" {{url('article',['id' => $article->idarticle])}} " >

    <div class="col-xs-7" style="border:1px solid #D1DCF5;margin-left:0px;padding:15px; margin-left:280px">
        {{ method_field('PUT')}}
        {{ csrf_field() }}
        <br>

        <form class="form-horizontal" role="form">

            <div class="form-group">
                <label for="reference" class="col-sm-3 control-label">Code article *</label> 
                <div class="col-sm-8"> 
                    <input type="text" class="form-control" name="codearticle" id="codearticle"  value="{{$article->codearticle}}">
                    <small class="text-danger">{{ $errors->first('reference',':message') }}</small> 
                </div> 
            </div>

            <div class="form-group"> 
                <label for="structP" class="col-sm-3 control-label">Categorie</label> 
                <div class="col-sm-5">
                    <select class="form-control chosen-select" name="categorie" >           
                        <option <?php if ($article->categorie === "Aliment") echo"selected=selected"; ?> > Aliment </option>
                        <option <?php if ($article->categorie === "Medicament") echo"selected=selected"; ?> > Medicament </option>
                        <option <?php if ($article->categorie === "Matériel") echo"selected=selected"; ?> > Matriel </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nomcourt" class="col-sm-3 control-label">Designation *</label> 
                <div class="col-sm-4"> 
                    <input type="text" class="form-control" name="designation" id="designation"  value="{{$article->designation}}">
                    <small class="text-danger">{{ $errors->first('designation',':message') }}</small> 
                </div> 
            </div>

            <div class="form-group">
                <label for="nomcourt" class="col-sm-3 control-label">Quantité minimale *</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="qtmin" id="qtmin"  value="{{$article->stockmini}}">
                    <small class="text-danger">{{ $errors->first('stockmini',':message') }}</small> 
                </div> 
            </div>
<!--            <div class="form-group">
                <label for="nomcourt" class="col-sm-3 control-label">Quantité en stock *</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="quantiteenstock" id="qtmin"  value="{{$article->quantiteenstock}}">
                    <small class="text-danger">{{ $errors->first('quantiteenstock',':message') }}</small> 
                </div> 
            </div>-->



            <div class="form-group">
                <label for="unite" class="col-sm-3 control-label">Unité</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="unite" id="unite"  value="{{$article->unite}}">
                    <small class="text-danger">{{ $errors->first('unite',':message') }}</small>
                </div> 
            </div>
            
            <div class="form-group">
                <label for="prixachat" class="col-sm-3 control-label">Prix d'achat *</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="prixachat" id="prixachat"  value="{{$article->prixachat}}">
                    <small class="text-danger">{{ $errors->first('prixvente',':message') }}</small>
                </div> 
            </div>

            <div class="form-group">
                <label for="prixvente" class="col-sm-3 control-label">Prix de vente *</label> 
                <div class="col-sm-3"> 
                    <input type="text" class="form-control" name="prixvente" id="prixvente"  value="{{$article->prixvente}}">
                    <small class="text-danger">{{ $errors->first('prixvente',':message') }}</small>
                </div> 
            </div>



    </div>

    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10"> 
            <input type="submit"  value="Valider" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #54B944; border-radius: 0px; margin-top: 6px"> 
        </div>
    </div> 
</form>

<form method="GET" action='{{route('article.index')}}'>
    <div class="form-group" >
        <div class="col-sm-offset-6 col-sm-10"> 
            <input type="submit"  value="Annuler" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #54B944; border-radius: 0px;margin-top: -86px"> 
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
});
</script>
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
