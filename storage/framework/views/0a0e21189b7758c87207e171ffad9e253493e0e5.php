<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

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
    <div class="" style="">
        <h3 class="titreform">Liste des Transactions</h3>
        <div class="titrebarform col-sm-6" ></div>
    </div>
    <br>

    <div class="" style="">
        <div class="col-sm-12" >
            <div class="col-sm-10 ligneform " style="background-color: #EEE">
                <table class="table table-striped table-condensed" id="table">
                    <thead>
                        <tr style="background-color:#2a6496;color: #FFFFFF;">
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Operateur</th>
                            <th>Date Transaction</th>
                            <th>Status</th>
                            <th>Etat</th>
                           
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($trans->nom); ?></td>
                            <td><?php echo e($trans->prenom); ?></td>
                            <td><?php echo e($trans->telephone); ?></td>
                            <td><?php echo e($trans->operateur); ?></td>
                            <td><?php echo e($trans->created_at); ?></td>
                            <td><?php echo e($trans->status); ?></td>
                            <td><?php echo e($trans->etat); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
<!--  fin de la liste-->

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

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/transaction/liste.blade.php ENDPATH**/ ?>