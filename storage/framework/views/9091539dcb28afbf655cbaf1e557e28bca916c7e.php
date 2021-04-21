<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<html>
    <head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>

        <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">

        <script>
            $(document).ready(function () {
            $('#table').DataTable();
            });
        </script>

    </head> 
    <?php $__env->stopSection(); ?>

        <div class="label" style="color:black"><b><h3>AFFECTER <?php echo e($titre); ?> <?php echo e($nom); ?> <?php echo e($prenom); ?> <?php echo e($specialite); ?></h3> </b> </div>
        <br>
        <form method="POST" role='' action="<?php echo e(url('affectation')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-7 col-sm-7 col-xs-12 ">
                <div class="x_content">  
                    <div class="x_panel"> 
                        <div class="x_title"><b>AFFECTATION A UNE STRUCTURE </b></div>  

                        
                        <div class="row">
                            <label for="structure" class="offset-sm-1 col-sm-2">Structure </label> 
                            <div class="col-sm-7 col-md-7 col-xs-12"> 
                                <select class="form-control" name="idstructure"> 
                                    <option selected>Choisir...</option>
                                    <?php $__currentLoopData = $structure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $struct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($struct->idstructure); ?>"><?php echo e($struct->nom); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <small class="text-danger"><?php echo e($errors->first('idstructure',':message')); ?></small> 
                                </select> 
                            </div>
                            <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                            <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                            <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                            <input type="hidden" value="<?php echo e($specialite); ?>" name="specialite">
                            <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group col-xs-7 col-sm-12">
                            <div style="margin:auto">  
                                <input type="submit"  value="Ajouter" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                                <input type="button"  value="Annuler" onclick="location.href = " class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px; margin-top:0px;">
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </form>


        <div class="col-md-9 col-sm-9 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>AFFECTATIONS DU MEDECIN </b></div>  
                    <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Structure</th>
                                <th>Telephone</th>
                                <th>Responsable</th>
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $listeaffectation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $affect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($affect->nomstructure); ?></td>
                                <td><?php echo e($affect->structuretelephone); ?></td>
                                <td><?php echo e($affect->responsable); ?></td>
                                <td title="Retirer">
                                    <form method="POST" action="<?php echo e(route('affectation.destroy',[$affect->id])); ?>">
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <a ></a>
                                        <button style="border: 0px;background-color:" class="text-danger" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button> 
                                        <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
                                        <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                        <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                        <input type="hidden" value="<?php echo e($specialite); ?>" name="specialite">
                                        <input type="hidden" value="<?php echo e($titre); ?>" name="titre">
                                    </form>                    
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>    
                </div>
            </div>
        </div>
        <br><br>
 
    <?php $__env->stopSection(); ?>

    <div class="modal" id="confirmationta">
        <div class="modal-dialog modal-xs">
            <div class="modal-content" style="background-color :">
                <div class="modal-body">
                    <span class="glyphicon glyphicon-exclamation-sign" style="color: #f0ad4e"><label > Supprimer cet &eacutelement ? </label></span>
                </div>
                <div class="modal-footer">
                    <a href="#"  class="btn btn-success" data-di  xsiss="modal"><span class="glyphicon glyphicon-ok-sign"></span> OUI</a>
                    <a href="#"  class="btn btn-danger" data-di  xsiss="modal"><span class="glyphicon glyphicon-remove-sign"></span> NON</a>
                </div>
            </div>
        </div>
    </div>
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/medecin/affectation.blade.php ENDPATH**/ ?>