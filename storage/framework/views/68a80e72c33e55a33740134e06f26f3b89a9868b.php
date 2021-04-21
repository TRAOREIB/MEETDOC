<?php $__env->startSection('content'); ?>
<?php $__env->startSection('script'); ?>

<head>   

        <!--<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>-->
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/datatables.min.js')); ?>"></script>
<!--        <script type="text/javascript" src="<?php echo e(asset('js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>-->

    <!--<link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">-->
    <link rel="stylesheet" href="<?php echo e(asset('css/datatables.min.css')); ?>">
    <!--<link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">-->

    <script>
        $(document).ready(function () {
        $('#table').DataTable();
        });
    </script>

</head> 
<?php $__env->stopSection(); ?>
<body>

     
    <?php if(session("idmedecin")!=""): ?>
    <form class="" role="form" method="get" action=" <?php echo e(url('disponibilite/create')); ?> " enctype="application/x-www-form-urlencoded" >
        <?php echo e(csrf_field()); ?>

        <div class="col-md-12 col-sm-12 "><label>Cliquer sur le bouton pour ajouter vos disponibilités</label> &nbsp;
            <input type="submit" class="btn btn-primary" value="Ajouter des disponibilités">
             <input type="hidden" value="<?php echo e($idmedecin); ?>" name="idmedecin">
        </div>
        <?php endif; ?>
    </form>     

        <div class="col-md-12 col-sm-12 ">
            <div class="x_content">  
                <div class="x_panel">
                    <div class="x_title"><b>LISTE DES RENDEZ-VOUS EN REPROGRAMMATION </b></div> 
                    <div class="table-responsive">
                    <table class="table col-sm-12 table-striped table-condensed" id="table">
                        <thead>
                            <tr style="background-color:#2a6496;color: #FFFFFF;">

                                <th>CNIB</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Age</th>
                                <th>Antecedent</th>
                                <th>Symptome</th>
                                <th>Jour rendezvous</th>
                                <th></th>



                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $rendezvous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <tr>
                                <td><?php echo e($rdv->cnibpatient); ?></td>
                                <td><?php echo e($rdv->nompatient); ?></td>
                                <td><?php echo e($rdv->prenompatient); ?></td>
                                <td><?php echo e($rdv->agepatient); ?></td>
                                <td><?php echo e($rdv->antecedants); ?></td>
                                <td><?php echo e($rdv->symptomes); ?></td>
                                <td><?php echo e($rdv->jourrendezvous); ?></td>
                                <td>
                                    <form class="" role="form" method="get" action=" <?php echo e(url('rendezvous/create')); ?> " enctype="application/x-www-form-urlencoded" >
                                        <?php echo e(csrf_field()); ?> 
                                        <input type="submit" value="Prendre rendez-vous" class="btn btn-primary">
                                        <input type="hidden" value="<?php echo e($rdv->id); ?>" name="idpatient">
                                         <input type="hidden" value="<?php echo e($rdv->nompatient); ?>" name="nom">
                                          <input type="hidden" value="<?php echo e($rdv->prenompatient); ?>" name="prenom">
                                        <input type="hidden" value="<?php echo e($rdv->idmedecin); ?>" name="idmedecin">
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

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/rendezvous/form_reprogramme.blade.php ENDPATH**/ ?>