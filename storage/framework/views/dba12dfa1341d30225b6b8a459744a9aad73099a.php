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

        <form class="was-validated" novalidate role="form" method="POST" action="<?php echo e(route('laboratoires.update',[$laboratoire->idlabo])); ?>" enctype="application/x-www-form-urlencoded" >
            <?php echo e(method_field('PUT')); ?>

            <?php echo e(csrf_field()); ?>

            <div class="col-md-10 col-sm-10 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>ENREGISTRER UN LABORATOIRE </b></div>  
                        <div class="row">
                            <label for="structure" class="offset-sm-1 col-sm-2">Structure </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <select class="form-control" name="idstructure">              
                                    <?php $__currentLoopData = $structure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $struct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($struct->idstructure==$idstructure): ?>
                                    <option value="<?php echo e($struct->idstructure); ?>" selected="secected"><?php echo e($struct->nom); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($struct->idstructure); ?>"><?php echo e($struct->nom); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="invalid-feedback"><?php echo e($errors->first('idstructure',':message')); ?></small> 
                                </select> 
                            </div></div><br>

                        <div class="row">
                            <label for="nom" class="offset-sm-1 col-sm-2">Nom </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="nom" id="nom"  value="<?php echo e($laboratoire->nom); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('nom',':message')); ?></small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="telephone" class="offset-sm-1 col-sm-2">Telephone </label> 
                            <div class="col-sm-4 col-xs-12"> 
                                <input type="text" class="form-control" name="telephone" id="telephone"  value="<?php echo e($laboratoire->telephone); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('telephone',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="bp" class="offset-sm-1 col-sm-2">BP</label> 
                            <div class="col-sm-3 col-xs-12"> 
                                <input type="text" class="form-control" name="bp" id="bp"  value="<?php echo e($laboratoire->bp); ?>" >
                                <small class="invalid-feedback"><?php echo e($errors->first('bp',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>
                        <div class="row">
                            <label for="email" class="offset-sm-1 col-sm-2">Email</label> 
                            <div class="col-sm-7 col-xs-12"> 
                                <input type="text" class="form-control" name="email" id="type"  value="<?php echo e($laboratoire->email); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('email',':message')); ?></small> 
                            </div> 
                        </div>

                        <br>

                        <div class="row">
                            <label for="heureouverture" class="offset-sm-1 col-sm-2 col-xs-12">Heure Ouverture</label> 
                            <div class="col-sm-2 col-xs-6"> 
                                <input type="time" class="form-control" name="heureouverture" id="heureouverture"  value="<?php echo e($laboratoire->heureouverture); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('heureouverture',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="heurefermeture" class="offset-sm-1 col-sm-2 col-xs-12">Heure Fermeture</label> 
                            <div class="col-sm-2 col-xs-6"> 
                                <input type="time" class="form-control" name="heurefermeture" id="heurefermeture"  value="<?php echo e($laboratoire->heurefermeture); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('heurefermeture',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="row">
                            <label for="joursouvres" class="offset-sm-1 col-sm-2 ">Jours Ouvres</label> 
                            <div class="col-sm-6 col-xs-12"> 
                                <input type="text" class="form-control" name="joursouvres" id="joursouvres"  value="<?php echo e($laboratoire->joursouvres); ?>" required>
                                <small class="text-danger"><?php echo e($errors->first('joursouvres',':message')); ?></small> 
                            </div> 
                        </div>
                        <br>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div style="margin:auto">
                                <input type="submit"  value="Modifier" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = '<?php echo e(url('laboratoires')); ?>'" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </body>
</html>
<?php $__env->stopSection(); ?> 



<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/laboratoire/form_edit.blade.php ENDPATH**/ ?>