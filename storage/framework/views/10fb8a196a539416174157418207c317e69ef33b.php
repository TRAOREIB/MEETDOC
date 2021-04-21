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
        <script>
            $(document).ready(function () {
            $('#table2').DataTable();
            });
        </script>

    </head> 
    <?php $__env->stopSection(); ?>


    <div class="row col-sm-12">
        <div class="card col-sm-9">
            <div> 
                <?php if(session('profil')=='Patient'): ?> 
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient <?php echo e(session('nom')); ?></h3>
                </div>
                <?php else: ?>
                <div class="" style="">
                    <h3 class="titreform">Examens du Patient</h3>
                </div>
                <?php endif; ?>
                <div class=" ligneform " style="background-color: #EEE">
                    <div class="table-responsive">
                        <table class="table table-striped table-condensed" id="table2">
                            <thead>
                                <tr style="background-color:#2a6496;color: #FFFFFF;">
                                    <th>Examen</th>
                                    <th>Jour</th>
                                    <th>Heure Debut</th>
                                    <th>Heure Fin</th>
                                    <th>Etat</th>
                                    <th>Prix</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $exampat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($expat->libellexamen); ?></td>
                                    <td><?php echo e($expat->jourtest); ?></td>
                                    <td><?php echo e($expat->heuredebut); ?></td>
                                    <td><?php echo e($expat->heurefin); ?></td>
                                    <td> <?php if($expat->paye==0): ?>
                                        <label class="label" style="color: red;font-size: 12px"><i><b>Non Payé</b></i></label>
                                        <?php else: ?>
                                        <label class="label" style="color: blue;font-size: 12px"><i><b>Payé</b></i></label>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($expat->prix); ?></td>
                                    <td title="Supprimer">
                                        <?php if($expat->effectue==0 && $expat->paye==0): ?>
                                        <form method="POST" action="<?php echo e(route('test.destroy', [$expat->idtest])); ?>">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>


                                            <input style="border: 0px;background-color:" class="btn btn-primary" type="submit" value="Retrait" onclick="return confirm('Confirmer la Suppression')">
                                            <input type="hidden" value="<?php echo e($idpatient); ?>" name="idpatient">
                                            <input type="hidden" value="<?php echo e($nom); ?>" name="nom">
                                            <input type="hidden" value="<?php echo e($prenom); ?>" name="prenom">
                                            <input type="hidden" value="<?php echo e($reprogramme); ?>" name="reprogramme">
                                            <input type="hidden" value="<?php echo e($jour); ?>" name="jour">

                                        </form>   
                                        <form method='GET' action="<?php echo e(route('payerconsult')); ?>">
                                            <input type="submit" style="" type="submit" class="btn btn-warning" value="Payer">
                                            <input type="hidden" value="<?php echo e($expat->prix); ?>" name="prix">
                                            <input type="hidden" value="<?php echo e($expat->idtest); ?>" name="idtest">
                                            <input type="hidden" value="<?php echo e($expat->id); ?>" name="idpatient">
                                            <input type="hidden" value="examen" name="type"> 
                                        </form>
                                        <?php else: ?>
                                        <?php if($expat->paye==1 && $expat->effectue==0): ?>
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
            </div>
        </div> 
    </div>

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

<?php echo $__env->make('gentelella-master2.production.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\montest6\resources\views/test/frm_rdvfinpatient.blade.php ENDPATH**/ ?>