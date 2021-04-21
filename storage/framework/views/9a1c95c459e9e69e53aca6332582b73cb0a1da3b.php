<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>
<head>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
    <!--<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">-->
    <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('js/chosen.jquery.min.js')); ?>"></script>-->
    <!--<link rel="stylesheet" href="<?php echo e(asset('css/chosen.css')); ?>">-->
</head>
<?php $__env->stopSection(); ?>
<body>

    <form class="was-validated" novalidate role="form" method="POST" action=" <?php echo e(url('examen')); ?> " enctype="application/x-www-form-urlencoded" >
        <?php echo e(csrf_field()); ?>

        <div class="col-md-10 col-sm-10 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>ENREGISTRER EXAMEN </b></div> 
                    <div class="row">
                        <label for="libelle" class="offset-sm-1 col-sm-2">Libelle *</label> 
                        <div class="col-sm-7 col-xs-12"> 
                            <input type="text" class="form-control"  name="libelle" id="libelle"  value="<?php echo e(old('libelle')); ?>" required>
                             <?php $__errorArgs = ['libelle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                             <div class="invalid-feedback"><?php echo e($message); ?></div>
                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="condiremplir" class="offset-sm-1 col-sm-2">Condition à remplir *</label> 
                        <div class="col-sm-6 col-xs-12"> 
                            <input type="text" class="form-control"  name="condiremplir" id="condiremplir"  value="" required>
                            <small class="invalid-feedback"><?php echo e($errors->first('condiremplir',':message')); ?></small> 
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <label for="type" class="offset-sm-1 col-sm-2">Type *</label> 
                        <div class="col-sm-6 col-xs-12"> 
                            <input type="text" class="form-control" name="type" id="type"  value="" required>
                            <small class="invalid-feedback"><?php echo e($errors->first('type',':message')); ?></small> 
                        </div> 
                    </div>

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div style="margin:auto"> 
                            <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                            <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('examen')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
   
</body>
<?php $__env->stopSection(); ?>

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





<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/examen/form_ajouter.blade.php ENDPATH**/ ?>