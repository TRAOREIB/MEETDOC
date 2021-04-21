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
    <script>
        $(document).ready(function () {
        $('#table2').DataTable();
        });
    </script>

</head>

<?php $__env->stopSection(); ?>
<body>

    <p>
    <div class="col-sm-10 col-xs-12">
        <div class="" style="margin: 0px; padding-top: 0px; color: #0044cc; font-weight: normal"><b><h4><u>LISTE DES RENDEZ-VOUS DE <?php echo e($nom); ?> <?php echo e($prenom); ?></u></h4></b> </div>
        <div class="table-responsive">
        <table class="table table-striped table-condensed" id="table2">
            <thead>
                <tr style="background-color:#2a6496;color: #FFFFFF;">
                    <th>Specialite</th>
                    <th>Titre</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Jour</th>
                    <th>Heure Debut</th>
                    <th>Heure Fin</th>
                    <th>Etat</th>
                    <th>Prix</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $rendezvous; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rdv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($rdv->specialitemedecin); ?></td>
                    <td><?php echo e($rdv->titremedecin); ?></td>
                    <td><?php echo e($rdv->nommedecin); ?></td>
                    <td><?php echo e($rdv->prenommedecin); ?></td>
                    <td><?php echo e($rdv->jourrendezvous); ?></td>
                    <td><?php echo e($rdv->heuredebut); ?></td>
                    <td><?php echo e($rdv->heurefin); ?></td>
                   
                    <td> <?php if($rdv->paye==0): ?>
                        <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                        <?php else: ?>
                        <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                        <?php endif; ?>
                    </td>
                     <td><?php echo e($rdv->prix); ?></td>


                    <td title="rendezvous">
                        <?php if($rdv->effectue==0 && $rdv->paye==0): ?>
                        <form method="POST" action="<?php echo e(route('rendezvous.destroy', [$rdv->idrdv])); ?>">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" value="<?php echo e($idpatient); ?>" name="idpatient">
                            <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                            <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                            <input type="hidden" value="<?php echo e($rdv->idrdv); ?>" name="idrdv">
                           
                            <input type="submit" style="border: 0px;background-color:" class="btn btn-primary" value="Retrait">
                        </form>

                        <form method="GET" action="<?php echo e(route('payerconsult')); ?>">
                            <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Payer">
                            <input type="hidden" value="<?php echo e($rdv->idrdv); ?>" name="idrdv">
                            <input type="hidden" value="<?php echo e($rdv->prix); ?>" name="prix">
                            <input type="hidden" value="consultation" name="type">
                        </form>

                        <?php else: ?>
                        <?php if($rdv->paye==1 && $rdv->effectue==0): ?>
                        <form method="POST" action="">
                            <input type="submit" style="border: 0px;background-color:" class="btn btn-warning" value="Reprogrammer">
                        </form>
                        <?php endif; ?>
                        <?php endif; ?>
                    </td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
            </tbody>
        </table>
        </div>
    </div>
    <p>
        <br>

        <?php $__env->stopSection(); ?>


<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/rendezvous/form_rdvpatient.blade.php ENDPATH**/ ?>