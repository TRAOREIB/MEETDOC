<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>
  
    <head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
        <!--<script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>-->
        <!--<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

        <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
        <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">

        <script>
            $(document).ready(function () {
            $('#table').DataTable();
            });
        </script>

    </head> 
    
    <?php $__env->stopSection(); ?>

    <body>

        <div class="" style="">
            <h3 class="titreform">Liste des Patients</h3>
            <div class="titrebarform col-sm-6" ></div>
        </div>
        <br>
        <div class="">
            <a href="<?php echo e(route('patient.create')); ?>" class="btn btn-primary" style="border: 1px solid #FFFFFF; background-color: #2a6496; border-radius: 0px;"><i class="glyphicon glyphicon-plus"></i> Nouveau </a>
        </div>
        <div class="" style="">
            <div class="col-sm-10 col-xs-12" >
                <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>CNIB</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Telephone</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pat->cnib); ?></td>
                                <td><?php echo e($pat->nom); ?></td>
                                <td><?php echo e($pat->prenom); ?></td>
                                <td><?php echo e($pat->telephone); ?></td>

                                <td title="Modifier">
                                    <form method="GET" action="<?php echo e(route('patient.edit', [$pat->idpatient])); ?>">
                                        <?php echo e(method_field('EDITER')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <button style="border: 0px;background-color:" class="text-info" type="submit" ><i class="glyphicon glyphicon-edit"></i></button>
                                    </form>
                                </td>
                                <td title="Supprimer">
                                    <form method="POST" action="<?php echo e(route('patient.destroy', [$pat->idpatient])); ?>">
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <a ></a>
                                        <button style="border: 0px;background-color:" class="text-danger" type="submit" onclick="return confirm('Confirmer la Suppression')"><i class="glyphicon glyphicon-remove"></i></button>
                                    </form>                    
                                </td>

                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!--  fin de la liste-->

    </body>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/patient/liste.blade.php ENDPATH**/ ?>