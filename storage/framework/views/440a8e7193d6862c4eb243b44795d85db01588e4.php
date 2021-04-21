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

        <?php $__currentLoopData = $medecin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $med): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form class="was-validated" novalidate role="form" method="POST" action=" <?php echo e(url('medecin',[$med->id])); ?> " enctype="application/x-www-form-urlencoded" >
            <?php echo e(method_field('PUT')); ?>

            <?php echo e(csrf_field()); ?>


            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>MODIFIER UN MEDECIN </b></div> 

                        <div class="row">
                            <label for="libelle" class="offset-sm-1 col-sm-2">Nom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="libelle"  value="<?php echo e($med->nom); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('nom',':message')); ?></small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="type" class="offset-sm-1 col-sm-2">Prenom *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="prenom" id="prenom"  value="<?php echo e($med->prenom); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('prenom',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="titre" class="offset-sm-1 col-sm-2">Titre *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="titre" id="prenom"  value="<?php echo e($med->titre); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('titre',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="specialite" class="offset-sm-1 col-sm-2">Specialite *</label> 
                            <div class="col-sm-5 col-xs-12">
                                <select class="col-sm-7 form-control" name="idspecialite" required> 
                                    <?php $__currentLoopData = $specialite; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <?php if($spec->idspecialite==$idspecialite): ?>
                                    <option value="<?php echo e($spec->idspecialite); ?>" selected="secected"><?php echo e($spec->libelle); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($spec->idspecialite); ?>"><?php echo e($spec->libelle); ?></option>
                                    <?php endif; ?> 
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="invalid-feedback"><?php echo e($errors->first('idspecialite',':message')); ?></small> 
                                </select> 
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <label for="an" class="offset-sm-1 col-sm-2">Année d'exercice *</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="number" class="form-control" name="anexercice" id="prenom"  value="<?php echo e($med->anexercice); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('anexercice',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="titrehonorifique" class="offset-sm-1 col-sm-2">Titre Honorifique *</label> 
                            <div class="col-sm-8 col-xs-12"> 
                                <input type="text" class="form-control" name="titrehonorifique" id="prenom"  value="<?php echo e($med->titrehonorifique); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('titrehonorifique',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="exerce" class="offset-sm-1 col-sm-2">Etat d'exercice *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="exerce" id="sexe"  value="<?php echo e($med->exerce); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('exerce',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>


                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone *</label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="sexe"  value="<?php echo e($med->telephone); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('telephone',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email *</label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="email"  value="<?php echo e($med->email); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('email',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="pays" class="offset-sm-1 col-sm-2">Pays *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="pays" id="sexe"  value="<?php echo e($med->pays); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('pays',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="ville" class="offset-sm-1 col-sm-2">Ville *</label> 
                            <div class="col-sm-5 col-xs-12"> 
                                <input type="text" class="form-control" name="ville" id="type"  value="<?php echo e($med->ville); ?>" required>
                                <small class="invalid-feedback"><?php echo e($errors->first('ville',':message')); ?></small> 
                            </div> 
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <br>
                        <div class="ln_solid"></div>
                        <div class="row" style="margin:auto">
                            <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                            <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('medecin')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>

</body>
</html>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/medecin/form_edit.blade.php ENDPATH**/ ?>