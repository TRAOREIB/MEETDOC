<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>
<html>
    <head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<!--        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

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
        <br>
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
                                <th>Ajouter</th>
                    
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $patient; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($pat->cnib); ?></td>
                                <td><?php echo e($pat->nom); ?></td>
                                <td><?php echo e($pat->prenom); ?></td>
                                <td><?php echo e($pat->telephone); ?></td>

                                <td title="Ajouter Examen">
                                    <form method="GET" action="<?php echo e(route('test.create')); ?>">
                                        <?php echo e(method_field('EDITER')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <input style="border: 0px;background-color:" class="btn btn-primary" type="submit" value="Faire un examen" >
                                        <input type="hidden" value="<?php echo e($pat->idpatient); ?>" name="idpatient">
                                        <input type="hidden" value="<?php echo e($pat->nom); ?>" name="nom">
                                        <input type="hidden" value="<?php echo e($pat->prenom); ?>" name="prenom">
                                    </form>
                                    
                                    <form method="GET" action="<?php echo e(url('examenpatient')); ?>">
                                        <?php echo e(method_field('EDITER')); ?>

                                        <?php echo e(csrf_field()); ?>

                                        <input style="border: 0px;background-color:" class="btn btn-success" type="submit" value="Reprogrammation" >
                                        <input type="hidden" value="<?php echo e($pat->idpatient); ?>" name="idpatient">
                                        <input type="hidden" value="<?php echo e($pat->nom); ?>" name="nom">
                                        <input type="hidden" value="<?php echo e($pat->prenom); ?>" name="prenom">
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
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/test/liste.blade.php ENDPATH**/ ?>