<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
<!--<script src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/chosen.css')); ?>">-->
<?php $__env->stopSection(); ?> 

<form class="was-validated" novalidate role="form" method="POST" action=" <?php echo e(url('structure',[$str->idstructure])); ?> " enctype="application/x-www-form-urlencoded" >
    <?php echo e(method_field('PUT')); ?>

    <?php echo e(csrf_field()); ?>



    <div class="col-md-10 col-sm-10 col-xs-12 ">
        <div class="x_content">  
            <div class="x_panel">
                <div class="x_title"><b>MODIFIER UNE STRUCTURE </b></div>  

                <div class="row">
                    <label for="nom" class="offset-sm-1 col-sm-2">Nom *</label> 
                    <div class="col-sm-8 col-xs-12"> 
                        <input type="text" class="form-control" name="nom" id="nom"  value="<?php echo e($str->nom); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('nom',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Responsable *</label> 
                    <div class="col-sm-8 col-xs-12"> 
                        <input type="text" class="form-control" name="responsable" id="responsable"  value="<?php echo e($str->responsable); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('responsable',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Telephone *</label> 
                    <div class="col-sm-6 col-xs-12"> 
                        <input type="text" class="form-control" name="telephone" id="telephone"  value="<?php echo e($str->telephone); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('telephone',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">BP </label> 
                    <div class="col-sm-6 col-xs-12"> 
                        <input type="text" class="form-control" name="bp" id="bp"  value="<?php echo e($str->bp); ?>">
                        <small class="text-danger"><?php echo e($errors->first('bp',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Email *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="email" id="email"  value="<?php echo e($str->email); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('email',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Fax</label> 
                    <div class="col-sm-5 col-xs-12"> 
                        <input type="text" class="form-control" name="fax" id="fax"  value="<?php echo e($str->fax); ?>">
                        <small class="text-danger"><?php echo e($errors->first('fax',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Site Web </label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="siteweb" id="siteweb"  value="<?php echo e($str->siteweb); ?>">
                        <small class="text-danger"><?php echo e($errors->first('siteweb',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Pays *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="pays" id="pays"  value="<?php echo e($str->pays); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('pays',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Ville *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="ville" id="ville"  value="<?php echo e($str->ville); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('ville',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Rue</label> 
                    <div class="col-sm-5 col-xs-12"> 
                        <input type="text" class="form-control" name="rue" id="rue"  value="<?php echo e($str->rue); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('rue',':message')); ?></small> 
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label for="type" class="offset-sm-1 col-sm-2">Specialite *</label> 
                    <div class="col-sm-7 col-xs-12"> 
                        <input type="text" class="form-control" name="specialite" id="specialite"  value="<?php echo e($str->specialite); ?>" required>
                        <small class="text-danger"><?php echo e($errors->first('specialite',':message')); ?></small> 
                    </div> 
                </div>
            
    
    
    <div class="ln_solid"></div>
    <div class="item form-group">
        <div style="margin:auto ">
        <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
        <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('structure')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
    </div>
    </div>
            </div>
        </div>
    </div>
</form>



<link rel="stylesheet" href="<?php echo e(asset('css/datepicker.css')); ?>">
<script src="<?php echo e(asset('js/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/datepicker.fr.js')); ?>"></script>

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


<?php $__env->stopSection(); ?> 


<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/structure/form_edit.blade.php ENDPATH**/ ?>