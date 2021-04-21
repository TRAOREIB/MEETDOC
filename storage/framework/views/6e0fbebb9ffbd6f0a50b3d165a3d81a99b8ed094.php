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

    <body>

<!--        <form class="" role="form" method="POST" action="<?php echo e(url('rechercherconsult')); ?>" enctype="application/x-www-form-urlencoded" >
            <?php echo e(csrf_field()); ?>

            <div class="col-md-9 col-sm-9 ">
                <div class="x_content">  
                    <div class="x_panel">
                        <div class="x_title"><b>CRITERES DE RECHERCHE </b></div>                       
                        <div class="row col-md-8">
                            <label for="jour" class="offset-sm-6 col-sm-2">Jour </label> 
                            <div class="col-md-8"> 
                                <input type="date" class="form-control" name="jourrendezvous" id="jourrendezvous" required="required"  value="">
                                <small class="text-danger"><?php echo e($errors->first('jourrendezvous',':message')); ?></small> 
                            </div>
                        </div> 

                        <div class="row col-md-3">  
                            <input type="submit"  value="Rechercher" class="btn btn-primary" style="border: 1px solid #FFFFFF;  border-radius: 1px;margin-top: 0px"> 
                        </div>
                    </div>
                </div>
            </div>
        </form>      -->


        <div class="col-md-10 col-sm-10 col-xs-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>LISTE DES EXAMENS </b></div>
                    <div class="table-responsive">
                    <table class="table table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">
                                <th>Laboratoire</th>
                                <th>Examen</th>
                                <th>Heure Debut</th>
                                <th>Heure Fin</th>
                                <th>Prix</th>
                               
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $laboexam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($labex->nomlabo); ?></td>
                                <td><?php echo e($labex->libelleexamen); ?></td>
                                <td><?php echo e($labex->laboouverture); ?></td>
                                <td><?php echo e($labex->labofermeture); ?></td>
                                <td><?php echo e($labex->prix); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>    
                </div>
            </div>
        </div>

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
<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/laboexam/listeexamen.blade.php ENDPATH**/ ?>