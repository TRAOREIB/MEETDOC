<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<html>
    <head>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<!--        <script src="<?php echo e(asset('js/bootstrap.js')); ?>"></script>
      <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">-->
    </head>
    <?php $__env->stopSection(); ?> 
    <body>

        <form class="" role="form" method="POST" action=" <?php echo e(url('patient',[$patient->idpatient])); ?> " enctype="application/x-www-form-urlencoded" >
            <?php echo e(method_field('PUT')); ?>

            <?php echo e(csrf_field()); ?>


            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>MODIFIER UN PATIENT </b></div> 

                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"  value="<?php echo e($patient->nom); ?>">
                                <small class="text-danger"><?php echo e($errors->first('nom',':message')); ?></small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom"  value="<?php echo e($patient->prenom); ?>">
                                <small class="text-danger"><?php echo e($errors->first('prenom',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="age" class="offset-sm-1 col-sm-2">Age *</label> 
                            <div class="col-sm-2 col-xs-12"> 
                                <input type="number" class="form-control" name="age" id="type"  value="<?php echo e($patient->age); ?>">
                                <small class="text-danger"><?php echo e($errors->first('age',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="sexe" class="col-sm-2 offset-sm-1">Sexe *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="form-control col-sm-4" name="sexe"> 
                                    <?php
                                    if ($patient->sexe == "Masculin") {
                                        echo "<option selected='selected'>Masculin</option>";
                                    } else {
                                        echo "<option>Masculin</option>";
                                    }
                                    if ($patient->sexe == "Feminin") {
                                        echo"<option selected='selected'>Feminin</option>";
                                    } else {
                                        echo"<option>Feminin</option>";
                                    }
                                    ?>
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="passeport" class="offset-sm-1 col-sm-2">Passeport *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="passeport" id="sexe"  value="<?php echo e($patient->passeport); ?>">
                                <small class="text-danger"><?php echo e($errors->first('passeport',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="cnib" class="offset-sm-1 col-sm-2">Cnib *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="cnib" id="cnib"  value="<?php echo e($patient->cnib); ?>">
                                <small class="text-danger"><?php echo e($errors->first('cnib',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  value="<?php echo e($patient->telephone); ?>">
                                <small class="text-danger"><?php echo e($errors->first('telephone',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe"  value="<?php echo e($patient->pays); ?>">
                                <small class="text-danger"><?php echo e($errors->first('pays',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  value="<?php echo e($patient->ville); ?>">
                                <small class="text-danger"><?php echo e($errors->first('ville',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="type"  value="<?php echo e($patient->email); ?>">
                                <small class="text-danger"><?php echo e($errors->first('email',':message')); ?></small> 
                            </div> 
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group ">
                        <div class="row" style="margin:auto">
                            <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                            <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('patient')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                        </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
</html>

<?php $__env->stopSection(); ?> 


<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/patient/form_edit.blade.php ENDPATH**/ ?>